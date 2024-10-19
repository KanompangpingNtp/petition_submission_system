@extends('layout.users_account_layout')
@section('account_layout')

<!-- แสดงข้อความ success -->
@if ($message = Session::get('success'))
<script>
    Swal.fire({
        icon: 'success'
        , title: '{{ $message }}'
    , })

</script>
@endif

<div class="container">

    <form action="{{ route('Formcreate') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- <div class="form-group">
            <label for="full_name">ชื่อ-นามสกุล ผู้ส่ง <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="full_name" name="full_name" required>
        </div> --}}
        <div class="form-group">
            <label for="full_name">ชื่อ-นามสกุล ผู้ส่ง <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="{{ Auth::user() ? Auth::user()->full_name : '' }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="gender">เพศ <span class="text-danger">*</span></label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="male" name="gender" value="male" required>
                <label class="form-check-label" for="male">ชาย</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="female" name="gender" value="female" required>
                <label class="form-check-label" for="female">หญิง</label>
            </div>
        </div>
        <br>
        {{-- <div class="form-group col-md-2">
            <label for="age">อายุ <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div> --}}
        <div class="form-group col-md-2">
            <label for="age">อายุ <span class="text-danger">*</span></label>
            <div>
                <input type="number" class="form-control d-inline" id="age" name="age" required style="width: 80%;">
                <span>ปี</span>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label for="occupation">อาชีพ <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="occupation" name="occupation" required>
        </div>
        <br>
        <div class="form-group">
            <label for="phone_number">โทรศัพท์ <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ Auth::user() ? Auth::user()->phone_number : '' }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="email">อีเมล์ <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user() ? Auth::user()->email : '' }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="address">ที่อยู่ <span class="text-danger">*</span></label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="subject">เรื่องที่ร้องเรียน/ร้องทุกข์ <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>
        <br>
        <div class="form-group">
            <label for="image_path">รูปภาพ (ถ้ามี)</label>
            <input type="file" class="form-control-file" id="image_path" name="image_path">
        </div>
        <br>
        <div class="form-group">
            <label for="additional_details">รายละเอียดเพิ่มเติม</label>
            <textarea class="form-control" id="additional_details" name="additional_details" rows="4"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">ส่งคำร้อง</button>
    </form>

</div>
@endsection
