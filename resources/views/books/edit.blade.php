@extends('layouts.master')

@section('title')
    Cập nhật sách
@endsection
@section('content')
    <form action="{{route('books.update', $book)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mt-3 mb-3">
            <label class="form-label">Tên</label>
            <input type="text" name="name" class="form-control" value="{{$book->name}}">
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label">Nhà xuất bản</label>
            <input type="text" name="public_company" class="form-control" value="{{$book->public_company}}">
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label">Ảnh:</label>
            <input type="file" name="image" class="form-control">
            @if(!empty($book->image))
                <div style="width: 100px; height: 100px">
                    <img src="{{Storage::url($book->image)}}" alt=""
                         style="max-height: 100%; max-width: 100%;">
                </div>
            @endif
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label">Tác giả:</label>
            <select name="author_id" id="" class="form-select">
                @foreach($authors as $id => $name)
                    <option @selected($id == $book->author_id) value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3 mb-3">
            <label class="form-check-label">Trạng thái:</label>
            <input type="checkbox" name="is_active" class="form-check-input" @checked($book->is_active)>
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
@endsection
