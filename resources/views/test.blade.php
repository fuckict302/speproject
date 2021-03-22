@extends ('layouts.app')

@guest
    <h1>Not login</h1>
@else
    @if (Auth::user()->role == "admin")
        <h1>Admin {{ Auth::user()->name }}</h1>
    @else
        <h1>User {{ Auth::user()->name }}</h1>
    @endif
@endguest

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SPE') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-dark" style="background-color: black; color: white;">
        <div class="d-flex" style="background-color: black;">
            <a class="navbar-brand"style="background-color:black;"><img src="{{ URL::asset('img/logo.png') }}" alt=""></a>
            <div>
                <h1>SELF AND PEER EVALUATION PORTAL</h1>
                @guest
                    <div class="d-flex">
                        @if (Route::has('login'))
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </div>
                @else
                    <div class="d-flex">
                        @if (Auth::user()->role == "admin")
                            <a class="nav-link" href="/home">Home</a>
                            <a class="nav-link" href="/managespe">SPE</a>
                            <a class="nav-link" href="/managestudents">Students</a>
                        @else
                            <a class="nav-link" href="/home">Home</a>
                            <a class="nav-link" href="/spe">SPE</a>
                            <a class="nav-link" href="/feedback">Feedback</a>
                        @endif
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>

HALFWAY SURGERY
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SPE') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-dark" style="background-color: black; color: white;">
        <div class="d-flex" style="background-color: black;">
            <a class="navbar-brand"style="background-color:black;"><img src="{{ URL::asset('img/logo.png') }}" alt=""></a>
            <div>
                <h1>SELF AND PEER EVAULATION PORTAL</h1>
                <a href="#home">Home</a>
                <div class="subnav">
                    <button class="subnavbtn">About <i class="fa fa-caret-down"></i></button>
                    <div class="subnav-content">
                        <a href="#company">Company</a>
                        <a href="#team">Team</a>
                        <a href="#careers">Careers</a>
                    </div>
                </div>
                <div class="subnav">
                    <button class="subnavbtn">Services <i class="fa fa-caret-down"></i></button>
                    <div class="subnav-content">
                        <a href="#bring">Bring</a>
                        <a href="#deliver">Deliver</a>
                        <a href="#package">Package</a>
                        <a href="#express">Express</a>
                    </div>
                </div>
                <div class="subnav">
                    <button class="subnavbtn">Partners <i class="fa fa-caret-down"></i></button>
                    <div class="subnav-content">
                        <a href="#link1">Link 1</a>
                        <a href="#link2">Link 2</a>
                        <a href="#link3">Link 3</a>
                        <a href="#link4">Link 4</a>
                    </div>
                </div>
                <a href="#contact">Contact</a>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>

Login url

public function login(Request $request)
{
if ($request->input('submit') == 'magic-link') {
$user = $this->loginViaMagicLink($request);
if(!$user){
return redirect()->route('login')
->withErrors(['email' => 'User with this email does not exist'])
->withInput();
}
return redirect()->route('login')->withMessage('Link sent successfully to ' .$user->email);
}


$this->validateLogin($request);

// If the class is using the ThrottlesLogins trait, we can automatically throttle
// the login attempts for this application. We'll key this by the username and
// the IP address of the client making these requests into this application.
if (method_exists($this, 'hasTooManyLoginAttempts') &&
$this->hasTooManyLoginAttempts($request)) {
$this->fireLockoutEvent($request);

return $this->sendLockoutResponse($request);
}

if ($this->attemptLogin($request)) {
return $this->sendLoginResponse($request);
}

// If the login attempt was unsuccessful we will increment the number of attempts
// to login and redirect the user back to the login form. Of course, when this
// user surpasses their maximum number of attempts they will get locked out.
$this->incrementLoginAttempts($request);

return $this->sendFailedLoginResponse($request);
}

ORI HOME CONTROLLER
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
