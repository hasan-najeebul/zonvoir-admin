<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PartnerOverview extends Component
{
    /**
     * Create a new component instance.
     */
    public $user;
    public $store;
    public $seller;
    public $projectManager;
    public function __construct($user, $projectManager, $seller, $store )
    {

        $this->user = $user;
        $this->store = $store;
        $this->seller = $seller;
        $this->projectManager = $projectManager;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partner-overview');
    }
}
