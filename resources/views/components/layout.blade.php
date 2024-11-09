<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Olimpiade | {{ $title }}</title>
    <link rel="shortcut icon" href="/image/icon.png" type="image/x-icon">
    <script src="https://8x8.vc/vpaas-magic-cookie-5be5eb5971044a0b90dc1fa63a382948/external_api.js"></script>
</head>

<body class="relative">
    @if (!isset($hidenavbar))
        @include('components.navbar')
    @endif
    @can('admin')
        @include('components.sidebar')
    @endcan
    {{ $slot }}
</body>

</html>
