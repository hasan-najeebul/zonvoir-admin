<?php

namespace App\DataTables;

use App\Models\AffiliateUser;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AffiliateUserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))->filter( function($query){
            if(request()->get('search')){
                $searchKeyword =  strtolower(request()->get('search'));

                $query->whereHas('user', function($q) use ($searchKeyword) {
                    $q->where('name', 'LIKE', '%'.$searchKeyword.'%')
                    ->orWhere('email', 'LIKE', '%'.$searchKeyword.'%')
                    ->orWhere('status', 'LIKE', '%'.$searchKeyword.'%');
                 });
            }

        })

        ->rawColumns(['name', 'action'])
        ->addColumn('name', function (AffiliateUser $affiliateUser) {
            return '<a href="'.route('user-management.affiliate.show',$affiliateUser->user_id).'" class="text-gray-800 text-hover-primary mb-1">'.$affiliateUser->user->name.'</a>';
        })

        ->editColumn('created_at', function (AffiliateUser $affiliateUser) {
            return $affiliateUser->created_at->format('d M Y, h:i a');
        })
        ->addColumn('action', function (AffiliateUser $affiliateUser) {
            return view('admin.pages.user-management.affiliate-users.columns._actions', compact('affiliateUser'));
        })
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(AffiliateUser $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('affiliateuser-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('add your columns'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'AffiliateUser_' . date('YmdHis');
    }
}
