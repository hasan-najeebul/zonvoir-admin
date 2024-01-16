"use strict";
var KTAppEcommerceProducts = function () {
    // Shared variables
    var table;
    var datatable;
    var productListUrl

    // Private functions
    var initDatatable = function () {
        productListUrl = $('.container-xxl').attr('url');
        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[0, 'desc']],
            ajax: {
                url: productListUrl,
                data:function(d) {
                    d.search_key = $('input[name="search"]').val(),
                    d.status = $('select[name="status"]').val()
                }
            },
            columns: [
                { data: 'name' },
                { data: 'sku' },
                { data: 'quantity' },
                { data: 'points' },
                { data: 'created_by' },
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
            ],
        });


        // Re-init functions on datatable re-draws
        datatable.on('draw', function () {
            handleDeleteRows();
            KTMenu.createInstances();
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-ecommerce-product-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Handle status filter dropdown
    var handleStatusFilter = () => {
        const filterStatus = document.querySelector('[data-kt-ecommerce-product-filter="status"]');
        $(filterStatus).on('change', e => {
            let value = e.target.value;
            if(value === 'all'){
                value = '';
            }
            datatable.column(5).search(value).draw();
        });
    }

    // Delete cateogry
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[data-kt-ecommerce-product-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get category name
                const productName = parent.querySelector('[data-kt-ecommerce-product-filter="product_name"]').innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + productName + "?",
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
                            text: "You have deleted " + productName + "!.",
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
                                                text: "Deleting " + productName,
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
                                            text: productName + " was not deleted.",
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
                            text: productName + " was not deleted.",
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
            table = document.querySelector('#kt_ecommerce_products_table');

            if (!table) {
                return;
            }

            initDatatable();
            handleSearchDatatable();
            handleStatusFilter();
            handleDeleteRows();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceProducts.init();
});
