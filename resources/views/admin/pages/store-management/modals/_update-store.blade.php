<div class="modal fade" id="kt_modal_update_store" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">

            <!--begin::Form-->
            <form class="form" action="{{ route('store-management.store.update', $store->id)}}" id="kt_modal_update_store_form">
                <!--begin::Modal header-->
                @csrf
                @method('PUT')
                <div class="modal-header" id="kt_modal_update_store_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">{{ __('messages.edit_store')}}</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-store-modal-action="close">
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
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_update_store_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_store_header" data-kt-scroll-wrappers="#kt_modal_update_store_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2">{{ __('messages.name')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" name="name" value="{{ $store->name ?? ''}}">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row g-9 mb-7">
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">{{ __('messages.number')}}</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="number"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" class="form-control form-control-solid" placeholder="" name="number" value="{{ $store->number ?? ''}}" />
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
                                <input type="number" class="form-control form-control-solid" placeholder="" name="mobile_number" value="{{ $store->mobile_number ?? ''}}" placeholder="00254578" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">{{ __('messages.description')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" name="description" value="{{ $store->description ?? ''}}">
                            <!--end::Input-->
                        </div>
                         <!--begin::Input group-->
                         <div class="fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">{{ __('messages.status')}}</label>

                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="status" aria-label="{{ __('messages.select_status')}}" data-control="select2" data-placeholder="{{ __('messages.select_status')}}..." class="form-select form-select-solid" data-dropdown-parent="#kt_modal_update_store">
                                <option></option>
                                @foreach(getStoreStatus() as $key => $status)
                                    <option vale="{{$key}}" @if($store->status == $key) {{'selected'}}@endif>{{$status ?? ''}}</option>
                                @endforeach

                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Billing toggle-->
                        <div class="fw-bolder fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_update_store_info" role="button" aria-expanded="false" aria-controls="kt_store_view_details">{{ __('messages.address_information')}}
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
                            <div id="kt_modal_update_store_info" class="collapse show">
                                <!--begin::Input group-->
                                <div class="row g-9 mb-7">
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold mb-2">{{ __('messages.street')}}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" name="street" value="{{ $store->street ?? ''}}" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->

                                </div>
                                <div class="row g-9 mb-7">
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold mb-2">{{ __('messages.town')}}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" name="town" value="{{ $store->town ?? ''}}"  placeholder="Melbourne">
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold mb-2">{{ __('messages.postal_code')}}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" name="postal_code" value="{{ $store->postal_code ?? ''}}" placeholder="00255">
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <!--end::Billing form-->

                        </div>
                        <div class="fv-row mb-7" id="validation-errors"></div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_update_store_cancel" class="btn btn-light me-3" data-kt-store-modal-action="cancel">{{ __('messages.discard')}}</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_update_store_submit" class="btn btn-primary" data-kt-store-modal-action="submit">
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
