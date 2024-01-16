"use strict";

// Class definition
var KTAffiliateUsersUpdateDetails = function () {
    // Shared variables
    const element = document.getElementById('kt_modal_add_affiliate_user');
    const form = element.querySelector('#kt_modal_add_affiliate_user_form');

    const modal = new bootstrap.Modal(element);

    // Init add schedule modal
    var initUpdateDetails = () => {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {

                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'Full name is required'
                            }
                        }
                    },
                    'email': {
                        validators: {
                            notEmpty: {
                                message: 'Email address is required'
                            }
                        }
                    },
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'The password is required'
                            },
                            callback: {
                                message: 'Please enter valid password',
                                callback: function (input) {
                                    if (input.value.length > 0) {
                                        return validatePassword();
                                    }
                                }
                            }
                        }
                    },
                    'password_confirmation': {
                        validators: {
                            notEmpty: {
                                message: 'The password confirmation is required'
                            },
                            identical: {
                                compare: function () {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'The password and its confirm are not the same'
                            }
                        }
                    },
                    'commission': {
                        validators: {
                            notEmpty: {
                                message: 'commission is required'
                            }
                        }
                    },
                    'street': {
                        validators: {
                            notEmpty: {
                                message: 'Street address is required'
                            }
                        }
                    },
                    'house_no': {
                        validators: {
                            notEmpty: {
                                message: 'house no is required'
                            }
                        }
                    },
                    'city': {
                        validators: {
                            notEmpty: {
                                message: 'city is required'
                            }
                        }
                    },
                    'postal_code': {
                        validators: {
                            notEmpty: {
                                message: 'Postal Code is required'
                            }
                        }
                    },
                    'bank_name': {
                        validators: {
                            notEmpty: {
                                message: 'bank name is required'
                            }
                        }
                    },
                    'account_number': {
                        validators: {
                            notEmpty: {
                                message: 'account number is required'
                            }
                        }
                    },


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

        // Close button handler
        const closeButton = element.querySelector('[data-kt-affiliate-users-modal-action="close"]');
        closeButton.addEventListener('click', e => {
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel sdf?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                    $('#validation-errors').html('');
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });

        // Cancel button handler
        const cancelButton = element.querySelector('[data-kt-affiliate-users-modal-action="cancel"]');
        cancelButton.addEventListener('click', e => {
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                    $('#validation-errors').html('');
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });

                }
            });
        });

        // Submit button handler
        const submitButton = element.querySelector('[data-kt-affiliate-users-modal-action="submit"]');
        submitButton.addEventListener('click', function (e) {
            // Prevent default button action
            e.preventDefault();
            if (validator) {
                validator.validate().then(function (status) {
                    if (status == 'Valid') {
                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        var UserformData = $('#kt_modal_add_affiliate_user_form').serialize();
                        // console.log(UserformData);
                        // Disable button to avoid multiple click
                        submitButton.disabled = true;
                        $.ajax({
                            url: form.action,
                            method: "POST",
                            data: UserformData,
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
                                            var oTable = $('#kt_table_affiliate_users').dataTable();
                                            oTable.fnDraw(false);
                                        }
                                    });

                                } else {
                                    console.log('else')
                                    Swal.fire({
                                        text: "User Details was not updated.",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    }).then(function (result) {

                                        return false
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                //console.log(error);
                                $('#validation-errors').html('');
                                $.each(xhr.responseJSON.errors, function (key, value) {
                                    $('#validation-errors').append('<div class="alert alert-danger">' + value + '</div');
                                });
                                Swal.fire({
                                    text: 'User Details was not updated.',
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function (result) {

                                });
                            }
                        });
                        // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        setTimeout(function () {
                            // Remove loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;

                            // Show popup confirmation
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
                            //         //modal.hide();
                            //     }
                            // });

                            //form.submit(); // Submit form
                        }, 2000);
                    }
                })
            }
        });
    }

    return {
        // Public functions
        init: function () {
            initUpdateDetails();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAffiliateUsersUpdateDetails.init();
});
