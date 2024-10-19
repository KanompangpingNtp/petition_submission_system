@extends('layout.users_account_layout')
@section('account_layout')

<div class="container">
    <a href="{{route('Iistcomplaintaccount')}}" class="btn btn-primary">กลับ</a><br><br>
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

            <br>
            <br>

            <p class="card-text">
                <strong>สถานะคำร้อง :</strong>
                @if ($complaint->status == 1)
                    <span style="color: red;">ยังไม่ได้ดำเนินการ</span>
                @elseif ($complaint->status == 2)
                    <span style="color: orange;">รับทราบเรื่องแล้ว</span>
                @elseif ($complaint->status == 3)
                    <span style="color: blue;">กำลังดำเนินการ</span>
                @elseif ($complaint->status == 4)
                    <span style="color: green;">ดำเนินการเสร็จสิ้น</span>
                @endif
            </p>
        </div>
    </div>
</div>

@endsection
