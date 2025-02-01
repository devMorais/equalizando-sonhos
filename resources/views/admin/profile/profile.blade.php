@extends('admin.layouts.layout')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Perfil</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Perfil</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Olá, {{ $user->name }}!</h2>
            <p class="section-lead">
                Altere suas informações pessoais nesta página.
            </p>
            <div class="row mt-sm-4">
                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="post" action="{{ route('profile.update') }}" class="needs-validation" novalidate="">
                            @csrf
                            @method('patch')
                            <div class="card-header">
                                <h4>Informações do perfil</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="name">Nome</label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            value="{{ old('name', $user->name) }}" required="">
                                    </div>
                                    @if ($errors->has('name'))
                                        <code>{{ $errors->first('name') }}</code>
                                    @endif
                                    <div class="form-group col-md-6 col-12">
                                        <label for="email">Email</label>
                                        <input id="email" name="email" type="email" class="form-control"
                                            value="{{ old('email', $user->email) }}" required="">
                                    </div>
                                    @if ($errors->has('email'))
                                        <code>{{ $errors->first('email') }}</code>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Salvar Alterações</button>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <form method="post" action="{{ route('password.update') }}" class="needs-validation"
                            novalidate="">
                            @csrf
                            @method('put')
                            <div class="card-header">
                                <h4>Atualização de Senha</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="update_password_current_password">Senha Atual</label>
                                        <input id="update_password_current_password" name="current_password" type="password"
                                            class="form-control" autocomplete="current_password">
                                        @if ($errors->updatePassword->has('current_password'))
                                            <code>{{ $errors->updatePassword->first('current_password') }}</code>
                                        @endif
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="update_password_password">Nova Senha</label>
                                        <input id="update_password_password" name="password" type="password"
                                            class="form-control" autocomplete="new-password">
                                        @if ($errors->updatePassword->has('password'))
                                            <code>{{ $errors->updatePassword->first('password') }}</code>
                                        @endif
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="update_password_password_confirmation">Confirmar Senha</label>
                                        <input id="update_password_password_confirmation" name="password_confirmation"
                                            type="password" class="form-control" autocomplete="new-password">
                                        @if ($errors->updatePassword->has('password_confirmation'))
                                            <code>{{ $errors->updatePassword->first('password_confirmation') }}</code>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Salvar Alterações</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
