<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('head')
<body>
    <div id="app">
        @include('header')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
