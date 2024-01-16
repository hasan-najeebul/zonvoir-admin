<?php

namespace App\View\Components\store;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StoreOverview extends Component
{
    /**
     * Create a new component instance.
     */
    public $store;
    public $products;
    public $coupons;
    public $seller;
    public $manager;

    public function __construct($store, $products, $coupons, $seller, $manager)
    {
        $this->store    = $store;
        $this->products = $products;
        $this->coupons  = $coupons;
        $this->seller   = $seller;
        $this->manager  = $manager;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.store.store-overview');
    }
}
