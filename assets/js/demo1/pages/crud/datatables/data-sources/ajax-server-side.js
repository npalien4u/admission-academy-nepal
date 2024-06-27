"use strict";
var KTDatatablesDataSourceAjaxServer = function() {

    var initTable1 = function() {
        var table = $('#kt_table_applications');

        // begin first table
        table.DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            paging: true,
            pageLength: 25,
            // scrollY: "415px",
            scrollCollapse: true,
            sDom: '<"top">rti<"bottom"p>',
            ajax: {
                url: $(table).attr("data-source"),
                type: "post",
                dataType: "json"
            },
            columns: [
                { data: 'id' },
                { data: 'first_name' },
                { data: 'last_name' },
                { data: 'admission_grade' },
                { data: 'mobile_number' },
                { data: 'status' },
                { data: 'date_submitted' },
                { data: 'Actions', responsivePriority: -1 },
            ],
            columnDefs: [{
                    targets: -1,
                    title: 'Actions',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return `
                        <span class="dropdown">
                            <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                              <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Update Details</a>
                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Download Pdf</a>
                            </div>
                        </span>
                        <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                          <i class="la la-eye"></i>
                        </a>`;
                    },
                },
                {
                    targets: -3,
                    render: function(data, type, full, meta) {
                        var status = {
                            1: { 'title': 'New', 'class': 'kt-badge--brand' },
                            2: { 'title': 'Confirmed', 'class': ' kt-badge--success' },
                            3: { 'title': 'Pending', 'class': ' kt-badge--warning' },

                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
                    },
                },
                {
                    targets: -2,
                    render: function(data, type, full, meta) {
                        var status = {
                            1: { 'title': 'Online', 'state': 'danger' },
                            2: { 'title': 'Retail', 'state': 'primary' },
                            3: { 'title': 'Direct', 'state': 'success' },
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return '<span class="kt-badge kt-badge--' + status[data].state + ' kt-badge--dot"></span>&nbsp;' +
                            '<span class="kt-font-bold kt-font-' + status[data].state + '">' + status[data].title + '</span>';
                    },
                },
            ],
        });
    };

    return {
        //main function to initiate the module
        init: function() {
            initTable1();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatablesDataSourceAjaxServer.init();
});