<?php
namespace App\Repositories;

use App\Models\Coupon;
use App\Models\User;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;
use Yajra\DataTables\Facades\DataTables;

class CouponRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function list($id = '', $type = 'partner'){
        $coupon = self::getAll($id, $type);

        return (DataTables::eloquent($coupon))->filter( function($query){
            // if(request()->get('search')){
            //     $searchKeyword =  strtolower(request()->get('search'));
            //     $query->where(function($q) use ($searchKeyword) {
            //         $q->where('coupon_code', 'LIKE', '%'.$searchKeyword.'%')
            //         ->orWhere('status', 'LIKE', '%'.$searchKeyword.'%');
            //      });
            // }
            // if(request()->get('user_status') && request()->get('status') != 'all'){
            //     $status = request()->get('status');
            //     $query->where('status', $status);
            // }
        })
        ->rawColumns(['coupon_code', 'status'])
        ->editColumn('coupon_code', function (Coupon $coupon) {
            return '<a href="javascript:void(0)" class="text-gray-800 text-hover-primary mb-1">'.$coupon->coupon_code.'</a>';
        })
        ->editColumn('coupon_value', function (Coupon $coupon) {
            return $coupon->coupon_value;
        })
        ->editColumn('expire_at', function (Coupon $coupon) {
            return $coupon->created_at->format('d M Y, h:i a');
        })
        ->editColumn('status', function (Coupon $coupon) {
            return sprintf('<div class="badge badge-light-%s fw-bolder">%s</div>',getStatusClass($coupon->status), $coupon->status ? $coupon->status : '');
        })
        ->editColumn('created_at', function (Coupon $coupon) {
            return $coupon->created_at->format('d M Y, h:i a');
        })
        // ->addColumn('action', function (Coupon $coupon) {
        //     return view('admin.pages.user-management.partner-users.columns._actions', compact('user'));
        // })
        ->setRowId('id')
        ->make(true);
    }
    public static function getAll($id = '', $type = 'partner'){
        if($id && $type == 'partner'){
            return Coupon::select('coupons.*','stores.name as store_name','users.name as partner_name')
            ->join('stores', 'coupons.store_id', '=', 'stores.id')
            ->join('users', 'stores.partner_id', '=', 'users.id')->where('stores.partner_id', $id);
        }
        if($id && $type == 'store'){
            return Coupon::where('store_id',$id);
        }
        return Coupon::query();
    }
}
