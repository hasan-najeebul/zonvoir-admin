<?php
namespace App\Repositories;

use App\Models\RedeemedReward;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RedeemedRewardRepository
{

    public function list($customerId = ''){
        $reward = self::getAll($customerId);

        return (DataTables::eloquent($reward))->filter( function($query){

        })
        ->editColumn('order_id', function (RedeemedReward $reward) {
            return $reward->order_id;
        })
        ->editColumn('redeem_points', function (RedeemedReward $reward) {
            return '-'.$reward->redeem_points;
        })
        ->editColumn('created_at', function (RedeemedReward $reward) {
            return $reward->created_at->format('d M Y, h:i a');
        })
        ->setRowId('id')
        ->make(true);
    }
    public static function getAll($customerId = ''){
        if($customerId){
            return RedeemedReward::where('customer_id',$customerId)->with(['user']);
        }
        return RedeemedReward::with(['user']);
    }
}
