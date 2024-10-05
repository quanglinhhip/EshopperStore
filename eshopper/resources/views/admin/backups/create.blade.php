@extends('admin.layouts.master')
@section('title')
    Thêm mới sản phẩm
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Thêm mới sản phẩm</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin</h4>
                        <div class="flex-shrink-0">
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class=" col-md-4">
                                    <div>
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="mt-3">
                                        <label for="sku" class="form-label">SKU</label>
                                        <input type="text" class="form-control" id="sku" name="sku"
                                            value="{{ strtoupper(\Str::random(8)) }}">
                                    </div>

                                    <div class="mt-3">
                                        <label for="price_regular" class="form-label">Price Regular</label>
                                        <input type="text" class="form-control" id="price_regular" name="price_regular">
                                    </div>
                                    <div class="mt-3">
                                        <label for="sale" class="form-label">Price sale</label>
                                        <input type="text" class="form-control" id="sale" name="sale">
                                    </div>

                                    <div class="mt-3">
                                        <label for="catalogue_id" class="form-label">Catalogue</label>
                                        <select type="text" class="form-select" id="catalogue_id" name="catalogue_id">
                                            @foreach ($catalogues as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <label for="img_thumbnail" class="form-label">Img thumbnail</label>
                                        <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail">
                                    </div>

                                </div>
                                <!--end col-->
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-default">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="is_active" checked name="is_active">
                                                <label class="form-check-label" for="is_active">Is active</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-danger">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="is_hot_deal" checked name="is_hot_deal">
                                                <label class="form-check-label" for="is_hot_deal">Is Hot Deal</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-switch form-switch-success">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="is_good_deal" checked name="is_good_deal">
                                                <label class="form-check-label" for="is_good_deal">Is Good Deal</label>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-info">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="is_new" checked name="is_new">
                                                <label class="form-check-label" for="is_new">Is New</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check form-switch form-switch-secondary">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="is_show_home" checked name="is_show_home">
                                                <label class="form-check-label" for="is_show_home">Is Show Home</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end row --}}

                                    <div class="row">

                                        <!-- Example Textarea -->
                                        <div>
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                                        </div>

                                        <div>
                                            <label for="material" class="form-label">material</label>
                                            <textarea class="form-control" id="material" rows="3" name="material"></textarea>
                                        </div>
                                        <div>
                                            <label for="user_manual" class="form-label">User manual</label>
                                            <textarea class="form-control" id="user_manual" rows="3" name="user_manual"></textarea>
                                        </div>
                                        <div class="mt-3">
                                            <label for="content" class="form-label">Content</label>
                                            <textarea class="form-control" name="content" id="content"></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Biến thể</h4>
                        <div class="flex-shrink-0">
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <table>
                                    <tr>
                                        <th class="text-center">Size</th>
                                        <th class="text-center">Color</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Image</th>
                                    </tr>

                                    @foreach ($sizes as $sizeID => $sizeName)
                                        @foreach ($colors as $colorID => $colorName)
                                            <tr class="text-center">
                                                <td>{{ $sizeName }}</td>
                                                <td>
                                                    <div class="mx-auto"
                                                        style="width: 50px; height: 50px; background: {{ $colorName }};">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="100"
                                                        name="product_variants[{{ $sizeID . '-' . $colorID }}][quantity]">
                                                </td>
                                                <td>
                                                    <input type="file" class="form-control"
                                                        name="product_variants[{{ $sizeID . '-' . $colorID }}][image]">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </table>
                            </div>
                            <!--end col-->

                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        {{-- end row --}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Gallery</h4>
                        <button type="button" class="btn btn-primary" onclick="addImageGallery()">Thêm ảnh</button>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4" id="gallery_list">
                                <div class="col-md-4" id="gallery_default_item">
                                    <label for="gallery_default" class="form-label">Image</label>
                                    <div class="d-flex">
                                        <input type="file" class="form-control" name="product_galleries[]"
                                            id="gallery_default">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        {{-- end row --}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin thêm</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <div>
                                        <label for="tags" class="form-label">Tags</label>
                                        <select class="form-select" name="tags[]" id="tags" multiple>
                                            @foreach ($tags as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div><!-- end card header -->
                </div>
            </div>
            <!--end col-->
        </div>
    </form>
@endsection

@section('script-libs')
    <script src="https:////cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script>
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('content');

        function addImageGallery() {
            let id = 'gen' + '_' + Math.random().toString(36).substring(2, 15).toLowerCase();
            let html = `
                <div class="col-md-4" id="${id}_item">
                    <label for="${id}" class="form-label">Image</label>
                    <div class="d-flex">
                        <input type="file" class="form-control" name="product_galleries[]" id="${id}">
                        <button type="button" class="btn btn-danger" onclick="removeImageGallery('${id}_item')">
                            <span class="bx bx-trash"></span>
                        </button>
                    </div>
                </div>
            `;

            $('#gallery_list').append(html);
        }

        function removeImageGallery(id) {
            if (confirm('Chắc chắn xóa không?')) {
                $('#' + id).remove();
            }
        }
    </script>
@endsection
