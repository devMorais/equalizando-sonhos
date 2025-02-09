<?php

namespace App\DataTables;

use App\Models\AboutItens;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AboutItensDataTable extends DataTable
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
                    <a href="' . route('admin.about-itens.edit', $query->id) . '" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    <a href="' . route('admin.about-itens.destroy', $query->id) . '" class="delete-item btn btn-sm btn-danger "><i class="fas fa-trash"></i></a>
                </div>';
            })
            ->addColumn('icon', function ($query) {
                return '<i class="fas ' . $query->icon . '" style: widht:150px></i>';
            })
            ->addColumn('is_disabled', function ($query) {
                return $query->is_disabled ? '<span class="badge badge-danger">Sim</span>' : '<span class="badge badge-success">Não</span>';
            })
            ->rawColumns(['action', 'icon', 'is_disabled'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(AboutItens $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('about_itens-table')
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
            Column::make('title')->width(200)->addClass('text-center')->title('Título'),
            Column::make('icon')->width(40)->addClass('text-center')->title('Ícone'),
            Column::make('url')->width(80)->addClass('text-center')->title('URL'),
            Column::make('is_disabled')->width(50)->addClass('text-center')->title('Inativo'),
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
        return 'AboutItens_' . date('YmdHis');
    }
}
