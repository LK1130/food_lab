<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ url('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
    @yield('css')
    <title>@yield('title')</title>
</head>
<body>
    @yield('marquee')

    {{--Start Header --}}
    <header class="headers">
        {{--  start navbar  --}}
        <nav class="navbar navbar-expand-lg container-fluid py-3">

            <a href="#" class="navbar-brand d-lg-none">
                <img src="{{ url('img/logo.png') }}"  class="pe-2"/>
                <span class="comapanynames">{{  __('messageMK.food lab') }}</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-uppercase fw-bolder" id="navbarNav">
                <ul class="navbar-nav w-100 justify-content-around align-items-center border-0 rounded py-3 navs">
                    <li class="nav-item">
                        <a class="nav-link texts actives" href="#">{{ __('messageMK.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link texts" href="#">{{  __('messageMK.products') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link texts" href="#">{{ __('messageMK.buy coin') }}</a>
                    </li>
                    <li class="nav-item companys">
                        <a href="#" class="navbar-brand d-lg-inline">
                            <img src="{{ url('img/logo.png') }}"  class="pe-2"/>
                            <span class="comapanynames">{{  __('messageMK.food lab') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link texts" href="#">{{ __('messageMK.inform') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link texts" href="/access">{{ __('messageMK.access') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link texts" href="#">profile</a>
                    </li>
                </ul>
            </div>
        </nav>
        {{--  end navbar  --}}

        @yield('header')
    </header>
    {{--End Header--}}

    @yield('section')
    


</body>
</html>