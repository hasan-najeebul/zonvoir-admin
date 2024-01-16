<?php
namespace App\Repositories;

use App\Models\Invoice;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InvoiceRepository
{
    protected $model;

    public function __construct(Store $model)
    {
        $this->model = $model;
    }
    public function list($partnerId){
        $invoices = self::getAll($partnerId);
        // dd($invoices->get());
        return (DataTables::eloquent($invoices))->filter( function($query){

        })
        ->rawColumns(['name','id','status'])
        ->editColumn('name', function (Invoice $invoice) {
            return '<a href="'.route('user-management.partner.show',$invoice->partner_id).'" class="text-gray-600 text-hover-primary mb-1">'.$invoice->user->name.'</a>';
        })
        ->editColumn('id', function (Invoice $invoice) {
            return '<span class="text-gray-600 text-hover-primary">'.$invoice->id.'</span>';
        })
        ->editColumn('amount', function (Invoice $invoice) {
            return $invoice->total;
        })
        ->editColumn('status', function (Invoice $invoice) {
            return sprintf('<div class="badge badge-light-%s fw-bolder">%s</div>',getStatusClass($invoice->status), $invoice->status ? $invoice->status : '');
        })
        ->editColumn('duedate', function (Invoice $invoice) {
            // dd($invoice);
            return $invoice->duedate->format('d M Y');
        })

        ->editColumn('created_at', function (Invoice $invoice) {
            return $invoice->created_at->format('d M Y, h:i a');
        })
        ->setRowId('id')
        ->make(true);
    }


    public static function getAll($partnerId){
        return Invoice::where('partner_id', $partnerId);
    }
}
