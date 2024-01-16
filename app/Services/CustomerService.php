<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class CustomerService
{
    public static function getAll($user)
    {
        $user = CustomerRepository::getAll()->first();
        return ['user' => $user];
    }
}
