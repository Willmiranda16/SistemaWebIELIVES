@extends('layouts.login')

@section('title')
    Register |
@endsection

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="row auth-inner m-0 vh-100">
    <div class="d-none d-lg-flex align-items-center p-4 col-lg-8">
        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
            <img src="https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/demo-1/img/register-v2.0a9e487c.svg" alt="Login" class="img-fluid">
        </div>
    </div>
    <div class="d-flex align-items-center auth-bg px-2 p-lg-4 col-lg-4" style="background-color: #fff;">
        <div class="px-xl-2 mx-auto col-sm-8 col-md-6 col-lg-12">
            <div class="" style="display: flex;justify-content: center;align-items: center;margin-bottom: 3%;">
                <img src="assets/images/insig.png" class="img-fluid" alt="logo" style="width: 21%">
            </div>

            <h3 class="card-title font-weight-bold mt-2" style="text-align: center">
                {{-- Bienvenido Olivarino!! 👋 --}}{{ __('Registro Académico') }}
            </h3>
            <hr>
            <span>
                <form class="auth-login-form mt-3" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div role="group" class="form-group">
                        <label for="name" class="d-block">{{ __('Nombre') }}</label>
                        <div>
                            <span>
                                <input id="name" name="name" type="text" placeholder="user" class="form-control @error('name')is-invalid @enderror" aria-invalid="true" value="{{ old('name') }}" autocomplete="name" autofocus>
                                @error('name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div role="group" class="form-group">
                        <label for="email" class="d-block">{{ __('Correo Electrónico') }}</label>
                        <div>
                            <span>
                                <input id="email" name="email" type="email" placeholder="user@example.com" class="form-control @error('email')is-invalid @enderror" aria-invalid="true" value="{{ old('email') }}" autocomplete="email" autofocus>
                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div>
                            <div class="d-flex justify-content-between">
                                <label for="password">{{ __('Contraseña') }}</label>
                            </div>
                            <span>
                                <div role="group" class="input-group input-group-merge is-invalid">
                                    <input id="password" name="password" type="password" placeholder="············" class="form-control-merge form-control @error('password') is-invalid @enderror" aria-invalid="true" autocomplete="current-password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cursor-pointer feather feather-eye">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                @error('password')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </span>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div>
                            <div class="d-flex justify-content-between">
                                <label for="password-confirm">{{ __('Confirmar Contraseña') }}</label>
                            </div>
                            <span>
                                <div role="group" class="input-group input-group-merge is-invalid">
                                    <input id="password-confirm" name="password_confirmation" type="password" placeholder="············" class="form-control-merge form-control @error('password-confirm') is-invalid @enderror" aria-invalid="true" autocomplete="current-password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cursor-pointer feather feather-eye">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                @error('password-confirm')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </span>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-primary btn-block" style="background: linear-gradient(145deg, #00b5ad, #17a2b8);"> {{ __('Registrarse') }} </button>
                </form>
            </span>
            <hr>
            {{-- <div class="my-2" style="text-align: center;">
                <div class="divider-text"> OR </div>
            </div>
            <div class="social-login text-center">
                <button type="submit" class="btn btn-primary-rgba font-18"><i class="mdi mdi-facebook mr-2"></i>Facebook</button>
                <button type="submit" class="btn btn-danger-rgba font-18"><i class="mdi mdi-google mr-2"></i>Google</button>
            </div> --}}
            <p class="mb-0 mt-3" style="text-align: center;">¿Ya tienes una cuenta? <a href="{{ route('login') }}">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
@endsection
