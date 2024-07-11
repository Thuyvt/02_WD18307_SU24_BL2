@extends('layouts.master')

@section('title')
    Tạo mới nhạc sĩ
@endsection

@section('content')
    <form action="{{route('nhacsi.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <label for="" class="form-label">Tên</label>
            <input type="text" name="ten" class="form-control">
        </div>
        <div class="row">
            <label for="" class="form-label">Ảnh</label>
            <input type="file" name="anh" class="form-control">
        </div>
        <div class="row">
            <label for="" class="form-label">Ngày sinh</label>
            <input type="date" name="ngaysinh" class="form-control">
        </div>
        <div class="row">
            <label for="" class="form-label">Quê quán</label>
            <input type="text" name="quequan" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Tạo mới</button>
    </form>
@endsection
