@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form/thanks.css') }}">
@endsection

@section('header')
<div class="header__inner">
    <div class="header-utilities">
        <h1 class="header__logo">
         FashionablyLate
        </h1>
    </div>
</div>
@endsection



@section('content')
<div class="thanks-form__content">
    <div class="thanks-form__heading">
        <h2>Thanks</h2>
    </div>
    <div class="thanks__content">
        <div class="thanks__heading">
            <h2>お問い合わせありがとうございました</h2>
        </div>
        <div class="home__button">
            <a href="/" class="home__button-link">HOME</a>
        </div>
    </div>
@endsection
