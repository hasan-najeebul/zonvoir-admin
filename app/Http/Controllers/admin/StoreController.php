<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\Store;
use App\Models\User;
use App\Repositories\StoreRepository;
use App\Services\PartnerService;
use App\Services\StoresService;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    private StoreRepository $storeRepository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->storeRepository->list($id = 0);
        }
        return view('admin.pages.store-management.list');
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
    public function show(string $id)
    {
        $store = Store::findOrFail($id);
        if(!$store){
            abort(403);
        }
        $data = StoresService::getAll($store);

        return view('admin.pages.store-management.show',$data);
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
    public function update(UpdateStoreRequest $request, string $id)
    {
        $store = Store::find($id);
        if($store){
            StoresService::update($request->all(),$store);
            return response()->json(['status'=>'success']);
        }
        return response()->json(['status'=>'failed']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getStores(Request $request, $partnerId)
    {
        $user = User::findOrFail($partnerId);
        if (!$user) {
            abort(403);
        }
        if ($request->ajax()) {
            return $this->storeRepository->list($partnerId);
        }
        if ($user) {
            $data = PartnerService::getAll($user);
            return view('admin.pages.user-management.partner-users.sections.store-list', $data);
        }
    }


}
