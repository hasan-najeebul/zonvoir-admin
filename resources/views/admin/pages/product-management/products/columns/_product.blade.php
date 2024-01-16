<td>
    <div class="d-flex align-items-center">
        <!--begin::Thumbnail-->
        <a href="javascript:void(0)" class="symbol symbol-50px">
            @if(isset($product->featuredImage()->path))
                <span class="symbol-label" style="background-image:url({{ $product->imagePath($product->featuredImage()->path) ?? '' }}"></span>
            @else
                <span class="symbol-label" style="background-image:url({{ asset('assets/media//stock/ecommerce/1.gif')}});"></span>
            @endif

        </a>
        <!--end::Thumbnail-->
        <div class="ms-5">
            <!--begin::Title-->
            <a href="{{ route('product-management.product.edit', $product)}}" class="text-gray-800 text-hover-primary fs-5 fw-bolder" data-kt-ecommerce-product-filter="product_name">{{ $product->name ?? ''}}</a>

            <!--end::Title-->
        </div>
    </div>
</td>
