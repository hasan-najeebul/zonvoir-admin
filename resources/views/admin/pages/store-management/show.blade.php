@extends('layouts.master')

    @section('title')
        {{ __('messages.stores') }}
    @endsection
    @section('breadcrumbs')
        {{ Breadcrumbs::render('store-management.store.products',$store) }}
    @endsection

@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Navbar-->
       <x-store.store-overview :store=$store :products=$products :coupons=$coupons :seller=$seller :manager=$manager></x-store-overview>
        <!--begin::Row-->
         <!--begin:::Tab content-->
         <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="kt_partner_user_view_product_tab" role="tabpanel">
                <!--begin::Card-->
                <x-product-list :data=$store :url="route('store-management.store.products', $store->id)"></x-product-list>
                <!--end::Card-->
            </div>
        </div>
        <!--end:::Tab content-->
       @include('admin.pages.store-management.modals._update-store')
    </div>
    <!--end::Container-->
    @push('scripts')
    <script src="{{ asset('assets/js/custom/apps/store-management/edit-store.js')}}"></script>
    @endpush
@endsection
