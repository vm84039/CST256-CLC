<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
        <title>     {{ config('app.name', 'CST256Milestone') }}
            @yield('title')
        </title>
    </head>
    <body>
        <header>
            @include('includes.header');
        </header>
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="page-footer dark">
            @include('includes.footer')
        </footer>
        @include('includes.scripts');
    </body>
</html>
