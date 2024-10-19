@extends('layout.users_layout')
@section('users_layout')

@if ($message = Session::get('success'))
<script>
    Swal.fire({
        icon: 'success'
        , title: '{{ $message }}'
    , })

</script>
@endif

<div class="container">
    <h4>เข้าใช้งาน สำหรับผู้ดูแลระบบ</h4><br>
    <form action="{{ route('admin.login') }}" method="POST">
        @csrf
        <div class="form-group col-md-5">
            <label for="name">ชื่อเข้าสู่ระบบ</label>
            <input type="text" name="name" id="name" class="form-control" required>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div class="form-group col-md-5">
            <label for="password">รหัสผ่าน</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
    </form>
</div>

@endsection

