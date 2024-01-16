<div class="modal fade" id="kt_modal_update_affiliate_user" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">

            <!--begin::Form-->
            <form class="form" action="{{ route('user-management.affiliate.update', $user->id)}}" id="kt_modal_update_affiliate_user_form">
                <!--begin::Modal header-->
                @csrf
                @method('PUT')
                <div class="modal-header" id="kt_modal_add_affiliate_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">{{ __('messages.add_affiliate_user')}}</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-affiliate-users-modal-action="close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">

                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_affiliate_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_affiliate_user_header" data-kt-scroll-wrappers="#kt_modal_add_affiliate_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2">{{ __('messages.name')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" name="name" value="{{ $user->name ?? ''}}">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row g-9 mb-7">
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">{{ __('messages.email')}}</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Email address must be active"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" class="form-control form-control-solid" placeholder="" name="email" value="{{ $user->email ?? ''}}" />
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="">{{ __('messages.mobile_number')}}</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="mobile number must be active"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" class="form-control form-control-solid" placeholder="" name="mobile_number" value="{{ $user->mobile_number ?? ''}}" placeholder="00254578" />
                                <!--end::Input-->
                            </div>
                        </div>

                        <div class="row g-9 mb-7">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">{{ __('messages.website')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" name="website" value="{{ $user->affiliate->affiliate_link ?? ''}}">
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">{{ __('messages.commission')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="10" name="commission" value="{{ $user->affiliate->commission ?? ''}}">
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>


                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">{{ __('messages.description')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" name="description" value="{{ $user->affiliate->description ?? ''}}">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Billing toggle-->
                        <div class="fw-bolder fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_add_affiliate_user_info" role="button" aria-expanded="false" aria-controls="kt_affiliate_user_view_details">Address Information
                            <span class="ms-2 rotate-180">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span></div>
                            <!--end::Billing toggle-->
                            <!--begin::Billing form-->
                            <div id="kt_modal_add_affiliate_user_info" class="collapse show">
                                <!--begin::Input group-->
                                <div class="row g-9 mb-7">
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold mb-2">{{ __('messages.street')}}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" name="street" value="{{ $user->address->street ?? ''}}" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold mb-2">{{ __('messages.house_no')}}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" name="house_no" value="{{ $user->address->house_no ?? ''}}" placeholder="House No.">
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="row g-9 mb-7">
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold mb-2">{{ __('messages.town')}}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" name="city" value="{{ $user->address->city ?? ''}}"  placeholder="Melbourne">
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold mb-2">{{ __('messages.postal_code')}}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" name="postal_code" value="{{ $user->address->postal_code ?? ''}}" placeholder="00255">
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <!--end::Billing form-->
                            <!--------begin:: bank account form------------>
                            <div class="fw-bolder fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_add_affiliate_bank_info" role="button" aria-expanded="false" aria-controls="kt_affiliate_user_view_details">Bank Information
                                <span class="ms-2 rotate-180">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                                <!--end::Billing toggle-->
                                <!--begin::Billing form-->
                                <div id="kt_modal_add_affiliate_bank_info" class="collapse show">
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-7">
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-bold mb-2">{{ __('messages.name_of_the_bank')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" placeholder="" name="bank_name" value="{{ $user->bankDetails->bank_name ?? ''}}" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-bold mb-2">{{ __('messages.account_number')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" placeholder="" name="account_number" value="{{ $user->bankDetails->account_number ?? ''}}" placeholder="54545454545   ">
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                </div>
                            <!--end::Billing form-->
                            <!--------end::bank account form------------>
                        </div>
                        <div class="fv-row mb-7" id="validation-errors"></div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_add_affiliate_user_cancel" class="btn btn-light me-3" data-kt-affiliate-users-modal-action="cancel">{{ __('messages.discard')}}</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_add_affiliate_submit" class="btn btn-primary" data-kt-affiliate-users-modal-action="submit">
                        <span class="indicator-label">{{ __('messages.submit')}}</span>
                        <span class="indicator-progress">{{ __('messages.please_wait')}}...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
