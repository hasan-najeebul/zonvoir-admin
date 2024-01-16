<?php

namespace App\Http\Controllers\admin;

use App\DataTables\AffiliateUserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddAffiliateUserRequest;
use App\Models\AffiliateUser;
use App\Models\User;
use App\Services\AddressService;
use App\Services\AffiliateCommissionService as CommService;
use Illuminate\Http\Request;
use App\Services\AffiliateUserService;
use App\Services\BankDetailService;
use App\Services\UserService;
use Spatie\Permission\Models\Role;

class AffiliateUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AffiliateUserDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.user-management.affiliate-users.list');
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
    public function store(AddAffiliateUserRequest $request)
    {
        try {
            $data = $request->all();
            $user = UserService::store($data);
            if (!$user) {
                return response()->json(['status'=>'failed','message' => 'User not created'], 404);
            }
            AddressService::userAddress($user);
            BankDetailService::setBankDetails($user);
            CommService::setCommission($user);


        } catch (\Throwable $th) {
            return response()->json(['status'=>'failed','message'=>$th->getMessage()]);
        }
        return response()->json(['status'=>'success','message'=>'Successfully Created']);
    }

    /**
     * Display the specified resource.
     * user id as parameter
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();
        return view('admin.pages.user-management.affiliate-users.show', compact('user','roles'));
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
    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $user = User::find($id);
            if (!$user) {
                return response()->json(['status'=>'failed','message' => 'User not found'], 404);
            }
            AffiliateUserService::update($data,$user);
            AddressService::userAddress($user);
            BankDetailService::setBankDetails($user);
            CommService::setCommission($user);
        } catch (\Throwable $th) {
            return response()->json(['status'=>'failed','message'=>$th->getMessage()]);
        }
        return response()->json(['status'=>'success','message'=>'Successfully updated']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $affiliateUser = AffiliateUser::findOrFail($id);
            UserService::delete($affiliateUser);
        } catch (\Throwable $th) {
            return response()->json(['status'=>'failed','message'=>$th->getMessage()]);
        }
        return response()->json(['status'=>'success','Deleted Successfuly']);
    }
}
