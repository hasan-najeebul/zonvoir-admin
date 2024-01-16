@extends('layouts.master')

    @section('title')
        {{ __('messages.seller') }}
    @endsection
    @section('breadcrumbs')
            {{ Breadcrumbs::render('store-management.seller-list',$store) }}
    @endsection
@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Navbar-->
       <x-store.store-overview :store=$store :products=$products :coupons=$coupons :seller=$seller :manager=$manager ></x-store-overview>
        <!--begin::Row-->
         <!--begin:::Tab content-->
         <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="kt_partner_user_view_product_tab" role="tabpanel">
                <!--begin::Card-->
                <x-seller-list :data=$store :url="route('store-management.seller-list', $store->id)"></x-seller-list>
                <!--end::Card-->
            </div>
        </div>
        <!--end:::Tab content-->
        {{-- <div class="row g-5 g-xxl-8">
            <div class="card mb-9">
                dasdasd
            </div>
            <!--end::Col-->
        </div> --}}
        <!--end::Row-->
    </div>
    <!--end::Container-->
    @push('scripts')
    <script src="{{ asset('assets/js/custom/apps/user-management/seller/list/list.js')}}"></script>
    @endpush
@endsection
