@extends('layouts.master')

@section('title')
    Cập nhật nhạc sĩ
@endsection

@section('content')
    <form action="{{route('nhacsi.update', $model->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <label for="" class="form-label">Tên</label>
            <input type="text" name="ten" class="form-control" value="{{$model->ten}}">
        </div>
        <div class="row">
            <label for="" class="form-label">Ảnh</label>
            <input type="file" name="anh" class="form-control">
            <img src="{{Storage::url($model->anh)}}" alt="" width="50" height="50">
        </div>
        <div class="row">
            <label for="" class="form-label">Ngày sinh</label>
            <input type="date" name="ngaysinh" class="form-control" value="{{$model->ngaysinh}}">
        </div>
        <div class="row">
            <label for="" class="form-label">Quê quán</label>
            <input type="text" name="quequan" class="form-control" value="{{$model->quequan}}">
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
@endsection
