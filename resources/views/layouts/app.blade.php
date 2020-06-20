<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Vormingscentrum HIVSET</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">

    @stack('stylesheets')

    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png" />
</head>

<body>

@yield('content')

<script src="/js/app.js"></script>

@stack('javascript')
</body>

</html>