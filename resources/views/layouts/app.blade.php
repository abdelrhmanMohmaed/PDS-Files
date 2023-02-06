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

    <link rel=" stylesheet" href="{{ asset('asset/css/all.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('asset/css/home.css') }}">
    @yield('style')

    {{-- style second drop down --}}
    <style>
        .dropdown-menoo {
            display: none !important;
            height: 90px !important;
            color: #FFF !important;
            position: absolute;
            top: 30px;
            left: 160px;
        }

        .secend-meno:hover+.dropdown-menoo {
            background-color: white !important;
            display: block !important;
        }

        .dropdown-menoo:hover {
            background-color: white !important;
            display: block !important;
        }
    </style>

</head>

<body>

    <section id="bg">
        <div id="home">
            <div id="app">
                {{-- @if (session('alert'))
                 @include('sweetalert::alert')
                  {{ Session::forget('alert') }}
                 @endif --}}
                <nav class="navbar navbar-expand-md navbar-dark  shadow-sm" style="background-color: #343a40">
                    <div class="container">
                        <a class="navbar-brand" href="{{ route('home') }}">
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
                                                <a class="nav-link"
                                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <div class="">
                                            {{-- <button class="meno-btn">menu</button> --}}

                                        </div>

                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('home') }}">
                                                    Home
                                                </a>
                                                @if (in_array(Auth::user()->role_id, [1, 2]))
                                                    <a class="dropdown-item secend-meno" href="#">
                                                        Analysis
                                                        <i class="float-end fa-solid fa-arrow-right text-black-50"></i>
                                                        <ul class="dropdown-menoo border w-100 rounded">
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('analysis.index') }}">Production</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('analysis.index.quality') }}">Quality</a>
                                                            </li>
                                                        </ul>
                                                    </a>

                                                    <a class="dropdown-item" href="{{ route('category.new') }}">
                                                        Categories
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

                        @auth
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Count
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">
                                            PDS: <strong> {{ $pdsCount }}</strong>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            WORK: <strong> {{ $workCount }}</strong>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            PACK: <strong> {{ $packCount }}</strong>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            VIDEOS: <strong> {{ $videoCount }}</strong>
                                        </a>
                                        {{-- <a class="dropdown-item" href="#">
                                            QCP: <strong> {{ $qcpCount }}</strong>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            Measurement: <strong> {{ $measurementCount }}</strong>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            CarePoint: <strong> {{ $carePointCount }}</strong>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            Gauges: <strong> {{ $gaugesCount }}</strong>
                                        </a> --}}
                                    </div>
                                </li>
                            </ul>
                        @endauth
                </nav>
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </section>
    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/all.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        $('body').on('click', '#submit', function() {
            $(this).css('cursor', 'not-allowed');
            $('#store_production').fadeOut(50);
            $('#store_quality').fadeOut(50);

            $('#loader').css('display', 'block');
            $('#loaderGif').append(`
            <img src="{{ url('asset/img/load.gif') }}">
            `);
        });

        $("#success-Alert").fadeOut(2500);

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

