<?php

namespace App\Http\Controllers\admin;
use App\DataTables\PermissionsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddPermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Repositories\PermissionRepository;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private PermissionRepository $permissionRepository;
    public function __construct(PermissionRepository $permissionRepository, PermissionService $permissionsService)
    {
        $this->permissionRepository = $permissionRepository;
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->permissionRepository->list();
        }
        return view('admin.pages.user-management.permissions.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddPermissionRequest $request)
    {
        if(PermissionService::store($request->all())){
            return response()->json(['status' => 'success', 'message' => 'Successfully Created']);
        }
        return response()->json(['status' => 'failed', 'message' => 'Not Created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        if(PermissionService::update($request->all(),$permission)){
            return response()->json(['status' => 'success', 'message' => 'Successfully Updated']);
        }
        return response()->json(['status' => 'failed', 'message' => 'Not Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        if(PermissionService::delete($permission)){
            return response()->json(['status' => 'success', 'message' => 'Deleted']);
        }
        return response()->json(['status' => 'failed', 'message' => 'Not deleted']);
    }
}
