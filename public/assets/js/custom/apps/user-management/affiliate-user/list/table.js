"use strict";
var KTAffiliateDatatablesServerSide = function () {
    // Shared variables
    var table;
    var dt;
    var filterRoles;

    // Private functions
    var initDatatable = function () {
        var urls = $('.container-xxl').attr('url');
        dt = $("#kt_table_affiliate_users").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[5, 'desc']],
            // stateSave: true,
            // select: {
            //     style: 'multi',
            //     selector: 'td:first-child input[type="checkbox"]',
            //     className: 'row-selected'
            // },
            ajax: {
                url: urls,
                data:function(d) {
                    d.search = $('input[name="search"]').val()
                }
            },
            columns: [
                { data: 'name' },
                { data: 'commission' },
                { data: 'affiliate_code' },
                { data: 'affiliate_link' },
                { data: 'affiliate_website_link' },
                { data: 'created_at' },
                { data: 'action' },
            ],
            columnDefs: [
                {
                    targets: 1,
                    data: 'name',
                    className: 'text-end',

                },
                {
                    targets: 1,
                    data: 'commission',
                    className: 'text-end',

                },
                {
                    targets: -1,
                    data: 'action',
                    orderable: false,
                    // className: 'text-end',

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
            handleDeleteRows();
            KTMenu.createInstances();
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-affiliate-user-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
    }
    // Delete Affiliate user
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll('[data-kt-action="delete_row"]');
        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                console.log(e.target.getAttribute('data-kt-user-id'));

                // Get Affiliate user name
                const userName = parent.querySelectorAll('td')[0].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + userName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        let urls = e.target.getAttribute('href');
                        $.ajax({
                            url: urls,
                            method: "DELETE",
                            // data: {'id':id},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(res) {
                            if(res.status == 'success'){
                                // Simulate delete request -- for demo purpose only
                                    Swal.fire({
                                        text: "Deleting " + userName,
                                        icon: "info",
                                        buttonsStyling: false,
                                        showConfirmButton: false,
                                        timer: 2000
                                    }).then(function () {
                                        Swal.fire({
                                            text: "You have deleted " + userName + "!.",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn fw-bold btn-primary",
                                            }
                                        }).then(function () {
                                            var oTable = $('#kt_table_affiliate_users').dataTable();
                                                oTable.fnDraw(false);
                                        });
                                    });
                            }else{
                                Swal.fire({
                                    text: userName + " was not deleted.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                });
                                // return false;
                            }
                            }
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: userName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }



    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            //initToggleToolbar();
            // handleFilterDatatable();
            handleDeleteRows();
            // handleResetForm();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAffiliateDatatablesServerSide.init();
});
