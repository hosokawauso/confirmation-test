<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }} ">

    @yield('css')
</head>
<body>
    <header class="header">
        @yield('header')
        <div class="header__inner">
           <div class="header-utilities">
            <a class="header__logo"  href="/">
                FashionablyLate
            </a>
            <nav></nav>
           </div>
        </div>            
    </header>

    <main>
        @yield('content')
    </main>    
</body>
</html>