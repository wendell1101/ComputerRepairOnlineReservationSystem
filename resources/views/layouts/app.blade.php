<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.1/css/all.min.css" integrity="sha512-9my9Mb2+0YO+I4PUCSwUYO7sEK21Y0STBAiFEYoWtd2VzLEZZ4QARDrZ30hdM1GlioHJ8o8cWQiy8IAb1hy/Hg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm --bg-gray-800">
            <div class="container">
                <a class="navbar-brand --roboto-condensed" href="{{ url('/') }}">
                    Tech2u
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#landingNavContent" aria-controls="landingNavContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="landingNavContent">
                    <ul id="" class="navbar-nav ml-auto --poppins">
                        <li class="nav-item --underline mx-3">
                            <a href="#" class="nav-link">HOME</a>
                        </li>

                        <li class="nav-item --underline mx-3">
                            <a href="" class="nav-link">ABOUT</a>
                        </li>

                        <li class="nav-item --underline mx-3">
                            <a href="" class="nav-link">STORE</a>
                        </li>

                        <li class="nav-item --underline mx-3">
                            <a href="" class="nav-link">FAQS</a>
                        </li>

                        <li class="nav-item --underline mx-3">
                            <a href="" class="nav-link">CONTACT</a>
                        </li>

                        @auth
                            <li class="nav-item dropdown mx-3">
                                <a id="userDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="far fa-user --text-gray-50"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item --text-gray-800" href="{{ url('/home') }}">Reservations</a>

                                    <a href="" class="dropdown-item --text-gray-800">Profile</a>

                                    <a class="dropdown-item --text-gray-800" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </div>
                            </li>

                        @else 
                            <li class="nav-item dropdown mx-3">
                                <a id="authDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="far fa-user --text-gray-50"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="authDropdown">
                                    <a href="{{ route('login') }}" class="dropdown-item">LOGIN</a>

                                    <a href="{{ route('register') }}" class="dropdown-item">REGISTER</a>
                                </div>

                            </li>
                        @endauth
                    </ul>   
                </div>
            </div> 
        </nav>

        <main class="pb-4 --bg-gray-50 min-vh-100">
            @yield('content')
        </main>

        {{-- FOOTER --}}
        <footer id="footer-lg" class="--bg-gray-800 --text-gray-50">
            <div class="container py-4">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="text-center">
                            <div class="">
                                <h2 class="--roboto-condensed mb-0" style="font-size: 80px">Tech2U</h2>
                                <p class="--body-20 --poppins mb-0">Computer & Cellphone</p>
                                <p class="--body-20 --poppins mb-0">Gadget Repair Shop</p>
                                <p class="--body-20 --poppins mb-0">
                                    <a href="" class="--text-gray-50">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                </p>
                            </div>

                            <div>
                                <p class="--body-16 --poppins mb-0">Maharlika Highway, Brgy. Lumingon</p>
                                <p class="--body-16 --poppins mb-0">4325 Tiaong, Quezon</p>
                                <p class="--body-16 --poppins mb-0">All Rights Reserved &copy; {{date('Y')}}</p>
                            </div>       
                        </div>
                    </div>

                    <div class="col-md-4 d-flex justify-content-center align-items-center mb-3">
                        <div>
                            <h4 class="--roboto-condensed --body-20 text-center mb-3">MENU</h4>
                            <ul class="list-unstyled text-center">
                                <li class="list-item mb-3 --underline">
                                    <a href="" class="">Home</a>
                                </li>
    
                                <li class="list-item mb-3 --underline">
                                    <a href="" class="">About</a>
                                </li>
    
                                <li class="list-item mb-3 --underline">
                                    <a href="" class="">Store</a>
                                </li>
    
                                <li class="list-item mb-3 --underline">
                                    <a href="" class="">FAQs</a>
                                </li>
                            </ul>
                        </div>    
                    </div>

                    <div class="col-md-4 mb-3">
                        <h4 class="--roboto-condensed --body-20 mb-3">CONNECT WITH US</h4>
                        <div class="--poppins">
                            <form action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="email" id="" class="form-control" placeholder="email">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="message"></textarea>
                                </div>

                                <input type="submit" value="SEND" class="btn btn-block --btn-rounded --btn-outline-green">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
