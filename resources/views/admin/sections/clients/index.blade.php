@extends('admin.layouts.layout')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Gerenciar Parceiros Clientes</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Lista de Parceiros Clientes</h2>
            <p class="section-lead">
                Nesta página você pode visualizar e gerenciar todos os parceiros clientes cadastrados.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="container">
                            <div class="card">
                                <div class="card-header">Parceiros Clientes Cadastrados</div>
                                <div class="card-body">
                                    {{ $dataTable->table() }}
                                </div>
                            </div>
                            {{-- <div class="card-header-action">
                                <a href="{{ route('admin.client.create') }}" class="btn btn-primary"> Cadastrar <i
                                        class="fas fa-plus"></i></a>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
