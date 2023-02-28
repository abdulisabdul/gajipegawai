<?php

namespace App\DataTables;

use App\Models\MasterPegawai;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MasterPegawaiDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query->with('jabatan','divisi','kantor')))
            ->addColumn('action', 'masterpegawai.action')
            ->editColumn('nama_jabatan', function($row){
                return $row->jabatan->nama_jabatan;
            })
            ->editColumn('nama_divisi', function($row){
                return $row->divisi->nama_divisi;
            })
            ->editColumn('nama_kantor', function($row){
                return $row->kantor->nama_kantor;
            })
            ->editColumn('created_at', function($row){
                return $row->created_at->format('d-m-Y H:i:s');
            })
            ->editColumn('updated_at', function($row){
                return $row->created_at->format('d-m-Y H:i:s');
            })
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(MasterPegawai $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('masterpegawai-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->searchable(false)->orderable(false),
            Column::make('nama_pegawai'),
            Column::make('nama_jabatan')->name('jabatan.nama_jabatan'),
            Column::make('nama_divisi')->name('divisi.nama_divisi'),
            Column::make('nama_kantor')->name('kantor.nama_kantor'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'MasterPegawai_' . date('YmdHis');
    }
}
