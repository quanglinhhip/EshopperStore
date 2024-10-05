@extends('admin.layouts.master')
@section('title')
    Detail Product: {{ $product->name }}
@endsection

@section('content')
    <table>
        <tr>
            <th>Field Name</th>
            <th>Value</th>
        </tr>
        @foreach ($product->toArray() as $field => $value)
            <tr>
                {{-- <td>{{ Str::ucfirst($field) }}</td> <!-- Hiển thị tên của trường --> --}}
                <td>
                    @if ($field == 'catalogue_id')
                        Catalogue
                    @else
                        {{ Str::ucfirst(str_replace('_', ' ', $field)) }}
                    @endif
                </td>

                {{-- <td>
                    @php

                        // Kiểm tra nếu khóa là 'cover', thì hiển thị hình ảnh
                        if ($field == 'img_thumbnail') {
                            // Tạo URL từ giá trị của trường 'cover' =  Storage facade
                            $url = \Storage::url($value);
                            echo "<img src=\"$url\" alt=\"\" width=\"50px\">";

                            // Kiểm tra nếu khóa chứa chuỗi 'is_', hiển thị nhãn YES hoặc NO
                        } elseif (Str::contains($field, 'is_')) {
                            // Nếu giá trị là true, hiển thị nhãn YES, nếu không hiển thị nhãn NO
                            echo $value
                                ? '<span class="badge bg-primary">YES</span>'
                                : '<span class="badge bg-danger">NO</span>';
                                echo    <span class="badge {{ $value ? 'bg-primary' : 'bg-danger' }}">
                            {{ $value ? 'YES' : 'NO' }}
                        </span>;
                        } elseif ($field == 'catalogue_id') {
                            echo $product->catalogue->name;
                        } else {
                            echo $value;
                        }
                    @endphp
                </td> --}}
                <td>
                    @if ($field == 'img_thumbnail')
                        <img src="{{ Storage::url($value) }}" alt="" width="50px">
                    @elseif (Str::contains($field, 'is_'))
                        <span class="badge {{ $value ? 'bg-primary' : 'bg-danger' }}">
                            {{ $value ? 'YES' : 'NO' }}
                        </span>
                    @elseif ($field == 'catalogue_id')
                        {{ $product->catalogue->name }}
                    @else
                        {{ $value }}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Back</a>
@endsection
