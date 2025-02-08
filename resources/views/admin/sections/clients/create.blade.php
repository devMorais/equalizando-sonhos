@extends('admin.layouts.layout')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.client.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Cadastrar Cliente Parceiro</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Cadastrar Cliente Parceiro</h2>
            <p class="section-lead">
                Nesta página você pode cadastrar as informações dos clientes parceiros.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Cadastrar Informações do Cliente Parceiro</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.client.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Desativar
                                        Cliente</label>
                                    <div class="col-sm-12 col-md-7">
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="is_disabled" class="custom-switch-input">
                                            {{ old('is_disabled', $client->is_disabled ?? false) ? 'checked' : '' }}
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Marque para desativar a exibição deste
                                                cliente parceiro no frontend</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Logo do
                                        Cliente</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Escolher Arquivo</label>
                                            <input type="file" name="logo" id="image-upload" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nome do
                                        Cliente</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name', $client->name ?? '') }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">URL do
                                        Website</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="website_url"
                                            value="{{ old('website_url', $client->website_url ?? '') }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Cadastrar</button>
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
