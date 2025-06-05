@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form/confirm.css') }}">
@endsection


@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>Confirm</h2>
        </div>
        <form class="form" action="/thanks" method="post">
        @csrf
            <div class='confirm-table'>
                <table class="confirm-table__inner">
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お名前</th>
                        <td class="confirm-table__text">
                            {{ $contact['last_name']}} {{ $contact['first_name']}}
                            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                        </td>
                    </tr>

                    
                    @php
                        $genderLabels = [1 => '男性', 2 => '女性', 3 => 'その他'];
                    @endphp
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">性別</th>
                        <td class="confirm-table__text">
                            {{ $genderLabels[$contact['gender']] }}
                            <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                        </td>
                    </tr>

                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">メールアドレス</th>
                        <td class="confirm-table__text">
                            {{ $contact['email'] }}
                            <input type="hidden" name="email" value="{{ $contact['email'] }}">
                        </td>
                    </tr>

                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">電話番号</th>
                        <td class="confirm-table__text">
                            {{ $contact['tel'] }}
                            <input type="hidden" name="tel" value="{{ $contact['tel'] }}">
                        </td>
                    </tr>

                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">住所</th>
                        <td class="confirm-table__text">
                            {{ $contact['address'] }}
                            <input type="hidden" name="address" value="{{ $contact['address'] }}">
                        </td>
                    </tr>

                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">建物名</th>
                        <td class="confirm-table__text">
                            {{ $contact['building'] }}
                            <input type="hidden" name="building" value="{{ $contact['building'] }}">
                        </td>
                    </tr>

                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせの種類</th>
                        <td class="confirm-table__text">
                            {{ $category->content}}
                            <input type="hidden" name="category_id" value={{ $contact['category_id'] }}>
                        </td>
                    </tr>

                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせ内容</th>
                        <td class="confirm-table__text">
                            {{ $contact['detail'] }}
                            <textarea name="detail" style="display: none;">{{ e($contact['detail']) }}</textarea>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="form-button">
                <button class="form__button-submit" type="submit">送信</button>
            </div>
                <button class="fix-button"  type="submit">修正</button>
        </form>
@endsection
