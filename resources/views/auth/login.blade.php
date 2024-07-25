@extends('layouts.app')
@section('content')
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="mb-3 container">
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
        </div>
        <button type="submit" class="btn btn-primary">Đăng nhập </button>
    </form>

@endsection
