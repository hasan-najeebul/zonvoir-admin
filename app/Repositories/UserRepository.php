<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function list(){
        $user = self::getAll();

        return (DataTables::eloquent($user))->filter( function($query){
            if(request()->get('user_role') !='All'){
                $query->whereHas('roles', fn($q) => $q->where('name', request()->get('user_role')));
            }
            if(request()->get('user_status') && request()->get('user_status') != 'all'){
                    $user_status = request()->get('user_status');
                    $query->where('status', $user_status);
            }

            if(request()->get('search')){
                $searchKeyword =  strtolower(request()->get('search'));
                $query->where(function($q) use ($searchKeyword) {
                    $q->where('name', 'LIKE', '%'.$searchKeyword.'%')
                    ->orWhere('email', 'LIKE', '%'.$searchKeyword.'%')
                    ->orWhere('status', 'LIKE', '%'.$searchKeyword.'%');
                 });
            }
        })
        ->rawColumns(['name', 'status'])
        ->editColumn('name', function (User $user) {
            return view('admin.pages.user-management.users.columns._user', compact('user'));
        })
        ->editColumn('role_name', function (User $user) {
            return ucwords($user->roles->first()?->name);
        })
        ->editColumn('status', function (User $user) {
            return sprintf('<div class="badge badge-light-%s fw-bolder">%s</div>',getStatusClass($user->status), $user->status ? $user->status : '');
        })
        ->editColumn('created_at', function (User $user) {
            return $user->created_at->format('d M Y, h:i a');
        })
        ->addColumn('action', function (User $user) {
            return view('admin.pages.user-management.users.columns._actions', compact('user'));
        })
        ->setRowId('id')
        ->make(true);
    }
    public static function getAll(){
        return User::whereDoesntHave('roles', function ($query){
            $query->where('role_id', 1);
        });

    }

    /**
     * Role user list
     * Assigned user to a selected role
     */
    public function roleUserList($role){
        $user = $this->getRoleUserQuery($role->id);
        return (DataTables::eloquent($user))->filter( function($query){

        })
        ->rawColumns(['name', 'status'])
        ->editColumn('name', function (User $user) {
            return view('admin.pages.user-management.users.columns._user', compact('user'));
        })
        ->editColumn('status', function (User $user) {
            return sprintf('<div class="badge badge-light-%s fw-bolder">%s</div>',getStatusClass($user->status), $user->status ? $user->status : '');
        })
        ->editColumn('created_at', function (User $user) {
            return $user->created_at->format('d M Y, h:i a');
        })
        ->addColumn('action', function (User $user) {
            return view('admin.pages.user-management.users.columns._actions', compact('user'));
        })
        ->setRowId('id')
        ->make(true);
    }

    public function getRoleUserQuery($role_id){
        return User::whereHas('roles', function ($query) use ($role_id){
            $query->where('role_id',$role_id);
        });
    }
}
