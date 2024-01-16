<div class="d-flex">
    <!--begin::Thumbnail-->
    <a href="javascript:void(0)" class="symbol symbol-50px">
        @if($category->category_image)
            <span class="symbol-label" style="background-image:url({{ $category->categoryImage() ?? ''}});"></span>
        @else
            <span class="symbol-label" style="background-image:url({{ asset('assets/media/stock/ecommerce/68.gif')}});"></span>
        @endif
    </a>
    <!--end::Thumbnail-->
    <div class="ms-5">
        <!--begin::Title-->
        <a href="javascript:void(0)" class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1" data-kt-ecommerce-category-filter="category_name">{{ $category->name}}</a>
        <!--end::Title-->
        <!--begin::Description-->
        <div class="text-muted fs-7 fw-bolder">{{ $category->description ?? ''}}.</div>
        <!--end::Description-->
    </div>
</div>
