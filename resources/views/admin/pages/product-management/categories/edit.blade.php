@extends('layouts.master')
@section('title')
    {{ __('messages.categories') }}
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('product-management.category.index') }}
@endsection
@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div id="validation-errors"></div>
        <form id="kt_ecommerce_add_category_form" action="{{ route('product-management.category.update', $category) }}"
            class="form d-flex flex-column flex-lg-row">
            <!--begin::Aside column-->
            @csrf
            @method('PUT')
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <!--begin::Thumbnail settings-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>{{ __('messages.thumbnail') }}</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body text-center pt-0">
                        <!--begin::Image input-->
                        <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                            style="">
                            <!--begin::Preview existing avatar-->
                            @if ($category->category_image)
                                <div class="image-input-wrapper w-150px h-150px"
                                    style="background-image:url({{ $category->categoryImage() ?? '' }});"></div>
                                @else
                                    <div class="image-input-wrapper w-150px h-150px"
                                        style="background-image: url({{ asset('assets/media/stock/ecommerce/68.gif') }}">
                                    </div>
                            @endif

                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <!--begin::Icon-->
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--end::Icon-->
                                <!--begin::Inputs-->
                                <input type="file" name="category_image" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">{{ __('messages.set_category_thumbnail_info') }} </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Thumbnail settings-->
                <!--begin::Parent Category-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>{{ __('messages.parent_category') }}</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Select2-->
                        <select class="form-select mb-2" name="parent" data-control="select2" data-hide-search="true"
                            data-placeholder="Select an option" id="kt_ecommerce_add_category_status_select">
                            <option></option>
                            @forelse($parentCategories as $value)
                                <option value="{{ $value->id }}" @if ($category->parent == $value->id) {{ 'selected'}}

                                @endif>{{ $value->name ?? '' }}</option>
                            @empty
                                <option value="0"></option>
                            @endforelse
                        </select>
                        <!--end::Select2-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">{{ __('messages.select_a_parent_category') }} </div>
                        <!--end::Description-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Parent Category-->
                <!--begin::Status-->
                {{-- <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>{{ __('messages.status')}}</h2>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status">
                            </div>
                        </div>
                        <!--begin::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Select2-->
                        <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                            data-placeholder="Select an option" id="kt_ecommerce_add_category_status_select">
                            <option></option>
                            <option value="published" selected="selected">Published</option>
                            <option value="scheduled">Scheduled</option>
                            <option value="unpublished">Unpublished</option>
                        </select>
                        <!--end::Select2-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">{{ __('messages.set_a_category_status')}} </div>
                        <!--end::Description-->

                    </div>
                    <!--end::Card body-->
                </div> --}}
                <!--end::Status-->

            </div>
            <!--end::Aside column-->
            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <!--begin::General options-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{ __('messages.general') }}</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">{{ __('messages.category_name') }} </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="name" class="form-control mb-2" placeholder="Product name"
                                value="{{ $category->name ?? '' }}" />
                            <!--end::Input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">{{ __('messages.category_name_is_required_msg') }} </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div>
                            <!--begin::Label-->
                            <label class="form-label">{{ __('messages.description') }}</label>
                            <!--end::Label-->
                            <!--begin::Editor-->
                            <div id="kt_ecommerce_add_category_description" name="kt_ecommerce_add_category_description"
                                class="min-h-200px mb-2">{{ $category->description }}</div>
                            <!--end::Editor-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">{{ __('messages.set_a_description_to_category_visibility') }}
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::General options-->

                <!--end::Automation-->
                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <a href="{{ route('product-management.category.index') }}" id="kt_ecommerce_add_product_cancel"
                        class="btn btn-light me-5">{{ __('messages.cancel') }} </a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                        <span class="indicator-label">{{ __('messages.save_changes') }} </span>
                        <span class="indicator-progress">{{ __('messages.please_wait') }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
            </div>
            <!--end::Main column-->
        </form>
    </div>
    <!--end::Container-->
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/apps/ecommerce/catalog/save-category.js') }}"></script>
@endpush
