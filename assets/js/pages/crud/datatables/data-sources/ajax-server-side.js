"use strict";
var KTDatatablesDataSourceAjaxServer = function() {

    var initTable1 = function() {
        var table = $('#kt_table_1').DataTable({
            responsive: true,
            scrollX: true,
            paging: false,
            info: false,
            searching: false

        });
        console.log("table initated");
    };

    return {

        //main function to initiate the module
        init: function() {
            initTable1();
        },

    };

}();

jQuery(document).ready(function() {
    // console.log("reached here");
    //KTDatatablesDataSourceAjaxServer.init();
});