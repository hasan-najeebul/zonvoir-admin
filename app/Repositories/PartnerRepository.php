<?php
namespace App\Repositories;

use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PartnerRepository
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
        ->rawColumns(['name','email', 'status','stores','project_manager','seller'])
        ->editColumn('name', function (User $user) {
            return '<a href="'.route('user-management.partner.show',$user->id).'" class="text-gray-800 text-hover-primary mb-1">'.$user->name.'</a>';
        })
        ->editColumn('email', function (User $user) {
            return '<a href="javascript:void(0)" class="text-gray-600 text-hover-primary mb-1">'.$user->email.'</a>';
        })
        ->editColumn('stores', function (User $user) {
            return '<a href="'.route('user-management.store-list',$user->id).'" class="text-gray-800 text-hover-primary mb-1" title="'.__('messages.click_here').'">'.count($user->stores).'</a>';
        })
        ->editColumn('project_manager', function (User $user) {
            return '<a href="'.route('user-management.project-manager',$user->id).'" class="text-gray-800 text-hover-primary mb-1" title="'.__('messages.click_here').'">'.count(self::getAllProjectManager($user->id)).'</a>';
        })
        ->editColumn('seller', function (User $user) {
            return '<a href="'.route('user-management.seller-list',$user->id).'" class="text-gray-800 text-hover-primary mb-1" title="'.__('messages.click_here').'">'.count(self::getAllSeller($user->id)).'</a>';
        })
        ->editColumn('status', function (User $user) {
            return sprintf('<div class="badge badge-light-%s fw-bolder">%s</div>',getStatusClass($user->status), $user->status ? $user->status : '');
        })
        ->editColumn('created_at', function (User $user) {
            return $user->created_at->format('d M Y, h:i a');
        })
        // ->addColumn('action', function (User $user) {
        //     return view('admin.pages.user-management.partner-users.columns._actions', compact('user'));
        // })
        ->setRowId('id')
        ->make(true);
    }

    public static function getAll(){
        return User::with(['stores'])->whereHas("roles", function($q){ $q->where("name", "Partner"); });
    }

    public static function getAllProjectManager($partnerId){
        return User::where('partner_id',$partnerId)->whereHas("roles", function($q){ $q->where("name", "Project Manager"); })->get();
    }

    public static function getAllSeller($partnerId){
        return User::where('partner_id',$partnerId)->whereHas("roles", function($q){ $q->where("name", "Seller"); })->get();
    }

    public static function getAllStore($partnerId){
        return Store::where('partner_id',$partnerId)->get();
    }

}
