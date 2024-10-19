@extends('layout.users_layout')
@section('users_layout')
<a href="{{route('usersform.index')}}" class="btn btn-primary">กลับ</a><br><br>
<h4>เข้าสู่ระบบ</h4><br>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('login_post') }}" method="POST">
    @csrf

    <!-- Email Field -->
    <div class="mb-3 col-md-5">
        <label for="email" class="form-label">อีเมล</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
    </div>

    <!-- Password Field -->
    <div class="mb-3 col-md-5">
        <label for="password" class="form-label">รหัสผ่าน</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">ล็อคอิน</button>
</form>



@endsection
