@extends('layout.admin_layout')
@section('admin_layout')

@if ($message = Session::get('success'))
<script>
    Swal.fire({
        icon: 'success'
        , title: '{{ $message }}'
    , })

</script>
@endif

<div class="container">

    <a href="{{route('Iistcomplaintindex')}}" class="btn btn-primary">กลับ</a><br>

    <h2 class="text-center">ข้อมูลคำร้องทุกข์</h2><br>

    <div class="card">
        <div class="card-body">
            <p class="card-text"><strong>ชื่อ-นามสกุล ผู้ส่ง :</strong> {{ $complaint->full_name }}</p>
            {{-- <p class="card-text"><strong>เพศ :</strong> {{ $complaint->gender }}</p> --}}
            <p class="card-text"><strong>เพศ :</strong>
                @if ($complaint->gender == 'male')
                    ชาย
                @elseif ($complaint->gender == 'female')
                    หญิง
                @endif
            </p>
            <p class="card-text"><strong>อายุ :</strong> {{ $complaint->age }} ปี</p>
            <p class="card-text"><strong>อาชีพ :</strong> {{ $complaint->occupation }}</p>
            <p class="card-text"><strong>โทรศัพท์ :</strong> {{ $complaint->phone_number }}</p>
            <p class="card-text"><strong>อีเมล์ :</strong> {{ $complaint->email }}</p>
            <p class="card-text"><strong>ที่อยู่ :</strong> {{ $complaint->address }}</p>
            <p class="card-text"><strong>เรื่องที่ร้องเรียน :</strong> {{ $complaint->subject }}</p>
            <p class="card-text"><strong>รายละเอียดเพิ่มเติม :</strong> {{ $complaint->additional_details }}</p>

            @if ($complaint->image_path)
            <p><strong>รูปภาพ:</strong></p>
            <img src="{{ asset('storage/' . $complaint->image_path) }}" alt="Complaint Image" style="max-width: 300px;">
            @else
            <p><strong>รูปภาพ :</strong> ไม่มีรูปภาพ</p>
            @endif

            <hr>

            <h5>อัปเดตสถานะ</h5>
            <form action="{{ route('complaint.updateStatus', $complaint->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row align-items-center">
                    <div class="col-md-3">
                        <select class="form-control" id="status" name="status" required>
                            <option value="1" {{ $complaint->status == 1 ? 'selected' : '' }}>ยังไม่ได้ดำเนินการ</option>
                            <option value="2" {{ $complaint->status == 2 ? 'selected' : '' }}>รับทราบเรื่องแล้ว</option>
                            <option value="3" {{ $complaint->status == 3 ? 'selected' : '' }}>กำลังดำเนินการ</option>
                            <option value="4" {{ $complaint->status == 4 ? 'selected' : '' }}>ดำเนินการเสร็จสิ้น</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">อัปเดตสถานะ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
