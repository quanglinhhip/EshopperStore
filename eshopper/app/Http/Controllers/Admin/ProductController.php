<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.products.';
    const PATH_UPLOAD = 'products';
    public function index()
    {
        $data = Product::query()->with('catalogue')->latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catalogues = Catalogue::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('catalogues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('img_thumbnail');
        $data['is_active'] ??= 0;

        if ($request->hasFile('img_thumbnail')) {
            // Log::info('Uploading to path: ' . self::PATH_UPLOAD); //debugk
            $data['img_thumbnail'] = Storage::put(self::PATH_UPLOAD, $request->file('img_thumbnail'));
        }
        Product::query()->create($data);
        // dd($data);
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // $model = Product::query()->findOrFail($id); // fail id -> auto 404 page

        // -> sử dụng route::resource -> không cần findOrFail
        //Product $product trong method controller với route model binding,
        // laravel auto check exist of model Products dua vao id duoc truyen trong url(route)

        // Route model binding: Laravel tự động lấy model và trả về trang 404 nếu không tìm thấy.
        // Không cần kiểm tra thủ công: Khi sử dụng route model binding, bạn không cần kiểm tra thủ công sự tồn tại của model.
        return view(self::PATH_VIEW . __FUNCTION__, compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Route Model Binding: Laravel sẽ tự động truy vấn model Product từ cơ sở dữ liệu dựa trên ID trong URL và truyền nó vào biến $product. Bạn không cần truy vấn lại model.
    public function edit(Product $product)
    {
        $catalogues = Catalogue::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('catalogues', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->except('img_thumbnail');
        $data['is_active'] ??= 0; // Gán giá trị mặc định cho 'is_active' nếu không được đặt
        // dd($data);
        if ($request->hasFile('img_thumbnail')) {
            $data['img_thumbnail'] = Storage::put(self::PATH_UPLOAD, $request->file('img_thumbnail'));
        }
        $currentImage = $product->img_thumbnail;  //lưu lại giá trị hiện tại trước khi update (ảnh)

        // Product::query()->create($data); // cập nhật toàn bộ bảng


        $product->update($data); // update 1 bản ghi cụ thể

        // Nếu có giá trị 'img_thumbnail' hiện tại và tệp tồn tại trong hệ thống lưu trữ
        if ($request->hasFile('img_thumbnail') && $currentImage && Storage::exists($currentImage)) {
            Storage::delete($currentImage);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->img_thumbnail && Storage::exists($product->img_thumbnail)) {
            // Xóa file img_thumbnail từ storage
            Storage::delete($product->img_thumbnail);
        }
        $product->delete();
        return back()->with('success', 'Product deleted successfully.');
    }
}
