@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form/thanks.css') }}">
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
