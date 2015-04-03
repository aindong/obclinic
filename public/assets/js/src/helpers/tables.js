define(function() {
    "use strict";

    var TableDynamic = function() {
        // Create reference to this instance
        var o = this;
    };
    var p = TableDynamic.prototype;

    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function($el) {
        this._initDataTables($el);
    };

    // =========================================================================
    // DATATABLES
    // =========================================================================

    p._initDataTables = function($el) {
        if (!$.isFunction($.fn.dataTable)) {
            return;
        }

        // Init the demo DataTables
        this._createDataTable($el);
    };

    p._createDataTable = function($el) {
        var table = $el.DataTable({
            "dom": 'T<"clear">lfrtip',
            "ajax": $el.data('source'),
            "columns": [
                {
                    "class": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {"data": "name"},
                {"data": "position"},
                {"data": "office"},
                {"data": "salary"}
            ],
            "tableTools": {
                "sSwfPath": $el.data('swftools')
            },
            "order": [[1, 'asc']],
            "language": {
                "lengthMenu": '_MENU_ entries per page',
                "search": '<i class="fa fa-search"></i>',
                "paginate": {
                    "previous": '<i class="fa fa-angle-left"></i>',
                    "next": '<i class="fa fa-angle-right"></i>'
                }
            }
        });

        //Add event listener for opening and closing details
        var o = this;
        $el.children('tbody').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child(o._formatDetails(row.data())).show();
                tr.addClass('shown');
            }
        });
    };

    // =========================================================================
    // DETAILS
    // =========================================================================

    p._formatDetails = function(d) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
            '<td>Full name:</td>' +
            '<td>' + d.name + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Extension number:</td>' +
            '<td>' + d.extn + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Extra info:</td>' +
            '<td>And any further details here (images etc)...</td>' +
            '</tr>' +
            '</table>';
    };

    // =========================================================================
    return p;
});