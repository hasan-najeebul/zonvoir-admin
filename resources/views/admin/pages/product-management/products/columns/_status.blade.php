@php
    $status_class = 'info';
    switch ($product->status) {
        case 'active':
            $status_class = 'success';
            break;
        case 'pending':
            $status_class = 'info';
            break;
        case 'deleted':
            $status_class = 'warning';
            break;
        case 'block':
            $status_class = 'danger';
    }
@endphp
<div class="badge badge-light-{{$status_class}} fw-bolder">{{ $product->status ? $product->status : ''}}</div>

