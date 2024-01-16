<?php

namespace App\View\Components\orders;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrderList extends Component
{
    public $user;
    public $url;
    /**
     * Create a new component instance.
     */
    public function __construct($user, $url)
    {
        $this->user = $user;
        $this->url  = $url;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.orders.order-list');
    }
}
