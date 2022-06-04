<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
        <title>     {{ config('app.name', 'CST256Milestone') }}
            @yield('title')
        </title>
    </head>
    <body>
    <div id="wrapper">
        @include('includes.header')
        <div id="content">
            @include('includes.sidebar')
            @yield('content')
        </div>
        <br>
        <div class="push"></div>
    </div>
    <div id="footer">
        <div id="footer-content ">
            @include('includes.footer')
        </div>
    </div>
        @include('includes.scripts')
    </body>
</html>
