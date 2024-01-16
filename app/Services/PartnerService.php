<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\PartnerRepository;
use Illuminate\Http\Request;

class PartnerService
{
    /**
     *
     *
     * @param  mixed $data
     * @return void
     */
    public static function getAll(User $user)
    {
        $projectManager = partnerRepository::getAllProjectManager($user->id);
        $seller         = partnerRepository::getAllSeller($user->id);
        $store          = partnerRepository::getAllStore($user->id);
        return ['user' => $user, 'projectManager' => $projectManager, 'seller' => $seller, 'store' => $store];
    }

    /**
     * update
     *
     * @return void
     */
    public static function update(array $data, $user)
    {
        return $user->update($data);
    }
}
