@extends('layouts.login')

@section('title')
    Login |
@endsection

@section('content')
<div class="row p-0 m-0">
   
    <div class="col-4 p-0 m-0">
        <div class="row p-0 m-0">
            <div class="col-12 logo">
                <img src="assets/images/insig.png" class="img-fluid" alt="LOGO-IECAO">
            </div>
            <div class="col-12 form" style="margin-top: -10%;">
                <form class="auth-login-form mt-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="login">
                        <h2 class="card-title font-weight-bold mt-3" style="text-align: center">
                            <b>{{ __('Acceso Académico') }}</b>
                        </h2>
                    </div>
                    <div class="datos">
                        <label for="email" class="d-block m-2"><b>{{ __('Email') }}</b></label>
                        <div>
                            <span>
                                <input id="email" name="email" type="email" placeholder="user@example.com" class="{{-- form-control --}} @error('email')is-invalid @enderror" aria-invalid="true" value="{{ old('email') }}" autocomplete="email" autofocus required>
                                <br>
                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </span>
                        </div>
                        <br>
                        <label for="password" class="d-block m-2"><b>{{ __('Password') }}</b></label>
                        <div>
                            <span>
                                <input id="password" name="password" type="password" placeholder="············" class="{{-- form-control --}} @error('password') is-invalid @enderror" aria-invalid="true" autocomplete="password"  autofocus required>
                                <br>
                                @error('password')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="logear">
                        <button type="submit" class="btn btn-primary btn-block" >
                            <h4>{{ __('Iniciar Sesión') }}</h4>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-8 p-0 m-0">
        <img src="assets/images/ie.jpg" alt="banner" class="fondo">
    </div>
</div>
@endsection
