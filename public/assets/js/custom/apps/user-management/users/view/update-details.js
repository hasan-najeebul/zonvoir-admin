"use strict";

// Class definition
var KTUsersUpdateDetails = function () {
    // Shared variables
    const element = document.getElementById('kt_modal_update_details');
    const form = element.querySelector('#kt_modal_update_user_form');

    const modal = new bootstrap.Modal(element);

    // Init add schedule modal
    var initUpdateDetails = () => {
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
                    'zipcode': {
                        validators: {
                            notEmpty: {
                                message: 'Postal Code is required'
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
        const closeButton = element.querySelector('[data-kt-users-modal-action="close"]');
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
        const cancelButton = element.querySelector('[data-kt-users-modal-action="cancel"]');
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
        const submitButton = element.querySelector('[data-kt-users-modal-action="submit"]');
        submitButton.addEventListener('click', function (e) {
            // Prevent default button action
            e.preventDefault();
            if (validator) {
                validator.validate().then(function (status) {
                    if (status == 'Valid') {
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        var UserformData = new FormData($('#kt_modal_update_user_form')[0]);
                        console.log(UserformData);
                        // Disable button to avoid multiple click
                        submitButton.disabled = true;
                        $.ajax({
                            url: form.action,
                            method: "POST",
                            data: UserformData,
                            contentType: false,
                            processData: false,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(res) {
                                console.log(res);
                            if(res.status == 'success'){
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
                                        location.reload();
                                    }
                                });

                            }else{
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
                                    if (result.isConfirmed) {
                                        modal.hide();
                                    }
                                });
                            }
                            },
                            error: function (xhr, status, error) {
                                // console.log(error);
                                if(xhr.responseJSON.errors != 'undefined'){
                                    // console.log(xhr.responseJSON.errors);
                                    error = xhr.responseJSON.errors
                                    $.each(xhr.responseJSON.errors, function (key, value) {
                                        $('#validation-errors').append('<div class="alert alert-danger">' + value + '</div');
                                    });
                                }
                                Swal.fire({
                                    text: "User detail not updated",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function (result) {
                                    // if (result.isConfirmed) {
                                    //     modal.hide();
                                    // }
                                });
                            }
                        });
                        // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        setTimeout(function () {
                            // Remove loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;
                            //form.submit(); // Submit form
                        }, 2000);
                    }
                });
            }

            // Show loading indication
        });
    }
    // Update status
    var handleUpdateStatus = () => {
        // Select all delete buttons
        const updateStaus = document.querySelector('[data-kt-action="update_status"]');

            // Delete button on click
            updateStaus.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                console.log(e.target.getAttribute('data-kt-user-id'));

                // Get customer name

                const userName  = e.target.getAttribute('data-kt-user-name');
                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to Approve " + userName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, Approved!",
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
                            method: "POST",
                            // data: {'id':id},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(res) {
                            if(res.status == 'success'){
                                // Simulate delete request -- for demo purpose only
                                    Swal.fire({
                                        text: "Updating " + userName,
                                        icon: "info",
                                        buttonsStyling: false,
                                        showConfirmButton: false,
                                        timer: 2000
                                    }).then(function () {
                                        Swal.fire({
                                            text: "You have Approved " + userName + "!.",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn fw-bold btn-primary",
                                            }
                                        }).then(function () {
                                            location.reload(true);
                                        });
                                    });
                            }else{
                                Swal.fire({
                                    text: userName + " was not Approved.",
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
                            text: userName + " was not Approved.",
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
    }

    return {
        // Public functions
        init: function () {
            initUpdateDetails();
            handleUpdateStatus();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdateDetails.init();
});
