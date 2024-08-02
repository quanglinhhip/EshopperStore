@extends('admin.layouts.master')
@section('title')
    Edit Catalog : {{$model->name}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('admin.catalogues.update', $model->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name"
                           value = "{{$model->name}}"
                           placeholder="Enter name" name="name">
                </div>

                <div class="mb-3 mt-3">
                    <label for="cover" class="form-label">File:</label>
                    <input type="file" class="form-control" id="cover"  name="cover">
                    <img src="{{ \Storage::url($model->cover)}}" alt="" width="50px">
                </div>

                <div class="form-check mb-3">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1"
                               @if($model->is_active)
                                   checked
                            @endif
                        > Is active
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <a href="{{route('admin.catalogues.index')}}" class="btn btn-primary">Back</a>
        </div>
    </div>

@endsection
