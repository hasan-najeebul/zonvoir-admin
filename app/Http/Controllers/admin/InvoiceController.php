<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\User;
use App\Repositories\InvoiceRepository;
use App\Repositories\PartnerRepository;
use App\Services\PartnerService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class InvoiceController extends Controller
{
    private InvoiceRepository $invoiceRepository;
    private PartnerRepository $partnerRepository;
    public function __construct(InvoiceRepository $invoiceRepository, PartnerRepository $partnerRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
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
    /**
     * @param $partnerId
     * get invoice by partner id
     * @return datatable
     */
    public function getInvoices(Request $request, $partnerId)
    {

        $user = User::findOrFail($partnerId);
        if (!$user) {
            abort(403);
        }

        if ($request->ajax()) {
            return $this->invoiceRepository->list($partnerId);
        }
        $data = PartnerService::getAll($user);
        return view('admin.pages.user-management.partner-users.sections.invoice-list', $data);
    }
}
