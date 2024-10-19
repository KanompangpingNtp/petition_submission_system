@extends('layout.users_layout')
@section('users_layout')
<a href="{{route('usersform.index')}}" class="btn btn-primary">กลับ</a><br><br>
<h4>สมัครเข้าใช้งานระบบ</h4>
<br>
<form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="form-group col-md-5">
        <label for="full_name">ชื่อ-นามสกุล</label>
        <input type="text" class="form-control" id="full_name" name="full_name" required>
    </div>
<br>
    <div class="form-group col-md-4">
        <label for="phone_number">โทรศัพท์</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number" required>
    </div>
<br>
    <div class="form-group col-md-5">
        <label for="email">อีเมล์ </label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
<br>
    <div class="form-group col-md-5">
        <label for="password">รหัสผ่าน</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
<br>
    <div class="form-group col-md-5">
        <label for="password_confirmation">ยืนยันรหัสผ่านอีกครั้ง</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
    </div>

    <br>

    <button type="submit" class="btn btn-primary">บันทึก</button>
</form>

@endsection
