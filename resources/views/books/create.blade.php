@extends('layouts.master')

@section('title')
    Thêm mới sách
@endsection
@section('content')
    <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-3 mb-3">
            <label class="form-label">Tên</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label">Nhà xuất bản</label>
            <input type="text" name="public_company" class="form-control">
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label">Ảnh:</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label">Tác giả:</label>
            <select name="author_id" id="" class="form-select">
                @foreach($authors as $id => $name)
                    <option value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3 mb-3">
            <label class="form-check-label">Trạng thái:</label>
            <input type="checkbox" name="is_active" class="form-check-input">
        </div>
        <button type="submit" class="btn btn-success">Tạo mới</button>
    </form>
@endsection
