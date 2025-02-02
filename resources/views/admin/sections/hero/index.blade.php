@extends('admin.layouts.layout')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Editar Seção Principal</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Editar Seção Principal</h2>
            <p class="section-lead">
                Nesta página você pode editar o conteúdo da seção principal do site.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Editar Conteúdo da Seção Principal</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.hero.update', 1) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Desativar
                                        Seção</label>
                                    <div class="col-sm-12 col-md-7">
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="is_disabled" class="custom-switch-input"
                                                {{ old('is_disabled', $hero->is_disabled ?? false) ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Marque para desativar a exibição desta
                                                seção no frontend</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Imagem de
                                        Fundo</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Escolher Arquivo</label>
                                            <input type="file" name="background_image" id="image-upload" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Título</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title', $hero->title ?? '') }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Descrição</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea style="height: 100px" class="form-control" name="description">{{ old('description', $hero->description ?? '') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Botão
                                        Principal</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="button_text"
                                                placeholder="Texto do botão"
                                                value="{{ old('button_text', $hero->button_text ?? '') }}">
                                        </div>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="button_url"
                                                placeholder="URL do botão"
                                                value="{{ old('button_url', $hero->button_url ?? '') }}">
                                        </div>
                                        <small class="form-text text-muted">Insira o texto e a URL para o botão
                                            principal.</small>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link do
                                        Vídeo</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="video_url"
                                            value="{{ old('video_url', $hero->video_url ?? '') }}">
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#image-preview').css({
                'background-image': 'url("{{ optional($hero)->background_image ? asset($hero->background_image) : '' }}")',
                'background-size': 'cover',
                'background-position': 'center center'
            });
        });
    </script>
@endpush
