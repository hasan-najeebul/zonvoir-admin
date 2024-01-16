"use strict";
var KTAppEcommerceCategories = function () {
    // Shared variables
    var table;
    var datatable;
    var productListUrl;

    // Private functions
    var initDatatable = function () {
        // Init datatable --- more info on datatables: https://datatables.net/manual/
        productListUrl = $('.container-xxl').attr('url');
            // Init datatable --- more info on datatables: https://datatables.net/manual/
            datatable = $(table).DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,
                order: [[0, 'desc']],
                ajax: {
                    url: productListUrl,
                },
                columns: [
                    { data: 'name' },
                    // { data: 'description' },
                    { data: 'created_by' },
                    // { data: 'status' },
                    { data: 'created_at' },
                    { data: 'action' },
                ],
                columnDefs: [
                    {
                        targets: -1,
                        data: 'action',
                        orderable: false,
                        // className: 'text-end',

                    },
                ],
            });
        // Re-init functions on datatable re-draws
        datatable.on('draw', function () {
            handleDeleteRows();
            KTMenu.createInstances();
        });
        // table = dt.$;
        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-ecommerce-category-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Delete cateogry
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[data-kt-ecommerce-category-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get category name
                const categoryName = parent.querySelector('[data-kt-ecommerce-category-filter="category_name"]').innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                        text: "Are you sure you want to delete " + categoryName + "?",
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
                            Swal.fire({
                                text: "You have deleted " + categoryName + "!.",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            }).then(function () {
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
                                                    text: "Deleting " + categoryName,
                                                    icon: "info",
                                                    buttonsStyling: false,
                                                    showConfirmButton: false,
                                                    timer: 2000
                                                }).then(function () {
                                                    Swal.fire({
                                                        text: "You have deleted " + productName + "!.",
                                                        icon: "success",
                                                        buttonsStyling: false,
                                                        confirmButtonText: "Ok, got it!",
                                                        customClass: {
                                                            confirmButton: "btn fw-bold btn-primary",
                                                        }
                                                    }).then(function () {
                                                        datatable.row($(parent)).remove().draw();
                                                    });
                                                });
                                        }else{
                                            Swal.fire({
                                                text: categoryName + " was not deleted.",
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
                            });
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text: categoryName + " was not deleted.",
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
            table = document.querySelector('#kt_ecommerce_category_table');

            if (!table) {
                return;
            }

            initDatatable();
            handleSearchDatatable();
            handleDeleteRows();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceCategories.init();
});
