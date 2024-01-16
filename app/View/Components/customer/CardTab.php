<?php

namespace App\View\Components\customer;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardTab extends Component
{
    public $cards;
    /**
     * Create a new component instance.
     */
    public function __construct($cards)
    {
        $this->cards = $cards;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.customer.card-tab');
    }
}
