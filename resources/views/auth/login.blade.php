@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Вход') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        {{csrf_field()}}
                        <div class="form-group row d-flex justify-content-center align-content-center">
                            <label for="email" class="align-self-center m-auto col-sm-4 col-form-label text-md-right">{{ __('Адрес e-mail') }}</label>

                            <div class="col-md-6 m-0 p-0 md-form mx-auto">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row d-flex justify-content-center align-content-center">
                            <label for="password" class="align-self-center m-auto col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                            <div class="col-md-6 m-0 p-0 md-form mx-auto">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-kipline">
                                    {{ __('Войти') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Забыли свой пароль?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
