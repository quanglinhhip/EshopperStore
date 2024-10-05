@extends('admin.layouts.master')
@section('title')
    Edit Product : {{ $product->name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 mt-3">
                    <label for="catalogue_id" class="form-label">Catalogue:</label>
                    <select name="catalogue_id" id="catalogue_id", class="form-select">
                        @foreach ($catalogues as $id => $name)
                            <option value="{{ $id }} "{{ $product->catalogue_id == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>


                </div>

                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" value = "{{ $product->name }}"
                        placeholder="Enter name" name="name">
                </div>

                <div class="mb-3 mt-3">
                    <label for="img_thumbnail" class="form-label">File:</label>
                    <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail">
                    <img src="{{ \Storage::url($product->img_thumbnail) }}" alt="" width="50px">
                </div>

                <div class="mb-3 mt-3">
                    <label for="price_regular" class="form-label">Price Regular: </label>
                    <input type="text" class="form-control" id="price_regular" value = "{{ $product->price_regular }}"
                        placeholder="Enter price_regular" name="price_regular">
                </div>
                <div class="mb-3 mt-3">
                    <label for="price_sale" class="form-label">Price Sale: </label>
                    <input type="text" class="form-control" id="price_sale" value = "{{ $product->price_sale }}"
                        placeholder="Enter price_sale" name="price_sale">
                </div>

                <div class="mb-3 mt-3">
                    <label for="description" class="form-label">Description: </label>
                    <input type="text" class="form-control" id="description" value = "{{ $product->description }}"
                        placeholder="Enter description" name="description">
                </div>

                <div class="form-check mb-3">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1"
                            @if ($product->is_active) checked @endif> Is active
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
