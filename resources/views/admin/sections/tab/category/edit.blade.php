@extends('admin.layouts.layout')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.tab-category.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Editar Guia</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Editar Guia</h2>
            <p class="section-lead">
                Nesta página você pode editar a informação da guia.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Editar Informações da Guia</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.tab-category.update', $tabCategory->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Desativar
                                        Item</label>
                                    <div class="col-sm-12 col-md-7">
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="is_disabled" class="custom-switch-input"
                                                {{ old('is_disabled') ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Marque para desativar a exibição deste
                                                item no frontend</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Título</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" value="{{ old('title', $tabCategory->title ?? '') }}"
                                            class="form-control" name="title">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ícone</label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-info" data-unselected-class="btn-primary"
                                            data-arrow-prev-icon-class="bi bi-chevron-left" data-arrow-class="btn-primary"
                                            data-placement="bottom" data-align="center" name="icon"
                                            data-iconset="bootstrapicons"
                                            data-icon="{{ old('icon', $tabCategory->icon ?? '') }}" role="iconpicker">
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Atualizar</button>
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
