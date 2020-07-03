@extends('layouts.header-footer')

@section('main')
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="create-login col-sm-10 col-md-8 col-lg-4 ">
        <p class="form-title">Авторизация</p>
         <form action="/login" method="POST" >
             @csrf
            <div class="form-group row">
                <input type="email" id="email" name="email" class="col-sm p-0" autofocus placeholder="E-mail" required>
            </div>
             @error('email')
             <div class="invalid-feedback">
                 {{$message}}
             </div>
             @enderror
            <div class="form-group row">
                <input type="password" id="password" name="password" class="col-sm p-0" placeholder="Пароль" required>
            </div>
             @error('password')
             <div class="invalid-feedback">
                 {{$message}}
             </div>
             @enderror
            <button name="login-btn" class="border-0 p-1 mt-2 w-100 login-btn">Войти</button>
        </form>
        </div>
    </div>
</div>
@endsection
