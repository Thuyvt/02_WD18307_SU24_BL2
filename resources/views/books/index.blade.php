@extends('layouts.master')

@section('title')
    Danh sách sách
@endsection
@section('content')
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Nhà xuất bản</th>
                <th>Tác giả</th>
                <th>Ảnh</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->public_company}}</td>
                <td>{{$item->author->name}}</td>
                <td>
                    <div style="width: 100px; height: 100px">
                        <img src="{{Storage::url($item->image)}}" alt=""
                             style="max-height: 100%; max-width: 100%;">
                    </div>
                </td>
                <td>
                    {!! $item->is_active ? '<span class="badge bg-success">Hoạt động</span>'
                    : '<span class="badge bg-danger">Không hoạt động</span>' !!}
                </td>
                <td>
                    <a href="{{route('books.show', $item)}}">
                        <button class="btn btn-success">Xem</button>
                    </a>
                    <a href="{{route('books.edit', $item)}}">
                        <button class="btn btn-info">Sửa</button>
                    </a>
                    <form action="{{route('books.destroy', $item)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
