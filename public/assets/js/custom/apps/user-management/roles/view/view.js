"use strict";

var KTUsersViewRole = function () {
    // Shared variables
    var table;
    var dt;
    var listUrl;
    var filterRoles;

    // Private functions
    var initDatatable = function () {
        listUrl = $('.container-xxl').attr('url');
        console.log(listUrl);
        dt = $("#kt_table_users").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            searching: true,
            order: [[3, 'desc']],
            // stateSave: true,
            // select: {
            //     style: 'multi',
            //     selector: 'td:first-child input[type="checkbox"]',
            //     className: 'row-selected'
            // },
            ajax: {
                url: listUrl,

            },
            columns: [
                { data: 'name' },
                { data: 'status' },
                { data: 'created_at' },
                { data: 'action' },
            ],
            columnDefs: [

                {
                    targets: -1,
                    data: 'action',
                    orderable: false,
                    className: 'text-end',

                },
                {
                    targets: 0,
                    className: 'd-flex align-items-center',

                },
            ],
            // Add data-filter attribute
            // createdRow: function (row, data, dataIndex) {
            //     //console.log(data);
            //     $(row).find('td:eq(1)').attr('data-filter', data.role);
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
        const filterSearch = document.querySelector('[data-kt-user-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
    }

    var handleFilterDatatable = () => {
        const filterRole = document.querySelector('[data-kt-user-table-filter="role"]');
        const UserStatus = document.querySelector('[data-kt-user-filter="status"]');
        $(filterRole).on('change', e => {
            console.log(e.target.value);
            let value = e.target.value;
            if(value === 'all'){
                value = '';
            }
            dt.draw();
        });
        $(UserStatus).on('change', e => {
            console.log(e.target.value);
            let value = e.target.value;
            if(value === 'all'){
                value = '';
            }
            dt.draw();
        });
    }

    // Delete customer
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

                // Get customer name
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

                                            var oTable = $('#kt_table_users').dataTable();
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
            // handleSearchDatatable();
            //initToggleToolbar();
            // handleFilterDatatable();
            handleDeleteRows();

            // handleResetForm();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersViewRole.init();
});

