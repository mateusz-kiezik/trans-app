<html>
<head>
    <meta charset="utf-8"/>

    <title>RLTrans</title>
    <meta name="description" content=""/>


    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
          integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css"
          integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.mainPage') }}">
                {{ config('app.name', 'RLTrans') }}
            </a>

            <div class="collapse navbar-collapse">
                <!-- Left side of navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.mainPage') }}">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Freights
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <div class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-truck" viewBox="0 0 16 16">
                                    <path
                                        d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                </svg>
                                <a class="" style="color: black; text-decoration: none; margin-left: 15px;"
                                   href="{{ route('freight.list.active') }}">Active</a>
                            </div>
                            @if (auth()->check())
                                @if (auth()->user()->isForwarder())
                                    <div class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor"
                                             class="bi bi-truck-flatbed" viewBox="0 0 16 16">
                                            <path
                                                d="M11.5 4a.5.5 0 0 1 .5.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-4 0 1 1 0 0 1-1-1v-1h11V4.5a.5.5 0 0 1 .5-.5zM3 11a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm1.732 0h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4a2 2 0 0 1 1.732 1z"/>
                                        </svg>
                                        <a class="" style="color: black; text-decoration: none; margin-left: 15px;"
                                           href="{{ route('freight.new') }}">New</a>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </li>
                    @if (auth()->check())
                        @if (auth()->user()->isForwarder())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Users
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <div class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor"
                                             class="bi bi-people-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                            <path fill-rule="evenodd"
                                                  d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                        </svg>
                                        <a class="" style="color: black; text-decoration: none; margin-left: 15px;"
                                           href="{{ route('user.list') }}">Active</a>
                                    </div>

                                    <div class="dropdown-item ml-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor"
                                             class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                            <path fill-rule="evenodd"
                                                  d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                        <a class="" style="color: black; text-decoration: none; margin-left: 15px;"
                                           href="{{ route('user.new') }}">New</a>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endif
                </ul>

                <!-- Right side of navbar -->
                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.profile.show')}}">
                                    My profile
                                </a>
                                <a class="dropdown-item"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>



<main class="py-4">
    @yield('content')
</main>

<footer>

</footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"
        integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"
    integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>


<script type="text/javascript">
    $(function () {
        $('#datepicker1').datetimepicker({
            format: 'L',
            format: 'YYYY-MM-DD',

        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#datepicker2').datetimepicker({
            format: 'L',
            format: 'YYYY-MM-DD',

        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $('#timepicker1').datetimepicker({
            format: 'LT',
            format: 'HH:mm'

        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#timepicker2').datetimepicker({
            format: 'LT',
            format: 'HH:mm'

        });
    });
</script>

<script>
    function onLoad() {
        //method for button times
        var group1 = document.getElementById("group1");
        group1.classList.remove('hide');
        group1.classList.add('show');

        var group2 = document.getElementById("group2");
        group2.classList.remove('show');
        group2.classList.add('hide');

        var group3 = document.getElementById("group3");
        group3.classList.remove('show');
        group3.classList.add('hide');

        var group4 = document.getElementById("group4");
        group4.classList.remove('show');
        group4.classList.add('hide');
    }


    function onLoad2() {
        //method for button times
        var group2 = document.getElementById("group2");
        group2.classList.remove('hide');
        group2.classList.add('show');

        var group1 = document.getElementById("group1");
        group1.classList.remove('show');
        group1.classList.add('hide');

        var group3 = document.getElementById("group3");
        group3.classList.remove('show');
        group3.classList.add('hide');

        var group4 = document.getElementById("group4");
        group4.classList.remove('show');
        group4.classList.add('hide');
    }

    function onLoad3() {
        //method for button times
        var group3 = document.getElementById("group3");
        group3.classList.remove('hide');
        group3.classList.add('show');

        var group1 = document.getElementById("group1");
        group1.classList.remove('show');
        group1.classList.add('hide');

        var group2 = document.getElementById("group2");
        group2.classList.remove('show');
        group2.classList.add('hide');

        var group4 = document.getElementById("group4");
        group4.classList.remove('show');
        group4.classList.add('hide');
    }
</script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>


<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
