@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('header')
<div class="header">
    <div class="header-utilities">
        <h1 class="header__logo">
            FashionablyLate
        </h1>
        <nav class="header__nav">
            <a class="login-button" href="/register">register</a>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="login-form__content">
    <div class="login-form__heading">
        <h2>Login</h2>
    </div>
    <form class="form" action="/login" method="post">
    @csrf
       <div class="form__group">
          <div class="form__group-title">
            <p class="form__label--item">メールアドレス</p>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
                <input type="text" name="email" value="{{ old('email') }}">
            </div>
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
          </div>
       </div>
    <div class="form__group">
        <div class="form__group-title">
            <p class="form__label--item">パスワード</p>
        </div>
        <div class="form__group-content">
            <div class="form__input--text">
                <input type="password" name="password">
            </div>
            <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
        </div>
    </div>
    <div class="form__button">
        <button class="form__button-submit" type="submit">ログイン</button>
    </div>
    </form>
</div>
@endsection

