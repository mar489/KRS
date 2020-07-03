@extends('layouts.admin-menu')

@section('content')


    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="create-register col-sm-12 col-md-10 col-lg-7">
                <p class="form-title">Регистрация</p>
                <form action="/register" method="POST">
                    @csrf
                    <div class="form-group row justify-content-between mb-2">
                        <input type="text" id="surname" name="surname" class="col-sm p-0" autofocus placeholder="Фамилия" minlength="2" maxlength="255"
                               required value="{{old('surname')}}">
                        <input type="text" id="name" name="name" class="col-sm p-0" placeholder="Имя" minlength="2" maxlength="255"
                               required value="{{old('name')}}">
                        <input type="text" id="patronymic" name="patronymic" class="col-sm p-0" minlength="2" maxlength="255" placeholder="Отчество"
                               value="{{old('patronymic')}}">
                    </div>
                    @error('surname')
                    <div class="invalid-feedback mt-0 mb-2" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    @error('name')
                    <div class="invalid-feedback mt-0 mb-2" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    @error('patronymic')
                    <div class="invalid-feedback mt-0 mb-2" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="form-group row mb-2 justify-content-between">
                        <input type="email" id="email" name="email" class="col-sm p-0" placeholder="E-mail" required value="{{old('email')}}">
                    </div>
                    @error('email')
                    <div class="invalid-feedback mt-0 mb-2" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="form-group row mb-2">
                        <input type="password" id="password" name="password" minlength="8" maxlength="30" class="col p-0" placeholder="Пароль" required>
                    </div>
                    @error('password')
                    <div class="invalid-feedback mt-0 mb-2" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="form-group row">
                        <input type="password" id="confirm-password" name="password_confirmation" minlength="8" maxlength="30" class="col p-0"
                               placeholder="Повторите пароль" required>
                    </div>
                    <button name="register-btn" class="border-0 p-1 mt-2 w-100 register-btn">Зарегистрировать</button>
                </form>
            </div>
        </div>
    </div>
@endsection
