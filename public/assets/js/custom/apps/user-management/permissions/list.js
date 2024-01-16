"use strict";

// Class definition
var KTUsersPermissionsList = function () {
    // Shared variables
    var dt;
    var table;
    var listUrl;
    const element = document.getElementById('kt_modal_update_permission');
    const form = element.querySelector('#kt_modal_update_permission_form');
    const modal = new bootstrap.Modal(element);

    // Init add schedule modal
    var initPermissionsList = () => {
        // Set date data order
        // const tableRows = table.querySelectorAll('tbody tr');

        // tableRows.forEach(row => {
        //     const dateRow = row.querySelectorAll('td');
        //     const realDate = moment(dateRow[2].innerHTML, "DD MMM YYYY, LT").format(); // select date from 2nd column in table
        //     dateRow[2].setAttribute('data-order', realDate);
        // });

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        listUrl = $('.container-xxl').attr('url');
        dt = $(table).DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            searching: true,
            order: [[1, 'desc']],
            ajax: {
                url: listUrl,
                data: function (d) {
                    d.search = $('input[name="search"]').val()
                }
            },
            columns: [
                { data: 'name' },
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
        });
        table = dt.$;

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        dt.on('draw', function () {
            // initToggleToolbar();
            // toggleToolbars();
            handleDeleteRows();
            handleEditRows();
            KTMenu.createInstances();
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-permissions-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
    }
    var handleEditRows = () => {
        const editButton = document.querySelectorAll('[data-kt-permissions-table-filter="edit_row"]');
        editButton.forEach(d => {
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get permission name
                const permissionName = parent.querySelectorAll('td')[0].innerText;
                console.log(permissionName);
                // console.log(d.dataset.ktPermissionEditUrl);
                form.action = d.dataset.ktPermissionEditUrl;
                document.getElementById('permission_name').value = permissionName;
                modal.show()
            })

        });
    }

    // Delete user
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll('[data-kt-permissions-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get permission name
                const permissionName = parent.querySelectorAll('td')[0].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + permissionName + "?",
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
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (res) {
                                if (res.status == 'success') {
                                    // Simulate delete request -- for demo purpose only
                                    Swal.fire({
                                        text: "Deleting " + permissionName,
                                        icon: "info",
                                        buttonsStyling: false,
                                        showConfirmButton: false,
                                        timer: 2000
                                    }).then(function () {
                                        Swal.fire({
                                            text: "You have deleted " + permissionName + "!.",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn fw-bold btn-primary",
                                            }
                                        }).then(function () {
                                            dt.row($(parent)).remove().draw();
                                        });
                                    });
                                } else {
                                    Swal.fire({
                                        text: permissionName + " was not deleted.",
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
                            text: permissionName + " was not deleted.",
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


    return {
        // Public functions
        init: function () {
            table = document.querySelector('#kt_permissions_table');

            if (!table) {
                return;
            }

            initPermissionsList();
            handleSearchDatatable();
            handleDeleteRows();
            handleEditRows();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersPermissionsList.init();
});
