<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Injection Files</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel=" stylesheet" href="{{ asset('asset/css/fontawesome.all.css') }}" />

    @yield('style')

</head>

<body>
    <div id="app">
        @include('sweetalert::alert')
        <nav class="navbar navbar-expand-md navbar-dark  shadow-sm" style="background-color: #343a40">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('asset/img/samayalogo.png') }}"width="70" height="30"
                        class="d-inline-block align-top" alt="">
                    Injection Files
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <div class="navbar-nav ms-auto">
                        @auth
                            <div class="mt-2">
                                <x-navbar></x-navbar>
                            </div>
                        @endauth
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
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

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            Home
                                        </a>
                                        @if (in_array(Auth::user()->role_id, [1, 2]))
                                            <a class="dropdown-item" href="{{ route('category.new') }}">
                                                Add Category
                                            </a>
                                            <a class="dropdown-item" href="{{ route('user.show') }}">
                                                Edit Profile
                                            </a>
                                            <a class="dropdown-item" href="{{ route('user.new') }}">
                                                Add Users
                                            </a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
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
    </div>

    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(".js-example-placeholder-single").select2({
            placeholder: "Search P-Number",
            allowClear: true,
        });

        $('#search').change(function() {
            if ($(this).val() != '') {
                var partId = $(this).val();
            }
            top.location.href = '{{ url('') }}' + '/show/' + partId;
            $('.item-select').value = "";
        });

        function modalLoader(type, Router, div_name, title, ModalTitle, data) {
            $("#" + div_name).empty();
            $("#" + div_name).html("Loading.....");
            $.ajax({
                url: '{{ url('') }}/' + Router,
                type: type,
                data: data,
                dataType: 'html',
                success: function(data) {
                    $("#" + div_name).html(data);
                    $('#' + ModalTitle).html(title);
                }
            });
        }
    </script>

    @yield('script')

</body>

</html>
