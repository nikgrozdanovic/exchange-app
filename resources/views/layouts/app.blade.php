<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') {{ env('APP_NAME') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">

    @stack('stylesheets')

    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png" />
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        <div class="row justify-content-center">
            @yield('content')
        </div>
    </main>
<script src="/js/app.js"></script>

@stack('javascript')
</body>

</html>