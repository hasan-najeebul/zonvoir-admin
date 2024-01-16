<?php
namespace App\Repositories;

use App\Models\CustomerPoint;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderRepository
{
    protected $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }
    public function list($customerId = ''){
        $order = self::getAll($customerId);
        return (DataTables::eloquent($order))->filter( function($query){
            if(request()->get('search')){
                $searchKeyword =  strtoupper(request()->get('search'));
                // $query
                //->whereHas('user', fn($q) => $q->where('name', 'LIKE', '%'.$searchKeyword.'%'));
                $query->where(function($q) use ($searchKeyword) {
                    $q->Where('order_total', 'LIKE', '%'.$searchKeyword.'%')
                    ->orWhere('status', 'LIKE', '%'.$searchKeyword.'%');
                 });
            }

            if(request()->get('status') && request()->get('status') != 'all'){
                $user_status = request()->get('status');
                $query->where('status', $user_status);
            }
        })
        ->rawColumns(['customer', 'status','id','action'])
        ->editColumn('id', function (Order $order) {
            return '<a href="'.route('user-management.order.show',$order->id).'">'.$order->id.'</a>';
        })
        ->editColumn('customer', function (Order $order) {
            return view('admin.pages.customer-management.customers.columns._customer', compact('order'));
        })
        ->editColumn('order_total', function (Order $order) {
            return $order->order_total;
        })
        ->editColumn('status', function (Order $order) {
            return sprintf('<div class="badge badge-light-%s fw-bolder">%s</div>',getStatusClass($order->status), $order->status ? $order->status : '');
        })
        ->editColumn('created_at', function (Order $order) {
            return $order->created_at->format('d M Y, h:i a');
        })
        ->editColumn('action', function (Order $order) {
            return view('admin.pages.customer-management.orders.columns._actions', compact('order'));
        })

        ->setRowId('id')
        ->make(true);
    }

    public static function getAll($customerId = ''){
        if($customerId){
            return Order::where('customer_id',$customerId)->with(['user']);
        }
        return Order::with(['user']);
    }
}
