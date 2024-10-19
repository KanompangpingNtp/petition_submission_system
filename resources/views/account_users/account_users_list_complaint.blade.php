@extends('layout.users_account_layout')
@section('account_layout')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<style>
    /* ทำให้ตารางมีเส้นขอบ */
    #data_table {
        border-collapse: collapse;
        width: 100%;
    }

    /* กำหนดเส้นขอบให้กับเซลล์ */
    #data_table th, #data_table td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    /* กำหนดเส้นขอบด้านนอกของตาราง */
    #data_table {
        border: 1px solid black;
    }

    /* กำหนดพื้นหลังให้กับส่วนหัวของตาราง */
    #data_table thead {
        background-color: #f2f2f2;
    }

    /* เพิ่มการแบ่งระยะห่างระหว่างแถว */
    #data_table tbody tr {
        height: 50px;
    }
</style>


<div class="container">
    <a href="{{route('dashboardUser')}}" class="btn btn-primary">กลับ</a><br><br>
    <h4 class="text-center">บันทึกการส่งคำร้อง</h4>
    <br>

    <p><strong>ชื่อ : </strong> {{ Auth::user()->full_name }}</p>
    <p><strong>อีเมล : </strong> {{ Auth::user()->email }}</p>

    <br>

    <table id="data_table">
        <thead>
            <tr class="text-center">
                <th>วันที่ส่งคำร้อง</th>
                <th>เรื่องที่ร้องเรียน/ร้องทุกข์</th>
                <th>สถานะการดำเนินการ</th>
                <th>แสดงข้อมูล</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($complaints as $complaint)
            <tr>
                <td class="text-center date-cell">{{ $complaint->created_at->format('Y-m-d') }}</td>
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
                    <a href="{{ route('Iistcomplaintaccountshow', $complaint->id) }}" class="btn btn-info btn-sm"><i class="bi bi-database"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>

<script>

$(document).ready(function() {
    var dataTable = $('#data_table').DataTable({
        lengthMenu: [
            [50, 100, 150, -1],
            [50, 100, 150, 'ทั้งหมด']
        ],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/th.json',
        },
    });
});


    function convertToThaiDate(dateString) {
    var parts = dateString.split('-');
    var year = parseInt(parts[0]);
    var month = parseInt(parts[1]);
    var day = parseInt(parts[2]);

    var thaiMonths = [
        'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน',
        'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
    ];
    var thaiMonth = thaiMonths[month - 1];

    var thaiYear = year + 543;

    // คืนค่าผลลัพธ์ในรูปแบบ "วันที่ เดือน ปี"
    return day + ' ' + thaiMonth + ' ' + thaiYear;
}

document.addEventListener("DOMContentLoaded", function () {
    var dateCells = document.querySelectorAll(".date-cell");

    dateCells.forEach(function (cell) {
        var date = cell.textContent.trim();
        var thaiDate = convertToThaiDate(date);
        cell.textContent = thaiDate;
    });
});
</script>

@endsection

