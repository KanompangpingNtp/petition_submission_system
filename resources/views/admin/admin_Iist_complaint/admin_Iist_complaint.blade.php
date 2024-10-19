@extends('layout.admin_layout')
@section('admin_layout')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<div class="container">
    <h2 class="text-center">รายการคำร้องทุกข์</h2> <br>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <br>

    <table class="table table-bordered" id="data_table">
        <thead>
            <tr>
                <th>วันที่ส่งคำร้อง</th>
                <th>ชื่อ</th>
                <th>เบอร์ติดต่อ</th>
                <th>เรื่องที่ร้องเรียน/ร้องทุกข์</th>
                <th>สถานะการดำเนินการ</th>
                <th>แสดงข้อมูล</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($complaints as $complaint)
            <tr>
                <td class="text-center date-cell">{{ $complaint->created_at->format('Y-m-d') }}</td>
                <td>{{ $complaint->full_name }}</td>
                <td class="text-center">{{ $complaint->phone_number }}</td>
                <td class="text-center">{{ $complaint->subject }}</td>
                <td class="text-center">
                    @if ($complaint->status == 1)
                    <p style="color: red;">ยังไม่ได้ดำเนินการ</p>
                    @elseif ($complaint->status == 2)
                    <p style="color: orange;">รับทราบเรื่องแล้ว</p>
                    @elseif ($complaint->status == 3)
                    <p style="color: blue;">กำลังดำเนินการ</p>
                    @elseif ($complaint->status == 4)
                    <p style="color: green;">ดำเนินการเสร็จสิ้น</p>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('complaintshow', $complaint->id) }}" class="btn btn-info"><i class="bi bi-database"></i></a>
                    <a class="btn btn-danger"><i class="bi bi-x-lg"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<script src="{{asset('js/test.js')}}"></script>

@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>

