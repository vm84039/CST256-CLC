
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <div class="header">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img style="height: 100px; float: left;" src="{{ asset('assets/img/job-search.jpeg') }}" alt="logo" />
            </a>
        </div>
        <h2 class="header">{{ config('app.name', 'CST256Milestone') }}</h2>

        <a class="navbar-brand" href="{{ url('/') }}">

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->

                @if (!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="login">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="register">{{ __('Register') }}</a>
                    </li>
                @endif
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="logout">{{ __('Log Out') }}</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
