<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use App\Repositories\SellerRepository;
use App\Services\PartnerService;
use App\Services\StoresService;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    private SellerRepository $sellerRepository;

    public function __construct(SellerRepository $sellerRepository)
    {
        $this->sellerRepository = $sellerRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getSellers(Request $request, $partnerId){
        $user = User::findOrFail($partnerId);
        if(!$user){
            abort(403);
        }
        if($request->ajax()){
            return $this->sellerRepository->list($partnerId);
        }
        $data = PartnerService::getAll($user);
        return view('admin.pages.user-management.partner-users.sections.seller-list',$data);
    }

    public function getStoreSellers(Request $request, $storeId){
        $store = Store::findOrFail($storeId);

        if(!$store){
            abort(403);
        }
        if($request->ajax()){
            return $this->sellerRepository->list($storeId,'store');
        }
        $data = StoresService::getAll($store);
        return view('admin.pages.store-management.sections.sellers-list',$data);
    }
}
