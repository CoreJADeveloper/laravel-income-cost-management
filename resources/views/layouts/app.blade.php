<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/Chart.min.js') }}" type="text/javascript"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Chart.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                        <li class="nav-item">
                          <li>
                            <a class="nav-link" href="{{ url('dashboard') }}">
                                প্রথম পৃষ্ঠা
                            </a>
                          </li>
                          <li>
                            <a class="nav-link" href="{{ url('report') }}">
                                রিপোর্ট
                            </a>
                          </li>
                          @if(Auth::user()->hasAnyRole('admin'))
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  কর্মচারিদের বেতন <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('salaries') }}">
                                    আগের রেকর্ড
                                </a>
                                <a class="dropdown-item" href="{{ url('salaries/create') }}">
                                    নতুন রেকর্ড
                                </a>
                              </div>
                          </li>
                          @endif
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  বকেয়া আদায় <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('due-collections') }}">
                                    আগের রেকর্ড
                                </a>
                                <a class="dropdown-item" href="{{ url('due-collections/create') }}">
                                    নতুন রেকর্ড
                                </a>
                              </div>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  ব্যাংকে জমা <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('bank-savings') }}">
                                    আগের রেকর্ড
                                </a>
                                <a class="dropdown-item" href="{{ url('bank-savings/create') }}">
                                    নতুন রেকর্ড
                                </a>
                              </div>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  সিমেন্ট <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('cement') }}">
                                    আগের রেকর্ড
                                </a>
                                <a class="dropdown-item" href="{{ url('cement/create') }}">
                                    নতুন রেকর্ড
                                </a>
                                <a class="dropdown-item" href="{{ url('cement-brands') }}">
                                    ব্র্যান্ড
                                </a>
                                <a class="dropdown-item" href="{{ url('cement-brands/create') }}">
                                    নতুন ব্র্যান্ড
                                </a>
                              </div>
                          </li>

                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  রড <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('rod') }}">
                                    আগের রেকর্ড
                                </a>
                                <a class="dropdown-item" href="{{ url('rod/create') }}">
                                    নতুন রেকর্ড
                                </a>
                                <a class="dropdown-item" href="{{ url('rod-brands') }}">
                                    ব্র্যান্ড
                                </a>
                                <a class="dropdown-item" href="{{ url('rod-brands/create') }}">
                                    নতুন ব্র্যান্ড
                                </a>
                              </div>
                          </li>

                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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


        @auth
        @extends('templates.report-modal')
        @endauth

    </div>
</body>
</html>
