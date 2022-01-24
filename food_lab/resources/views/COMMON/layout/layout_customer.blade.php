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

            <a href="/" class="navbar-brand d-lg-none">
                <img src="{{ url('storage/logo/siteLog.png') }}"  class="pe-2"/>
                <span class="comapanynames">{{ $name->site_name }}</span>
            </a>

            <button class="navbar-toggler nav-buttons" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <div class="bg-light line1"></div>
                <div class="bg-light line2"></div>
                <div class="bg-light line3"></div>
            </button>

            <div class="collapse navbar-collapse text-uppercase fw-bolder" id="navbarNav">
                <ul class="navbar-nav w-100 justify-content-around align-items-center border-0 rounded py-3 navs">
                    @if ($nav == 'home')
                        <li class="nav-item">
                            <a class="nav-link texts actives" href="#">{{ __('messageMK.home') }}</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link texts" href="#">{{ __('messageMK.home') }}</a>
                        </li>
                    @endif
                    @if ($nav == 'product')
                        <li class="nav-item">
                            <a class="nav-link texts actives" href="#">{{  __('messageMK.products') }}</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link texts" href="#">{{  __('messageMK.products') }}</a>
                        </li>
                    @endif
                    @if ($nav == 'coin')
                        <li class="nav-item">
                            <a class="nav-link texts actives" href="#">{{ __('messageMK.buy coin') }}</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link texts" href="#">{{ __('messageMK.buy coin') }}</a>
                        </li>
                    @endif
                    <li class="nav-item companys">
                        <a href="/" class="navbar-brand d-lg-inline">
                            <img src="{{ url('storage/logo/siteLog.png') }}"  class="pe-2"/>
                            <span class="comapanynames">{{  $name->site_name  }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link texts" href="#">{{ __('messageMK.inform') }}</a>
                    </li>
                    @if (session()->has('customerId'))
                        <li class="nav-item">
                            <p class="nav-link texts  mt-3"><i class="fas fa-user-circle fs-2"></i></p>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link texts" href="/access">{{ __('messageMK.access') }}</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <p class="nav-link texts mt-3"><i class="fas fa-shopping-cart fs-3"></i></p>
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
