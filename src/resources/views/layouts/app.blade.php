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
    {{-- @livewireStyles --}}
</head>

<body>
    <header class="header">
        @yield('header')
    </header>

    <main>
        @yield('content')
    </main>
    @livewireScripts
    {{-- <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('openModal', function (id) {
                console.log('Livewireで openModal 受信。ID:', id);
            });
        });
    </script> --}}
</body>
</html>