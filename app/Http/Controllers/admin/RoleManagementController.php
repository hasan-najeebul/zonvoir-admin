<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Repositories\RolesRepository;
use App\Repositories\UserRepository;
use App\Services\PermissionService;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class RoleManagementController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::where('name', '!=', 'Admin')->with('permissions')->get();
        $permissions_by_group = PermissionService::getPermissionByGroup();
        return view('admin.pages.user-management.roles.list', compact('roles', 'permissions_by_group'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddRoleRequest $request)
    {
        $role = RoleService::store($request->except('permission'));
        if(!$role){
            return response()->json(['status'=>'failed','message'=>'Role not added']);
        }
        $role->syncPermissions($request->input('permission'));
        return response()->json(['status'=>'success','message'=>'Successfully Created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $permissions_by_group = PermissionService::getPermissionByGroup();
        return view('admin.pages.user-management.roles.show',compact('role', 'permissions_by_group'));
        // return $dataTable->with('role', $role)
            // ->render('admin.pages.user-management.roles.show', compact('role', 'permissions_by_group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Role $role)
    {
        $permissions_by_group = PermissionService::getPermissionByGroup();

        $html = view('admin.pages.user-management.roles.modals.ajax_modal_view', compact('permissions_by_group','role'))->render();
        return response()->json(['html'=>$html]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        if($role->syncPermissions($request->input('permission'))){
            return response()->json(['status'=>'success','message'=>'Successfully Updated']);
        }
        return response()->json(['status'=>'failed','message'=>'Not Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if(RoleService::delete($role)){
            return response()->json(['status'=>'success','message'=>'Successfully Deleted']);
        }
        return response()->json(['status'=>'failed','message'=>'Not Deleted']);
    }

    public function getRoleUsers(Request $request, Role $role){
        if ($request->ajax()) {
            return $this->userRepository->roleUserList($role);
        }
    }
}
