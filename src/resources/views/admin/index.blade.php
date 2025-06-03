@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">    
@endsection

@section('header')
<div class="header">
    <div class="header-utilities">
        <h1 class="header__logo">
            FashionablyLate
        </h1>
        <nav class="header__nav">
            <a class="login-button" href="/login">logout</a>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="admin-container">
    <div class="admin-title">
        <h2>Admin</h2>
    </div>
    <div class="search-form">
        <form action="/index" method="get">
            <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
            <select class="gender" name="gender" >
                <option value="">性別</option>
                <option value="男性">男性</option>
                <option value="女性">女性</option>
                <option value="その他">その他</option>
            </select>
            <select class="category" name="category">
                <option value="">お問い合わせの種類</option>
                <option value="商品のお届けについて">商品のお届けについて</option>
                <option value="商品の交換について">商品の交換について</option>
            </select>
            <input type="date" name="date" value="{{ request('date') }}">
            <button type="submit">検索</button>
            <a class="reset-button" href="/index">リセット</a>
        </form>
        <div class="export">
            <button type="">
                エクスポート
            </button>
        </div>
        <div class="pagination">
            {{ $contacts->appends(request()->query())->links() }}
        </div>
        <div class="admin-table">
            <table class="admin-table__inner">
                @foreach($contacts as $contact)
                <tr class="admin-table__row">
                    <th class="table-title__header">
                        <span class="admin-table__header-span">お名前</span>
                        <span class="admin-table__header-span">性別</span>
                        <span class="admin-table__header-span">メールアドレス</span>
                        <span class="admin-table__header-span">お問い合わせの種類</span>    
                    </th>
                </tr>
                <tr class="admin-table__row">
                    {{-- <td class="admin-table__item">{{ $contact->name }}</td>
                    <td class="admin-table__item">{{ $contact->gender }}</td>
                    <td class="admin-table__item">{{ $contact->email }}</td>
                    <td class="admin-table__item">{{ $contact->category }}</td> --}}
                    <td class="admin-table__item">
                        <a class="detail-button" href=""></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        

        
    </div>

</div>
@endsection