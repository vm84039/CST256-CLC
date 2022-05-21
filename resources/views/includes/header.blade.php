<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'CST256Milestone') }}
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

                    @if ($id == 0)
                        <li class="nav-item">
                            <a class="nav-link" href="login">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if ($id == 0)
                        <li class="nav-item">
                            <a class="nav-link" href="register">{{ __('Register') }}</a>
                        </li>
                    @endif
                @if ($id != 0)
                    <li class="nav-item">
                        <a class="nav-link" href="logout">{{ __('Log Out') }}</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
