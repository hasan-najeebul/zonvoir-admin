<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use App\Repositories\PartnerRepository;
use App\Repositories\ProjectManagerRepository;
use App\Services\PartnerService;
use App\Services\StoresService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ProjectManagerController extends Controller
{
    private ProjectManagerRepository $projectManagerRepository;
    private PartnerRepository $partnerRepository;

    public function __construct(ProjectManagerRepository $projectManagerRepository,PartnerRepository $partnerRepository)
    {
        $this->projectManagerRepository = $projectManagerRepository;
        $this->partnerRepository        = $partnerRepository;
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

    public function getProjectManager(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if(!$user){
            abort(403);
        }
        if($request->ajax()){
            return $this->projectManagerRepository->list($id);
        }
        $data = PartnerService::getAll($user);
        return view('admin.pages.user-management.partner-users.show', $data);
    }

    public function getStoreProjectManager(Request $request, $storeId)
    {
        $store = Store::findOrFail($storeId);
        if(!$store){
            abort(403);
        }
        if($request->ajax()){
            return $this->projectManagerRepository->list($storeId,'store');
        }
        $data = StoresService::getAll($store);
        return view('admin.pages.store-management.sections.project-manager-list', $data);
    }
}
