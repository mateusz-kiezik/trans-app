<html>
<head>
    <meta charset="utf-8"/>

    <title>RLTrans</title>
    <meta name="description" content=""/>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">RLTrans</a>
{{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"--}}
{{--                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.mainPage') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Freights
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('freights.mainPage') }}">Active</a>
                        <a class="dropdown-item" href="#">Add</a>
                        <a class="dropdown-item" href="#">Archive</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div>
    @yield('content')
</div>

<footer>

</footer>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
