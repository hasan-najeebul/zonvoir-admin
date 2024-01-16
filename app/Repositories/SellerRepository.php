<?php

namespace App\Repositories;

use App\Models\Store;
use App\Models\User;
use App\Services\StoresService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SellerRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function list($id, $type = 'partner')
    {
        $user = self::getAll($id, $type);

        return (DataTables::eloquent($user))->filter(function ($query) {
            if (request()->get('search')) {
                $searchKeyword =  strtolower(request()->get('search'));
                $query->where(function ($q) use ($searchKeyword) {
                    $q->where('name', 'LIKE', '%' . $searchKeyword . '%')
                        ->orWhere('email', 'LIKE', '%' . $searchKeyword . '%')
                        ->orWhere('status', 'LIKE', '%' . $searchKeyword . '%');
                });
            }
            if (request()->get('user_status') && request()->get('user_status') != 'all') {
                $user_status = request()->get('user_status');
                $query->where('status', $user_status);
            }
        })
            ->rawColumns(['name', 'email', 'status'])
            ->editColumn('name', function (User $user) {
                return '<a href="javascript:void(0)" class="text-gray-600 text-hover-primary mb-1">' . $user->name . '</a>';
            })
            ->editColumn('email', function (User $user) {
                return '<a href="javascript:void(0)" class="text-gray-600 text-hover-primary mb-1">' . $user->email . '</a>';
            })
            ->editColumn('store_name', function (User $user) {
                return 'NA'; //count($user->orders);
            })
            ->editColumn('status', function (User $user) {
                return sprintf('<div class="badge badge-light-%s fw-bolder">%s</div>', getStatusClass($user->status), $user->status ? $user->status : '');
            })
            ->editColumn('created_at', function (User $user) {
                return $user->created_at->format('d M Y, h:i a');
            })
            ->setRowId('id')
            ->make(true);
    }
    public static function getAll($id, $type = 'partner')
    {
        if ($id && $type == 'partner') {
            return User::where('partner_id', $id)->whereHas("roles", function ($q) {
                $q->where("name", "Seller");
            });
        }
        if ($id && $type == 'store') {
            return self::storeSellers($id);
        }
        return User::query();
    }

    public static function storeSellers($storeId){
        try {
            $store = Store::find($storeId);
            $sellerIds = $store->users->pluck('id')->toArray();
            return User::whereIn('id', $sellerIds)->whereHas("roles", function ($q) {
                $q->where("name", "Seller");
            });
        } catch (\Throwable $th) {
            return [];
        }
        return [];
    }
}
