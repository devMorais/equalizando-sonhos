<?php

namespace App\DataTables;

use App\Models\TabItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TabItemDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                return '<div class="btn-group" role="group" aria-label="Ações">
            <a href="' . route('admin.tab-item.edit', $query->id) . '" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
            <a href="' . route('admin.tab-item.destroy', $query->id) . '" class="delete-item btn btn-sm btn-danger "><i class="fas fa-trash"></i></a>
        </div>';
            })
            ->addColumn('image', function ($query) {
                return '<img src="' . asset($query->image) . '" alt="' . $query->title . '" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover;">';
            })
            ->addColumn('is_disabled', function ($query) {
                return $query->is_disabled ? '<span class="badge badge-danger">Sim</span>' : '<span class="badge badge-success">Não</span>';
            })
            ->addColumn('category', function ($query) {
                return $query->getCategory ? $query->getCategory->title : 'N/A';
            })
            ->editColumn('description', function ($query) {
                return strip_tags($query->description);
            })
            ->rawColumns(['action', 'image', 'is_disabled'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(TabItem $model): QueryBuilder
    {
        return $model->newQuery()->with('getCategory');
    }
    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('tabitem-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->pageLength(20)
            ->lengthChange(false)
            ->buttons([
                'reload' => [
                    'extend' => 'reload',
                    'text' => '<i class="fas fa-sync-alt"></i> Recarregar',
                    'className' => 'btn btn-secondary',
                ],
            ])
            ->language([
                'sProcessing' => 'Processando...',
                'sZeroRecords' => 'Nenhum registro encontrado',
                'sInfo' => 'Mostrando de _START_ até _END_ de _TOTAL_ entradas',
                'sInfoEmpty' => 'Mostrando 0 até 0 de 0 entradas',
                'sInfoFiltered' => '(filtrado de _MAX_ entradas totais)',
                'sSearch' => 'Pesquisar:',
                'sEmptyTable' => 'Nenhum dado disponível na tabela',
                'sLoadingRecords' => 'Carregando...',
                'sFirst' => 'Primeiro',
                'sLast' => 'Último',
                'sNext' => 'Próximo',
                'sPrevious' => 'Anterior',
                'oPaginate' => [
                    'sFirst' => 'Primeiro',
                    'sLast' => 'Último',
                    'sNext' => 'Próximo',
                    'sPrevious' => 'Anterior',
                ],
                'oAria' => [
                    'sSortAscending' => ': Ative para ordenar a coluna de forma ascendente',
                    'sSortDescending' => ': Ative para ordenar a coluna de forma descendente',
                ],
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->width(40)->title('ID'),
            Column::make('image')->width(250)->addClass('text-center'),
            Column::make('title')->width(100)->addClass('text-center'),
            Column::make('description')->width(250)->addClass('text-center')->title('Descrição'),
            Column::make('category')->width(100)->addClass('text-center')->title('Categoria'),
            Column::make('is_disabled')->width(100)->addClass('text-center')->title('Inativo'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center')->title('Ações'),
        ];
    }
    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'TabItem_' . date('YmdHis');
    }
}
