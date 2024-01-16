<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\User;
use App\Repositories\PartnerRepository;
use App\Services\AddressService;
use App\Services\BusinessService;
use App\Services\PartnerService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PartnerController extends Controller
{
    private PartnerRepository $partnerRepository;
    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->partnerRepository->list();
        }

        return view('admin.pages.user-management.partner-users.list');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if(!$user){
            abort(403);
        }
        $data = PartnerService::getAll($user);
        return view('admin.pages.user-management.partner-users.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnerRequest $request, string $id)
    {
        try {
            $data = $request->all();
            $user = User::find($id);
            if (!$user) {
                return response()->json(['status'=>'failed','message' => 'User not found'], 404);
            }
                PartnerService::update($data,$user);
                AddressService::userAddress($user);
                BusinessService::userBusiness($user);
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
        //
    }
}
