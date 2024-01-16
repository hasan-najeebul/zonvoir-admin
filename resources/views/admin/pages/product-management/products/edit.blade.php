@extends('layouts.master')
@section('title')
    {{ __('messages.products') }}
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('product-management.product.index') }}
@endsection
@section('content')
    <!--begin::Container-->

    <div id="kt_content_container" class="container-xxl">

        <div id="validation-errors"></div>
        <!--begin::Form-->
        <form id="kt_ecommerce_add_product_form" action="{{ route('product-management.product.update', $product) }}"
            enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row">
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

                            @if (isset($product->featuredImage()->path))
                                <div class="image-input-wrapper w-150px h-150px"
                                    style="background-image:url({{ $product->imagePath($product->featuredImage()->path) ?? '' }});"></div>
                            @else
                                <div class="image-input-wrapper w-150px h-150px"
                                    style="background-image: url({{ asset('assets/media/stock/ecommerce/78.gif') }})">
                                </div>
                            @endif

                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="product_image" accept=".png, .jpg, .jpeg" />
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
                        <div class="text-muted fs-7">{{ __('messages.set_product_thumbnail_info') }}</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Thumbnail settings-->
                <!--begin::Status-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>{{ __('messages.status') }}</h2>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <div class="rounded-circle bg-{{ getStatusClass($product->status) ?? 'warning' }} w-15px h-15px"
                                id="kt_ecommerce_add_product_status"></div>
                        </div>
                        <!--begin::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Select2-->
                        <select class="form-select mb-2" name="status" data-control="select2" data-hide-search="true"
                            data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select">
                            <option></option>
                            @foreach (getProductStatus() as $key => $status)
                                <option vale="{{ $key }}"
                                    @if ($product->status == $key) {{ 'selected' }} @endif>{{ $status ?? '' }}
                                </option>
                            @endforeach
                        </select>
                        <!--end::Select2-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">{{ __('messages.set_a_product_status') }}</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Status-->
                <!--begin::Category & tags-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>{{ __('messages.product_details') }}</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <!--begin::Label-->
                        <label class="form-label">{{ __('messages.categories') }}</label>
                        <!--end::Label-->
                        <!--begin::Select2-->
                        <select class="form-select mb-2" data-control="select2" data-placeholder="Select an option"
                            data-allow-clear="true" multiple="multiple">
                            <option></option>
                            <option value="Computers">Computers</option>
                            <option value="Watches">Watches</option>
                            <option value="Headphones">Headphones</option>
                            <option value="Footwear">Footwear</option>
                            <option value="Cameras">Cameras</option>
                            <option value="Shirts">Shirts</option>
                            <option value="Household">Household</option>
                            <option value="Handbags">Handbags</option>
                            <option value="Wines">Wines</option>
                            <option value="Sandals">Sandals</option>
                        </select>
                        <!--end::Select2-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7 mb-7">{{ __('messages.add_product_to_a_category') }}</div>
                        <!--end::Description-->
                        <!--end::Input group-->
                        <!--begin::Button-->
                        {{-- <a href="../../demo8/dist/apps/ecommerce/catalog/add-category.html"
                            class="btn btn-light-primary btn-sm mb-10">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1"
                                        transform="rotate(-90 11 18)" fill="black" />
                                    <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Create new category
                        </a> --}}
                        <!--end::Button-->
                        <!--begin::Input group-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Category & tags-->


            </div>
            <!--end::Aside column-->
            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <!--begin:::Tabs-->
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_product_general">{{ __('messages.general') }}</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_product_advanced">{{ __('messages.advanced') }}</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    {{-- <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_product_reviews">Reviews</a>
                    </li> --}}
                    <!--end:::Tab item-->
                </ul>
                <!--end:::Tabs-->
                <!--begin::Tab content-->
                <div class="tab-content">
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
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
                                        <label class="required form-label">{{ __('messages.product_name') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="name" class="form-control mb-2"
                                            placeholder="Product name" value="{{ $product->name ?? '' }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">{{ __('messages.product_name_is_required_msg') }}
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div>
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('messages.description') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <div id="kt_ecommerce_add_product_description"
                                            name="kt_ecommerce_add_product_description" class="min-h-200px mb-2">
                                            {{ $product->description }}</div>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">
                                            {{ __('messages.set_a_description_to_product_visibility') }}</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::General options-->

                            <!--begin::Pricing-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{ __('messages.pricing') }}</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('messages.base_price') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="points" class="form-control mb-2"
                                            placeholder="Product price" value="{{ $product->points ?? '' }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">{{ __('messages.set_product_price') }}</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->



                                    <!--begin::Tax-->
                                    {{-- <div class="d-flex flex-wrap gap-5">
                                        <!--begin::Input group-->
                                        <div class="fv-row w-100 flex-md-root">
                                            <!--begin::Label-->
                                            <label class="required form-label">{{ __('messages.tax_class')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Select2-->
                                            <select class="form-select mb-2" name="tax" data-control="select2"
                                                data-hide-search="true" data-placeholder="Select an option">
                                                <option></option>
                                                <option value="0">Tax Free</option>
                                                <option value="1" selected="selected">Taxable Goods</option>
                                                <option value="2">Downloadable Product</option>
                                            </select>
                                            <!--end::Select2-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Set the product tax class.</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row w-100 flex-md-root">
                                            <!--begin::Label-->
                                            <label class="form-label">VAT Amount (%)</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control mb-2" value="35" />
                                            <!--end::Input-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Set the product VAT about.</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->
                                    </div> --}}
                                    <!--end:Tax-->
                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::Pricing-->
                        </div>
                    </div>
                    <!--end::Tab pane-->
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <!--begin::Inventory-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{ __('messages.inventory') }}</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('messages.sku') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="sku" class="form-control mb-2"
                                            placeholder="SKU Number" value="{{ $product->sku ?? '' }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">{{ __('messages.enter_product_sku') }}</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('messages.barcode') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="barcode" class="form-control mb-2"
                                            placeholder="Barcode Number" value="{{ $product->barcode ?? '' }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">{{ __('messages.enter_the_product_barcode_number') }}
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('messages.quantity') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->

                                        <div class="d-flex gap-3">
                                            <input type="number" name="quantity" class="form-control mb-2"
                                                placeholder="quantity" value="{{ $product->quantity ?? '' }}" />

                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">{{ __('messages.enter_the_product_quantity') }}</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('messages.product_weight') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->

                                        <div class="d-flex gap-3">
                                            <input type="number" name="weight" class="form-control mb-2"
                                                placeholder="weight" value="{{ $product->weight ?? '' }}" />
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">{{ __('messages.enter_the_product_quantity') }}</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('messages.allow_backorder') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div class="form-check form-check-custom form-check-solid mb-2">
                                            <input class="form-check-input" type="checkbox"
                                                value="{{ $product->backorder ?? '' }}"
                                                @if ($product->backorder == 1) {{ __('checked') }} @endif>
                                            <label class="form-check-label">{{ __('messages.yes') }}</label>
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">
                                            {{ __('messages.allow_customer_to_purchase_product_that_are_outofstock') }}
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::Inventory-->

                        </div>
                    </div>
                    <!--end::Tab pane-->

                </div>
                <!--end::Tab content-->
                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <a href="{{ route('product-management.product.index') }}" id="kt_ecommerce_add_product_cancel"
                        class="btn btn-light me-5">{{ __('messages.cancel') }}</a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="button" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                        <span class="indicator-label">{{ __('messages.save_changes') }}</span>
                        <span class="indicator-progress">{{ __('messages.please_wait') }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
            </div>
            <!--end::Main column-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Container-->
    @push('scripts')
        <script src="{{ asset('assets/js/custom/apps/ecommerce/catalog/save-product.js') }}"></script>
    @endpush
@endsection
