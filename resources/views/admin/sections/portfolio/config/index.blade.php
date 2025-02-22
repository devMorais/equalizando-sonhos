@extends('admin.layouts.layout')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('dashboard') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Editar Configuração da Seção Portfolio</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Editar Configuração da Seção Portfolio</h2>
            <p class="section-lead">
                Nesta página você pode Editar Configuração da Seção Portfolio.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Editar Configuração da Seção Portfolio</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.portfolio-config.update', 1) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Desativar
                                        Seção</label>
                                    <div class="col-sm-12 col-md-7">
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="is_disabled" class="custom-switch-input"
                                                {{ old('is_disabled', $portfolioConfig->is_disabled ?? false) ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Marque para desativar a exibição desta
                                                seção no frontend</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Título</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title', $portfolioConfig->title ?? '') }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Descrição</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea style="height: 100px" class="form-control" name="description">{{ old('description', $portfolioConfig->description ?? '') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Salvar Alterações</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
