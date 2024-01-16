<?php
namespace App\Repositories;

use App\Models\CustomerPoint;
use App\Models\Order;
use App\Models\RewardsPoint;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RewardRepository
{

    public function list($customerId = ''){
        $reward = self::getAll($customerId);

        return (DataTables::eloquent($reward))->filter( function($query){

        })
        // ->rawColumns(['name'])
        ->editColumn('product_name', function (RewardsPoint $reward) {
            return $reward->product_name;
        })
        ->editColumn('earn_point', function (RewardsPoint $reward) {
            return $reward->earn_point;
        })

        ->editColumn('expire_at', function (RewardsPoint $reward) {
            return $reward->expire_at->format('d M Y');
        })
        ->editColumn('created_at', function (RewardsPoint $reward) {
            return $reward->created_at->format('d M Y, h:i a');
        })
        ->setRowId('id')
        ->make(true);
    }
    public static function getAll($customerId = ''){
        if($customerId){
            return RewardsPoint::where('customer_id',$customerId)->with(['user']);
        }
        return RewardsPoint::with(['user']);
    }
}
