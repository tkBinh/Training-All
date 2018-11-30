$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true,
        "language": {
            "lengthMenu": "Hiển thị _MENU_ bản ghi",
            "zeroRecords": "Không tìm thấy",
            "info": "Hiển thị trang _PAGE_ / _PAGES_",
            "infoEmpty": "Không bản ghi nào phù hợp",
            "infoFiltered": "(Trong tổng số _MAX_ bản ghi)",
            "search": "Tìm kiếm:",
            "paginate": {
                "first":      "Đầu",
                "last":       "Cuối",
                "next":       "Tiếp",
                "previous":   "Sau"
            },
        },
    });

    $('span').click(function(){
        var id = $(this).attr('value')
        var customer = $(this).attr('id')
        customer = customer.slice(6)
        $('#invitation_code').val(id)
        $('#customer_id').val(customer)
        $('#error_bonus').hide(true);
    })
});