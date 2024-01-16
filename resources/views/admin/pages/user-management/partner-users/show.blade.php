@extends('layouts.master')

    @section('title')
        {{ __('messages.partners') }}
    @endsection
    @section('breadcrumbs')
        {{ Breadcrumbs::render('user-management.partner.show', $user) }}
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
            <div class="tab-pane fade show active" id="kt_partner_user_view_project_manager_tab" role="tabpanel">
                <!--begin::Card-->
                <x-project-manager-list :data=$user :url="route('user-management.project-manager',$user->id)"></x-project-manager-list>
                <!--end::Card-->
            </div>
        </div>
        <!--end:::Tab content-->
        @include('admin.pages.user-management.partner-users.modals._update-details')
    </div>
    <!--end::Container-->
    @push('scripts')
        <script src="{{ asset('assets/js/custom/apps/user-management/partner-user/view/update.js')}}"></script>
        <script src="{{ asset('assets/js/custom/apps/user-management/project-manager/list/list.js')}}"></script>
    @endpush
@endsection
