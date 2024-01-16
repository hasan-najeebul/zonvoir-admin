"use strict";

// Class definition
var KTUsersUpdateRole = function () {
    // Shared variables
    const element = document.getElementById('kt_modal_update_role');
    const form = element.querySelector('#kt_modal_update_role_form');
    const modal = new bootstrap.Modal(element);

    // Init add schedule modal
    var initUpdateRole = () => {

        // Close button handler
        const closeButton = element.querySelector('[data-kt-users-modal-action="close"]');
        closeButton.addEventListener('click', e => {
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

            // Show loading indication
            submitButton.setAttribute('data-kt-indicator', 'on');

            // Disable button to avoid multiple click
            submitButton.disabled = true;
            var formdata = $('#kt_modal_update_role_form').serialize();
            // var formData = new FormData(form);
            console.log(formdata);
            $.ajax({
                type: 'PUT',
                url: form.action,
                data: formdata,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    if(res.status == 'success'){
                        // Remove loading indication
                        submitButton.removeAttribute('data-kt-indicator');

                        // Enable button
                        submitButton.disabled = false;

                        // Show popup confirmation
                        Swal.fire({
                            text: "User Role has been successfully Updated!",
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
                        Swal.fire({
                            text: "Role was not updated.",
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
                        return false;
                    }
                },
                error: function (xhr, status, error) {
                    // console.log(error);
                    Swal.fire({
                        text: error,
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

                // Show popup confirmation
                // Swal.fire({
                //     text: "Role Form has been successfully submitted!",
                //     icon: "success",
                //     buttonsStyling: false,
                //     confirmButtonText: "Ok, got it!",
                //     customClass: {
                //         confirmButton: "btn btn-primary"
                //     }
                // }).then(function (result) {
                //     if (result.isConfirmed) {
                //         modal.hide();
                //     }
                // });

                //form.submit(); // Submit form
            }, 2000);
        });
    }

    return {
        // Public functions
        init: function () {
            initUpdateRole();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdateRole.init();
});
