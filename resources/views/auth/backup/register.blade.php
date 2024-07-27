@extends('layouts.backup.app')
@section('content')
    <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="mb-3 container">
            <div class="mb-3">
                <label for="" class="form-label">Tên</label>
                <input type="text" name="name" class="form-control">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Đăng ký</button>
    </form>

@endsection
