<html>
<head>
    <meta charset="utf-8"/>

    <title>RLTrans</title>
    <meta name="description" content=""/>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>

<div>
    <nav>
        <ul>
            <li><a href="{{ route('home.mainPage') }}" >HOME</a></li>
            <li><a href="{{ route('freights.mainPage') }}" >FREIGHTS</a></li>
        </ul>
    </nav>
</div>

<div>
    <main>
        @yield('content')
    </main>

    <footer>
{{--        <div>--}}
{{--            FOOTER--}}
{{--        </div>--}}
    </footer>
</div>

<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
