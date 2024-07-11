@extends('layouts.master')

@section('title')
    Danh sách nhạc sĩ
@endsection
@section('content')
    <a href="{{route('nhacsi.create')}}"> Thêm mới</a>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Ảnh</th>
            <th>Ngày sinh</th>
            <th>Quê quán</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th>Hành đông</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->ten}}</td>
                <td>
                    <img src="{{Storage::url($item->anh)}}" alt="" width="100" height="100">
                </td>
                <td>{{$item->quequan}}</td>
                <td>{{$item->ngaysinh}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td>
                    <a href="{{route('nhacsi.show', $item->id)}}">Xem</a>
                    <a href="{{route('nhacsi.edit', $item->id)}}">Sửa</a>
                    {{--                    <a href="">Xóa</a>--}}
                    <form action="{{route('nhacsi.destroy', $item->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
