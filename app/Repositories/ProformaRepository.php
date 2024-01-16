<?php
namespace App\Repositories;

use App\Models\Proforma;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProformaRepository
{
    protected $model;

    public function __construct(Proforma $model)
    {
        $this->model = $model;
    }
    public function list($id){
        $user = self::getAll($id);

        return (DataTables::eloquent($user))->filter( function($query){

        })
        ->rawColumns(['name','status'])
        ->editColumn('name', function (Proforma $proforma) {
            return '<a href="javascript:void(0)" class="text-gray-600 text-hover-primary mb-1">'.$proforma->user->name.'</a>';
        })
        ->editColumn('number', function (Proforma $proforma) {
            return $proforma->id;
        })
        ->editColumn('amount', function (Proforma $proforma) {
            return $proforma->total;
        })
        ->editColumn('status', function (Proforma $proforma) {
            return sprintf('<div class="badge badge-light-%s fw-bolder">%s</div>',getStatusClass($proforma->status), $proforma->status ? $proforma->status : '');
        })
        ->editColumn('expirydate', function (Proforma $proforma) {
            return $proforma->expirydate->format('d M Y');
        })

        ->editColumn('created_at', function (Proforma $proforma) {
            return $proforma->created_at->format('d M Y, h:i a');
        })
        ->setRowId('id')
        ->make(true);
    }


    public static function getAll($id){
        return Proforma::with(['user'])->where('partner_id', $id);
    }
}
