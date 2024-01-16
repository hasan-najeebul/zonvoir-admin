<?php
namespace App\Repositories;

use App\Models\CustomerPoint;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function list(){
        $user = self::getAll();

        return (DataTables::eloquent($user))->filter( function($query){
            if(request()->get('search')){
                $searchKeyword =  strtolower(request()->get('search'));
                $query->where(function($q) use ($searchKeyword) {
                    $q->where('name', 'LIKE', '%'.$searchKeyword.'%')
                    ->orWhere('email', 'LIKE', '%'.$searchKeyword.'%')
                    ->orWhere('status', 'LIKE', '%'.$searchKeyword.'%');
                 });
            }
            if(request()->get('user_status') && request()->get('user_status') != 'all'){
                $user_status = request()->get('user_status');
                $query->where('status', $user_status);
            }
        })
        ->rawColumns(['name','email', 'status'])
        ->editColumn('name', function (User $user) {
            return '<a href="'.route('user-management.customer.show',$user->id).'" class="text-gray-800 text-hover-primary mb-1">'.$user->name.'</a>';
        })
        ->editColumn('email', function (User $user) {
            return '<a href="javascript:void(0)" class="text-gray-600 text-hover-primary mb-1">'.$user->email.'</a>';
        })
        ->editColumn('orders', function (User $user) {
            return count($user->orders);
        })
        ->editColumn('status', function (User $user) {
            return sprintf('<div class="badge badge-light-%s fw-bolder">%s</div>',getStatusClass($user->status), $user->status ? $user->status : '');
        })
        ->editColumn('created_at', function (User $user) {
            return $user->created_at->format('d M Y, h:i a');
        })
        ->setRowId('id')
        ->make(true);
    }

    public static function getAll(){
        return User::with(['orders','loyaltyCard','CustomerPoint'])->whereHas("roles", function($q){ $q->where("name", "Customer"); });
    }
}
