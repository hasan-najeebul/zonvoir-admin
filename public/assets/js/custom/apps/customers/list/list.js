"use strict";
var KTCustomerDatatablesServerSide = function () {
    // Shared variables
    var table;
    var dt;
    var filterRoles;

    // Private functions
    var initDatatable = function () {
        var urls = $('.container-xxl').attr('url');
        dt = $("#kt_table_customer_users").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[1, 'desc']],
            ajax: {
                url: urls,
                data:function(d) {
                    d.search = $('input[name="search"]').val(),
                    d.user_status = $('select[name="user_status"]').val()
                }
            },
            columns: [
                { data: 'name' },
                { data: 'email' },
                { data: 'orders', orderable:false, searhable:false },
                { data: 'status' },
                { data: 'created_at' },
            ],
            columnDefs: [
                {
                    targets: 1,
                    data: 'name',
                },
            ],
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
        const filterSearch = document.querySelector('[data-kt-customer-user-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            dt.draw();
        });
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


    // Delete customer user
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

                // Get customer user name
                const customerName = parent.querySelectorAll('td')[0].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + customerName + "?",
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
                                        text: "Deleting " + customerName,
                                        icon: "info",
                                        buttonsStyling: false,
                                        showConfirmButton: false,
                                        timer: 2000
                                    }).then(function () {
                                        Swal.fire({
                                            text: "You have deleted " + customerName + "!.",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn fw-bold btn-primary",
                                            }
                                        }).then(function () {
                                            var oTable = $('#kt_table_customer_users').dataTable();
                                                oTable.fnDraw(false);
                                        });
                                    });
                            }else{
                                Swal.fire({
                                    text: customerName + " was not deleted.",
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
                            text: customerName + " was not deleted.",
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
            handleFilterDatatable();
            handleDeleteRows();
            // handleResetForm();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTCustomerDatatablesServerSide.init();
});
