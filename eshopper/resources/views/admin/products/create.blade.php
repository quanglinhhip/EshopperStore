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
                                <div class=" col-md-6">
                                    <div class="mt-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>

                                    <div class="mt-3">
                                        <label for="price_regular" class="form-label">Price Regular</label>
                                        <input type="text" class="form-control" id="price_regular" name="price_regular">
                                    </div>
                                    <div class="mt-3">
                                        <label for="price_sale" class="form-label">Price sale</label>
                                        <input type="text" class="form-control" id="price_sale" name="price_sale">
                                    </div>


                                    <div class="mt-3">
                                        <label for="img_thumbnail" class="form-label">Img thumbnail</label>
                                        <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail">
                                    </div>


                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="mt-3">
                                            <label for="catalogue_id" class="form-label">Catalogue</label>
                                            <select type="text" class="form-select" id="catalogue_id"
                                                name="catalogue_id">
                                                @foreach ($catalogues as $id => $name)
                                                    <option value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mt-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-check form-switch form-switch-default">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="is_active" checked name="is_active">
                                                <label class="form-check-label" for="is_active">Is active</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end row --}}
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
    {{-- <script>
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
    </script> --}}
@endsection
