$(document).ready(function () {
    $('#datatable').DataTable({
        scrollX: true,
        responsive: false,
        autoWidth: false,
        ordering: false,
        pageLength: 50, // Default rows per page
        dom: '<"top"fB>rt<"bottom"ip><"clear">', // Places filter and buttons on top
        buttons: [{
            extend: 'excelHtml5',
            text: 'Export to Excel',
            className: 'btn btn-success'
        }],
        language: {
            search: "",
            searchPlaceholder: "Search...",
            lengthMenu: "প্রতি পৃষ্ঠায় _MENU_ রেকর্ড",
            info: "_TOTAL_ রেকর্ডের মধ্যে _START_ থেকে _END_ প্রদর্শিত হচ্ছে",
            paginate: {
                next: "পরবর্তী",
                previous: "পূর্ববর্তী"
            },
            zeroRecords: "কোনো মিল খুঁজে পাওয়া যায়নি"
        }
    });
});

$(document).ready(function () {
    $('#datatable_1').DataTable({
        scrollX: true,
        responsive: false,
        autoWidth: false,
        ordering: false,
        lengthChange: true,
        dom: '<"flex justify-between items-center mb-2"lf>rtip',
        language: {
            search: "",
            searchPlaceholder: "Search...",
            lengthMenu: "প্রতি পৃষ্ঠায় _MENU_ রেকর্ড",
            info: "_TOTAL_ রেকর্ডের মধ্যে _START_ থেকে _END_ প্রদর্শিত হচ্ছে",
            paginate: {
                next: "পরবর্তী",
                previous: "পূর্ববর্তী"
            },
            zeroRecords: "কোনো মিল খুঁজে পাওয়া যায়নি"
        }
    });

    $('div.dataTables_filter').addClass('text-right');
    $('div.dataTables_filter input').addClass('border rounded px-2 py-1 ml-2');
});





