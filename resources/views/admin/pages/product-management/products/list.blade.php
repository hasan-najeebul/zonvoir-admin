@extends('layouts.master')
    @section('title')
    {{ __('messages.products')}}
    @endsection
    @section('breadcrumbs')
        {{ Breadcrumbs::render('product-management.product.index') }}
    @endsection
@section('content')
<!--begin::Container-->
<div id="kt_content_container" class="container-xxl" url="{{ route('product-management.product.index') }}">
    <!--begin::Products-->
    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input name="search" type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Product" />
                </div>
                <!--end::Search-->
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <div class="w-100 mw-150px">
                    <!--begin::Select2-->
                    <select name="status" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-product-filter="status">
                        <option></option>
                        <option value="all">All</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="draft">Draft</option>
                        <option value="deleted">Deleted</option>
                    </select>
                    <!--end::Select2-->
                </div>
                <!--begin::Add product-->
                {{-- <a href="../../demo8/dist/apps/ecommerce/catalog/add-product.html" class="btn btn-primary">Add Product</a> --}}
                <!--end::Add product-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        {{-- <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
                            </div>
                        </th> --}}
                        <th class="min-w-200px">{{__('messages.product')}}</th>
                        <th class="min-w-80px">{{__('messages.sku')}}</th>
                        <th class="min-w-50px">{{__('messages.qty')}}</th>
                        <th class="min-w-100px">{{__('messages.points')}}</th>
                        <th class="min-w-80px">{{__('messages.created_by')}}</th>
                        <th class="min-w-80px">{{__('messages.status')}}</th>
                        <th class="min-w-100px">{{__('messages.date_created')}}</th>
                        <th class="text-end min-w-70px">{{__('messages.actions')}}</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->

            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Products-->
</div>
<!--end::Container-->
@push('scripts')
<script src="{{ asset('assets/js/custom/apps/ecommerce/catalog/products.js')}}"></script>
<script type="text/javascript">
// Class definition

</script>

@endpush
@endsection
