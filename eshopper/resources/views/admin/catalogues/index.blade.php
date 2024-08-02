@extends('admin.layouts.master')
@section('title')
    List Catalogues
@endsection

@section('content')
    <a href="{{ route('admin.catalogues.create') }}" class="btn btn-primary mb-3">Add new Catalog</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Cover</th>
            <th>Is Active</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <img src="{{ \Storage::url($item->cover) }}" alt="" width="50px" height="50px">
                </td>
                <td>{!! $item->is_active ? '<span class="badge bg-primary">YES</span>' : '<span class="badge bg-danger">NO</span>' !!}
                </td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.catalogues.show', $item->id) }}" class="btn btn-info mb-3">Show</a>
                    <a href="{{ route('admin.catalogues.edit', $item->id) }}" class="btn btn-warning mb-3">Edit</a>

                    <a href="{{ route('admin.catalogues.destroy', $item->id) }}" onclick="return confirm ('R u sure?')"
                        class="btn btn-danger mb-3">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $data->links() }}
@endsection
