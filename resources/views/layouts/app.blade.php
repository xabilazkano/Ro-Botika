<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
<body>
    @include('layouts.nav')
    @include('layouts.modals')
        <main class="py-4">
            @yield('content')
        </main>
    @include('layouts.footer')

</body>
</html>
