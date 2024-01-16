<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SellerList extends Component
{
    public $data;
    public $url;
    /**
     * Create a new component instance.
     */

    public function __construct($data, $url)
    {
       $this->data = $data;
       $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.seller-list');
    }
}
