<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\RedeemedRewardRepository;
use App\Repositories\RewardRepository;
use Illuminate\Http\Request;

class RewardManagementeController extends Controller
{
    private RewardRepository $rewardRepository;
    private RedeemedRewardRepository $redeemRdRepository;

    public function __construct(RewardRepository $rewardRepository, RedeemedRewardRepository $redeemRdRepository)
    {
        $this->rewardRepository = $rewardRepository;
        $this->redeemRdRepository = $redeemRdRepository;
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

    public function getRewardPointHistory(Request $request, $customerId){
        if($request->ajax()){
            return $this->rewardRepository->list($customerId);
        }
    }
    public function getRedeemedRewardHistory(Request $request, $customerId){
        if($request->ajax()){
            return $this->redeemRdRepository->list($customerId);
        }
    }
}
