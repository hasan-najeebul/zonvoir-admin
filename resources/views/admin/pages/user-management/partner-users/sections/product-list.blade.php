@extends('layouts.master')

    @section('title')
        {{ __('messages.partners') }}
    @endsection

    @section('breadcrumbs')
                {{ Breadcrumbs::render('product-management.partner.products', $user) }}
    @endsection
@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Navbar-->
       <x-partner-overview :user=$user :projectManager=$projectManager :seller=$seller :store=$store ></x-partner-overview>
        <!--end::Navbar-->
        <!--begin::Row-->
         <!--begin:::Tab content-->
         <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active">
                <!--begin::Card-->
                <x-product-list :data=$user :url="route('product-management.partner.products', $user->id)"></x-product-list>
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
        <script src="{{ asset('assets/js/custom/apps/user-management/partner-user/list/product-list.js')}}"></script>
    @endpush
@endsection
