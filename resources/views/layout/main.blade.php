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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

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
                        <a class="nav-link" href="{{ route('home.mainPage') }}">{{ __('messages.navbar-home') }}</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('messages.navbar-freights') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <a class="" style="color: black; text-decoration: none; margin-left: 15px;"
                               href="{{ route('freight.list.active') }}">
                                <div class="dropdown-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-truck me-3" viewBox="0 0 16 16">
                                        <path
                                            d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                    </svg>
                                    {{ __('messages.navbar-freights-active') }}
                                </div>
                            </a>

                            @if (auth()->check())
                                @if (auth()->user()->isForwarder())
                                    <a class="" style="color: black; text-decoration: none; margin-left: 15px;"
                                       href="{{ route('freight.new') }}">
                                        <div class="dropdown-item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor"
                                                 class="bi bi-truck-flatbed me-3" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.5 4a.5.5 0 0 1 .5.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-4 0 1 1 0 0 1-1-1v-1h11V4.5a.5.5 0 0 1 .5-.5zM3 11a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm1.732 0h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4a2 2 0 0 1 1.732 1z"/>
                                            </svg>
                                            {{ __('messages.navbar-freights-new') }}
                                        </div>
                                    </a>
                                @endif
                            @endif

                            <a class="" style="color: black; text-decoration: none; margin-left: 15px;"
                               href="{{ route('freight.find') }}">
                                <div class="dropdown-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-search me-3" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                    {{ __('messages.navbar-freights-find') }}
                                </div>
                            </a>


                        </div>
                    </li>
                    @if (auth()->check())
                        @if (auth()->user()->isForwarder())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('messages.navbar-users') }}
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
                                           href="{{ route('user.list') }}">{{ __('messages.navbar-users-active') }}</a>
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
                                           href="{{ route('user.new') }}">{{ __('messages.navbar-users-new') }}</a>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endif
                </ul>

                <!-- Right side of navbar -->
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Config::get('languages')[App::getLocale()] }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
                                @endif
                            @endforeach
                        </div>
                    </li>

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('messages.navbar-login') }}</a>
                            </li>
                        @endif

{{--                        @if (Route::has('register'))--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.profile.show')}}">
                                    {{ __('messages.navbar-profile-my-profile') }}
                                </a>
                                <a class="dropdown-item"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('messages.navbar-profile-logout') }}
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

<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<script type="text/javascript">
    $(function () {
        $('#datepicker1').datetimepicker({
            format: 'L',
            format: 'YYYY-MM-DD',
            locale: '{{ __('messages.lang-select') }}'
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#datepicker2').datetimepicker({
            format: 'L',
            format: 'YYYY-MM-DD',
            locale: '{{ __('messages.lang-select') }}'
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#datepicker3').datetimepicker({
            format: 'L',
            format: 'YYYY-MM-DD',
            locale: '{{ __('messages.lang-select') }}'
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#datepicker4').datetimepicker({
            format: 'L',
            format: 'YYYY-MM-DD',
            locale: '{{ __('messages.lang-select') }}'
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
    function showFilters() {
        var filters = document.getElementById("filters");
        var button = document.getElementById("filterButton");

        if (filters.classList.contains('hide')) {
            filters.classList.remove('hide');
            filters.classList.add('show');
            button.textContent = "{{ __('messages.freight-find-less-filters-button') }}";
        } else {
            filters.classList.remove('show');
            filters.classList.add('hide');
            button.textContent = '{{ __('messages.freight-find-more-filters-button') }}';
        }

    }
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

<script>
    function addressAutocomplete(containerElement, inputName, action, callback) {
        // create input element
        var inputElement = document.createElement("input");
        inputElement.setAttribute("type", "text");
        inputElement.setAttribute("name", inputName);
        inputElement.setAttribute("class", "form-control");
        inputElement.setAttribute("placeholder", "{{ __('messages.new-freight-address-input-placeholder') }}");
        if (inputElement.getAttribute("name") == "loadingAddress") {
            inputElement.setAttribute("value", "{{ old('loadingAddress') }}")
        }
        if (inputElement.getAttribute("name") == "unloadingAddress") {
            inputElement.setAttribute("value", "{{ old('unloadingAddress') }}")
        }
        containerElement.appendChild(inputElement);


        /* Current autocomplete items data (GeoJSON.Feature) */
        var currentItems;


        /* Close dropdown list when someone focus the text field: */
        inputElement.addEventListener("focus", function (e) {
            /* Close any already open dropdown list */
            closeDropDownList();
        })


        inputElement.addEventListener('keydown', function (key) {
            if (key.keyCode === 13) {

                /* Active request promise reject function. To be able to cancel the promise when a new request comes */
                var currentPromiseReject;


                var currentValue = this.value;

                // Cancel previous request promise
                if (currentPromiseReject) {
                    currentPromiseReject({
                        canceled: true
                    });
                }

                if (!currentValue) {
                    return false;
                }


                /* Create a new promise and send geocoding request */
                var promise = new Promise((resolve, reject) => {
                    currentPromiseReject = reject;


                    var url = `http://localhost:8000/api-call?text=${encodeURIComponent(currentValue)}`


                    fetch(url)
                        .then(response => {
                            console.log(response)
                            // check if the call was successful
                            if (response.ok) {
                                response.json().then(data => resolve(data));
                            } else {
                                response.json().then(data => reject(data));
                            }
                        });
                })


                promise.then((data) => {
                    currentItems = data.features;

                    /*create a DIV element that will contain the items (values):*/
                    var autocompleteItemsElement = document.createElement("div");
                    autocompleteItemsElement.setAttribute("class", "autocomplete-items");
                    containerElement.appendChild(autocompleteItemsElement);

                    /* For each item in the results */
                    data.features.forEach((feature, index) => {
                        /* Create a DIV element for each element: */
                        var itemElement = document.createElement("DIV");
                        /* Set formatted address as item value */
                        let format;
                        if (feature.properties.postcode) {
                            format = feature.properties.postcode + ' ' + feature.properties.city + ', ' + feature.properties.country;
                        }
                        if (feature.properties.postcode == null) {
                            format = feature.properties.city + ', ' + feature.properties.country;
                        }
                        itemElement.innerHTML = format;


                        /* Set the value for the autocomplete text field and notify: */
                        itemElement.addEventListener("click", function (e) {
                            let format;
                            if (currentItems[index].properties.postcode) {
                                format = currentItems[index].properties.postcode + ' ' + currentItems[index].properties.city + ', ' + currentItems[index].properties.country;
                                document.getElementById(action + "-country").setAttribute("value", currentItems[index].properties.country);
                                document.getElementById(action + "-city").setAttribute("value", currentItems[index].properties.city);
                                document.getElementById(action + "-postcode").setAttribute("value", currentItems[index].properties.postcode);
                                document.getElementById(action + "-lat").setAttribute("value", currentItems[index].properties.lat);
                                document.getElementById(action + "-lon").setAttribute("value", currentItems[index].properties.lon);
                            }
                            if (currentItems[index].properties.postcode == null) {
                                format = currentItems[index].properties.city + ', ' + currentItems[index].properties.country;
                                document.getElementById(action + "-country").setAttribute("value", currentItems[index].properties.country);
                                document.getElementById(action + "-city").setAttribute("value", currentItems[index].properties.city);
                                document.getElementById(action + "-lat").setAttribute("value", currentItems[index].properties.lat);
                                document.getElementById(action + "-lon").setAttribute("value", currentItems[index].properties.lon);
                            }

                            inputElement.value = format;
                            callback(currentItems[index]);
                            /* Close the list of autocompleted values: */
                            closeDropDownList();
                        });


                        autocompleteItemsElement.appendChild(itemElement);
                    });
                }, (err) => {
                    if (!err.canceled) {
                        console.log(err);
                    }
                });
            }

        })


        function closeDropDownList() {
            var autocompleteItemsElement = containerElement.querySelector(".autocomplete-items");
            if (autocompleteItemsElement) {
                containerElement.removeChild(autocompleteItemsElement);
            }
        }

    }


    addressAutocomplete(document.getElementById("autocomplete-container-loading"), 'loadingAddress', 'loading', (data) => {
        console.log("Selected loading option: ");
        console.log(data);
    });

    addressAutocomplete(document.getElementById("autocomplete-container-unloading"), 'unloadingAddress', 'unloading', (data) => {
        console.log("Selected unloading option: ");
        console.log(data);
    });
</script>


<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>





