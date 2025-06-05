@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">    
@endsection

@section('header')
        <nav class="header__nav">
            <a class="login-button" href="/login">logout</a>
        </nav>
@endsection

@section('content')
<div class="admin-container">
    <div class="admin-title">
        <h2>Admin</h2>
    </div>
    <div class="search-form">
        <form action="/admin" method="get">
            <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
            <select class="gender" name="gender" >
                <option value="">性別</option>
                <option value="">全て</option>                
                <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
            </select>
            <select class="category" name="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->content }}</option>
                @endforeach
            </select>
            <input type="date" name="date" value="{{ request('date') }}">
            <button type="submit">検索</button>
            <a class="reset-button" href="/admin">リセット</a>
        </form>
    </div>
    <form class="export-form" action="/admin/export" method="get" >
        <div class="extra-parts">
            <div class="export">
                <input type="hidden" name="keyword" value="{{ request('keyword') }}">
                <input type="hidden" name="gender" value="{{ request('gender') }}">
                <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                <input type="hidden" name="date" value="{{ request('date') }}">
                <button type="submit">
                    エクスポート
                </button>
            </div>
            <div class="pagination">
                {{ $contacts->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
        <div class="admin-table">
            <table class="admin-table__inner" >               
                <tr class="admin-table__row">
                    <th class="admin-table__header">お名前</th>
                    <th class="admin-table__header">性別</th>
                    <th class="admin-table__header">メールアドレス</th>
                    <th class="admin-table__header">お問い合わせの種類</th>    
                    <th class="admin-table__header"></th>    
                </tr>
                @foreach($contacts as $contact)
                <tr class="admin-table__row">
                    <td class="admin-table__item">{{ $contact->last_name }}  {{ $contact->first_name }}</td>
                    <td class="admin-table__item">
                        @if ($contact->gender == 1)
                            男性
                        @elseif ($contact->gender == 2)
                            女性
                        @elseif ($contact->gender == 3)
                            その他                            
                        @endif
                    </td>
                    <td class="admin-table__item">{{ $contact->email }}</td>
                    <td class="admin-table__item">{{ $contact->category->content }}</td>
                    <td class="admin-table__item detail-cell">
                        <a class="detail-button" href="">詳細</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>        
    </div>
</div>
@endsection