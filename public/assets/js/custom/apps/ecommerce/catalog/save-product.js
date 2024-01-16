"use strict";

// Class definition
var KTAppEcommerceSaveProduct = function () {

    // Private functions

    // Init quill editor
    const initQuill = () => {
        // Define all elements for quill editor
        const elements = [
            '#kt_ecommerce_add_product_description'
        ];

        // Loop all elements
        elements.forEach(element => {
            // Get quill element
            let quill = document.querySelector(element);

            // Break if element not found
            if (!quill) {
                return;
            }

            // Init quill --- more info: https://quilljs.com/docs/quickstart/
            quill = new Quill(element, {
                modules: {
                    toolbar: [
                        [{
                            header: [1, 2, false]
                        }],
                        ['bold', 'italic', 'underline'],
                        ['image', 'code-block']
                    ]
                },
                placeholder: 'Type your text here...',
                theme: 'snow' // or 'bubble'
            });
        });
    }

    // Init tagify
    const initTagify = () => {
        // Define all elements for tagify
        const elements = [
            '#kt_ecommerce_add_product_category'
        ];

        // Loop all elements
        elements.forEach(element => {
            // Get tagify element
            const tagify = document.querySelector(element);

            // Break if element not found
            if (!tagify) {
                return;
            }

            // Init tagify --- more info: https://yaireo.github.io/tagify/
            new Tagify(tagify, {
                whitelist: ["new", "trending", "sale", "discounted", "selling fast", "last 10"],
                dropdown: {
                    maxItems: 20,           // <- mixumum allowed rendered suggestions
                    classname: "tagify__inline__suggestions", // <- custom classname for this dropdown, so it could be targeted
                    enabled: 0,             // <- show suggestions on focus
                    closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
                }
            });
        });
    }


    // Init condition select2
    const initConditionsSelect2 = () => {
        // Tnit new repeating condition types
        const allConditionTypes = document.querySelectorAll('[data-kt-ecommerce-catalog-add-product="product_option"]');
        allConditionTypes.forEach(type => {
            if ($(type).hasClass("select2-hidden-accessible")) {
                return;
            } else {
                $(type).select2({
                    minimumResultsForSearch: -1
                });
            }
        });
    }




    // Init DropzoneJS --- more info:
    // const initDropzone = () => {
    //     var myDropzone = new Dropzone("#kt_ecommerce_add_product_media", {
    //         url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
    //         paramName: "file", // The name that will be used to transfer the file
    //         maxFiles: 10,
    //         maxFilesize: 10, // MB
    //         addRemoveLinks: true,
    //         accept: function (file, done) {
    //             if (file.name == "wow.jpg") {
    //                 done("Naha, you don't.");
    //             } else {
    //                 done();
    //             }
    //         }
    //     });
    // }



    // Category status handler
    const handleStatus = () => {
        const target = document.getElementById('kt_ecommerce_add_product_status');
        const select = document.getElementById('kt_ecommerce_add_product_status_select');
        const statusClasses = ['bg-success', 'bg-warning', 'bg-danger'];

        $(select).on('change', function (e) {
            const value = e.target.value;
            console.log(value);
            switch (value) {
                case "Active": {
                    target.classList.remove(...statusClasses);
                    target.classList.add('bg-success');
                    break;
                }
                case "Deleted": {
                    target.classList.remove(...statusClasses);
                    target.classList.add('bg-warning');
                    break;
                }
                case "InActive": {
                    target.classList.remove(...statusClasses);
                    target.classList.add('bg-danger');
                    break;
                }
                case "Draft": {
                    target.classList.remove(...statusClasses);
                    target.classList.add('bg-primary');
                    break;
                }
                default:
                    break;
            }
        });

    }

    // Condition type handler
    const handleConditions = () => {
        const allConditions = document.querySelectorAll('[name="method"][type="radio"]');
        const conditionMatch = document.querySelector('[data-kt-ecommerce-catalog-add-category="auto-options"]');
        allConditions.forEach(radio => {
            radio.addEventListener('change', e => {
                if (e.target.value === '1') {
                    conditionMatch.classList.remove('d-none');
                } else {
                    conditionMatch.classList.add('d-none');
                }
            });
        })
    }

    // Submit form handler
    const handleSubmit = () => {
        // Define variables
        let validator;

        // Get elements
        const form = document.getElementById('kt_ecommerce_add_product_form');
        const submitButton = document.getElementById('kt_ecommerce_add_product_submit');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'Product name is required'
                            }
                        }
                    },
                    // 'sku': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'SKU is required'
                    //         }
                    //     }
                    // },
                    // 'barcode': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Product barcode is required'
                    //         }
                    //     }
                    // },
                    'quantity': {
                        validators: {
                            notEmpty: {
                                message: 'Product quantity is required'
                            }
                        }
                    },
                    'points': {
                        validators: {
                            notEmpty: {
                                message: 'Product base price is required'
                            }
                        }
                    },
                    // 'tax': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Product tax class is required'
                    //         }
                    //     }
                    // }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Handle submit button
        submitButton.addEventListener('click', e => {
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                    if (status == 'Valid') {
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        var productFormData = new FormData($('#kt_ecommerce_add_product_form')[0]);
                        productFormData.append('description',$('#kt_ecommerce_add_product_description').text());
                        // console.log(productFormData);
                        // Disable button to avoid multiple click
                        submitButton.disabled = true;
                        $.ajax({
                            url: form.action,
                            method: "POST",
                            data: productFormData,
                            contentType: false,
                            processData: false,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (res) {
                                console.log(res);
                                if (res.status == 'success') {
                                    // Remove loading indication
                                    submitButton.removeAttribute('data-kt-indicator');

                                    // Enable button
                                    submitButton.disabled = false;

                                    // Show popup confirmation
                                    Swal.fire({
                                        text: "update Form has been successfully submitted!",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function (result) {
                                        if (result.isConfirmed) {
                                            modal.hide();
                                            // var oTable = $('#kt_table_partner_users').dataTable();
                                            // oTable.fnDraw(false);
                                            location.reload(true)
                                        }
                                    });

                                } else {
                                    console.log('else')
                                    Swal.fire({
                                        text: "Product Details was not updated.",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    }).then(function (result) {
                                        submitButton.disabled = false;
                                        return false
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                submitButton.disabled = false;
                                $('#validation-errors').html('');
                                $.each(xhr.responseJSON.errors, function (key, value) {
                                    $('#validation-errors').append('<div class="alert alert-danger">' + value + '</div');
                                });
                                Swal.fire({
                                    text: 'Product Details was not updated.',
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function (result) {

                                    submitButton.disabled = false;
                                });
                            }
                        });

                        setTimeout(function () {
                            submitButton.removeAttribute('data-kt-indicator');

                            // Swal.fire({
                            //     text: "Form has been successfully submitted!",
                            //     icon: "success",
                            //     buttonsStyling: false,
                            //     confirmButtonText: "Ok, got it!",
                            //     customClass: {
                            //         confirmButton: "btn btn-primary"
                            //     }
                            // }).then(function (result) {
                            //     if (result.isConfirmed) {
                            //         // Enable submit button after loading
                            //         submitButton.disabled = false;

                            //         // Redirect to customers list page
                            //         window.location = form.getAttribute("data-kt-redirect");
                            //     }
                            // });
                        }, 2000);
                    }
                });
            }
        })
    }

    // Public methods
    return {
        init: function () {
            // Init forms
            initQuill();
            initTagify();
            // initDropzone();
            initConditionsSelect2();

            // Handle forms
            handleStatus();
            handleConditions();
            // handleDiscount();
            // handleShipping();
            handleSubmit();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceSaveProduct.init();
});
