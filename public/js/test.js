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
