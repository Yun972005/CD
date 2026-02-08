<!doctype html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <title>@yield('titol')</title>
    {{-- cambias el asset por vite --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    @include('partials.nav')

    <div class="container mt-4">
        @yield('contingut')
    </div>

</body>
</html>
