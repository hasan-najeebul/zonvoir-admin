<?php
namespace App\Repositories;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermissionRepository
{
    protected $model;

    public function __construct(Permission $model)
    {
        $this->model = $model;
    }
    public function list(){
        $permission = self::getAll();

        return (DataTables::eloquent($permission))->filter( function($query){
            // if(request()->get('user_role') !='All'){
            //     $query->whereHas('roles', fn($q) => $q->where('name', request()->get('user_role')));
            // }
            // if(request()->get('user_status') && request()->get('user_status') != 'all'){
            //         $user_status = request()->get('user_status');
            //         $query->where('status', $user_status);
            // }

            if(request()->get('search')){
                $searchKeyword =  strtolower(request()->get('search'));
                $query->where(function($q) use ($searchKeyword) {
                    $q->where('name', 'LIKE', '%'.$searchKeyword)
                    ->orWhere('name', 'LIKE',   $searchKeyword.'%')
                    ->orWhere('name', 'LIKE', '%'.$searchKeyword.'%');
                 });
            }
        })
        ->rawColumns(['name', 'action'])
        ->editColumn('name', function (Permission $permission) {
            return $permission->name;
        })

        ->editColumn('created_at', function (Permission $permission) {
            return $permission->created_at->format('d M Y, h:i a');
        })
        ->addColumn('action', function (Permission $permission) {
            return view('admin.pages.user-management.permissions.columns._actions', compact('permission'));
        })
        ->setRowId('id')
        ->make(true);
    }

    public function getAll(){
        return Permission::query();
    }
}
