<?php

namespace App\DataTables;

use App\Models\Penjualan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Models\PenjualanModel;

class PenjualanDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
            return '
            <div class="d-flex">
                <a href="' . route('penjualan.edit', $row->penjualan_id) . '" class="btn btn-sm btn-primary d-flex align-items-center" style="margin-right: 5px; height: 100%;">
                <i class="fas fa-edit"></i> Edit
                </a>
                <form action="' . route('penjualan.destroy', $row->penjualan_id) . '" method="POST">
                ' . csrf_field() . '
                ' . method_field('DELETE') . '
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah anda yakin akan mengahus item ini?\')">
                    <i class="fas fa-trash"></i> Delete
                </button>
                </form>
            </div>';
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PenjualanModel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('penjualan-table')
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
            Column::make('penjualan_id'),
            Column::make('user_id'),
            Column::make('pembeli'),
            Column::make('penjualan_kode'),
            Column::make('tanggal_penjualan'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(100)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Penjualan_' . date('YmdHis');
    }
}
