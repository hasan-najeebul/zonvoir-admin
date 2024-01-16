<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoriesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

        return (new EloquentDataTable($query))
        ->rawColumns(['name','created_by','action'])
        ->editColumn('name', function (Category $category) {
            return view('admin.pages.product-management.categories.columns._category', compact('category'));
        })
        ->editColumn('created_at', function (Category $category) {
            return $category->created_at->format('d M Y, h:i a');
        })
        ->addColumn('created_by', function (Category $category) {
            return '<a href="'.route('user-management.users.show',$category->project_manager_id).'">'.$category->user->name.'</a>';
        })
        // ->editColumn('status', function (Category $category) {
        //     return view('admin.pages.product-management.categories.columns._status', compact('category'));
        // })
        ->addColumn('action', function (Category $category) {
            return view('admin.pages.product-management.categories.columns._actions', compact('category'));
        })
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('categories-table')
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
            Column::make('id'),
            Column::make('add your columns'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
				->addClass('text-end text-nowrap')
				->exportable(false)
				->printable(false)
				->width(60)
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Categories_' . date('YmdHis');
    }
}
