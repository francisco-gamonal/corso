/**
 * Created by anwar on 02/09/15.
 */

$(function() {
    $('#employees-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'http://corso.dev/empleados/list',
        columns: [
        {data: 'id', name: 'id'},
        {data: 'fname', name: 'fname'},
        {data: 'sname', name: 'sname'},
        {data: 'flast', name: 'flast'},
        {data: 'slast', name: 'slast'},
        {data: 'charter', name: 'charter'},
        {data: 'phone', name: 'phone'}
    ],
        initComplete: function () {
        this.api().columns().every(function () {
            var column = this;
            var input = document.createElement('input');
            $(input).appendTo($(column.footer()).empty())
                .on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column.search(val ? val : '', true, false).draw();
                });
        });
    }
});
});