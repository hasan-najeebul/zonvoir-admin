<?php

namespace App\Http\Controllers\admin;

// use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UpdateUserEmailRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\UserAddress;
use App\Repositories\UserRepository;
use App\Services\AddressService;
use App\Services\AffiliateUserService;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Facades\DataTables;

class UserManagementController extends Controller
{
    private UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware(['permission:user-view|user-create|user-edit|user-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:user-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:user-edit'], ['only' => ['edit', 'update', 'updateEmail', 'updatePassword', 'updateUserRole', 'updateStatus']]);
        $this->middleware(['permission:user-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->userRepository->list();
        }
        $roles = Role::get();
        return view('admin.pages.user-management.users.list', compact('roles'));
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
    public function store(CreateUserRequest $request)
    {
        try {
            $user = UserService::store($request->all(), $request->user_role);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed', 'message' => $th->getMessage()]);
        }
        return response()->json(['status' => 'success', 'message' => 'Successfully Created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $roles = Role::get();
        return view('admin.pages.user-management.users.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $user = UserService::update($request->all(), $user);
            // if($user){
            //     AddressService::userAddress($user);
            // }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed', 'message' => $th->getMessage()]);
        }
        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            UserService::delete($user);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed']);
        }
        return response()->json(['status' => 'success']);
    }

    /**
     * Update the specified user's email in storage.
     *
     * @param  \App\Http\Requests\UpdateUserEmailRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateEmail(UpdateUserEmailRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            UserService::update([
                'email' => $request->input('email'),
            ], $user);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed']);
        }
        return response()->json(['status' => 'success']);
    }


    /**
     * Update the user's password.
     *
     * @param  \App\Http\Requests\UpdateUserPasswordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(UpdateUserPasswordRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            UserService::update($user, [
                'password' => $request->input('password'),
            ], $user);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed']);
        }
        return response()->json(['status' => 'success']);
    }

    public function updateUserRole(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->syncRoles([$request->input('user_role')]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed']);
        }
        return response()->json(['status' => 'success', 'message' => 'User role updated successfully']);
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            UserService::updateStatus($user);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'failed']);
        }
        return response()->json(['status' => 'success']);
    }
}
