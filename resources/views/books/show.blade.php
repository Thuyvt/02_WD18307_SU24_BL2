@extends('layouts.master')

@section('title')
    Chi tiết sách
@endsection
@section('content')
    <ul>
        <li>Tên: {{$book->name}}</li>
        <li>Nhà xuất bản: {{$book->public_company}}</li>
        <li>Ảnh:
            <div style="width: 100px; height: 100px">
                <img src="{{Storage::url($book->image)}}" alt=""
                     style="max-height: 100%; max-width: 100%;">
            </div>
        </li>
        <li>Tác giả: {{$book->author->name}}</li>
        <li>Trạng thái:
            <input type="checkbox" disabled class="form-check-input" @checked($book->is_active)>
        </li>
    </ul>
@endsection
