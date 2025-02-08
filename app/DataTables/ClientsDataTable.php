<?php

namespace App\DataTables;

use App\Models\Client;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ClientsDataTable extends DataTable
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
                    <a href="' . route('admin.client.edit', $query->id) . '" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    <a href="' . route('admin.client.destroy', $query->id) . '" class="delete-item btn btn-sm btn-danger "><i class="fas fa-trash"></i></a>
                </div>';
            })
            ->addColumn('logo', function ($query) {
                return '<img src="' . asset($query->logo) . '" alt="' . $query->name . '" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover;">';
            })
            ->addColumn('is_disabled', function ($query) {
                return $query->is_disabled ? '<span class="badge badge-danger">Sim</span>' : '<span class="badge badge-success">Não</span>';
            })
            ->rawColumns(['action', 'logo', 'is_disabled'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Client $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('clients-table')
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
            Column::make('logo')->width(100)->addClass('text-center'),
            Column::make('name')->width(100)->addClass('text-center'),
            Column::make('website_url')->width(100)->addClass('text-center'),
            Column::make('is_disabled')->width(250)->addClass('text-center')->title('Inativo'),
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
        return 'Clients_' . date('YmdHis');
    }
}
