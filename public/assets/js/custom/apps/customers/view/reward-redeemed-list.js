"use strict";
var KTRedeemedRewardDatatablesServerSide = function () {
    // Shared variables
    var table;
    var dt;

    // Private functions
    var initDatatable = function () {
        var urls = $('#kt_customer_view_reward_redeemed_list').attr('data-table-url');
        dt = $("#kt_customer_view_reward_redeemed_list").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[2, 'desc']],
            initComplete:function(settings, json) {
                $('#kt_customer_view_reward_redeemed_list tbody tr td').eq(1).addClass('text-danger');
            },
            ajax: {
                url: urls,
                data:function(d) {
                    d.search = $('input[name="search"]').val(),
                    d.status = $('select[name="status"]').val()
                }
            },
            columns: [
                { data: 'order_id' },
                { data: 'redeem_points' },
                { data: 'created_at' },
            ],
            columnDefs: [
                {
                    targets: 1,
                    // className: 'text-success',
                },
                {
                    targets: 2,
                    className: 'text-gray-600',

                },

            ],
            // Add data-filter attribute
            // createdRow: function (row, data, dataIndex) {
            //     $(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
            // }
        });

        table = dt.$;

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        dt.on('draw', function () {
            // initToggleToolbar();
            // toggleToolbars();
            // handleDeleteRows();
            KTMenu.createInstances();
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-customer-user-table-filter="search"]');
        // filterSearch.addEventListener('keyup', function (e) {
        //     dt.draw();
        // });
    }
    var handleFilterDatatable = () => {
        const UserStatus = document.querySelector('[data-kt-user-filter="status"]');

        $(UserStatus).on('change', e => {
            console.log(e.target.value);
            let value = e.target.value;
            if(value === 'all'){
                value = '';
            }
            dt.draw();
        });
    }





    // Public methods
    return {
        init: function () {
            initDatatable();
            // handleSearchDatatable();
            // handleFilterDatatable();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    // jQuery('.invoice_tab').on('click',function(){
        KTRedeemedRewardDatatablesServerSide.init();
    // })
});
