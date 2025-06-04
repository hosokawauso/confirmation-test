@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form/thanks.css') }}">
@endsection


@section('content')
<div class="thanks-form__content">
    <div class="thanks-form__heading">
        <h2>Thanks</h2>
    </div>
    <form class="form" action="/thanks" method="post">
    @csrf
    <div class="thanks__content">
        <div class="thanks__heading">
            <h2>お問い合わせありがとうございました</h2>
        </div>
        <div class="home__button">
            <button class="home__button-submit" type="submit">HOME</button>
        </div>
    </div>
@endsection
