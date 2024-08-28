<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('css')
</head>

<body>
    <div class="wrapper">

        <header>
            <img src="{{ asset('storage/images/mogitateLogo.png') }}" alt="mogitate">
        </header>

        <main>
            @yield('content')
        </main>

    </div>
</body>

</html>