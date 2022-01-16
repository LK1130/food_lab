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

    {{-- Start Footer Section --}}
    <footer>
        <div class="pt-3 ps-3 footer-infos">
            <div class="d-flex align-items-center">
                <img src="{{ url('img/logo.png') }}" class="pe-3"/>
                <p class="fw-bolder">Food Lab</p>
            </div>
            <div class="d-flex flex-wrap justify-content-around align-items-start mt-4 footer-details">
                <div class="footer-navs">
                    <p><a href="#" class="actives">{{ __('messageMK.home') }}</a></p>
                    <p><a href="#">{{ __('messageMK.aboutus') }}</a></p>
                    <p><a href="#">{{ __('messageMK.products') }}</a></p>
                    <p><a href="">{{ __('messageMK.buy coin') }}</a></p>
                    <p><a href="#">{{ __('messageMK.inform') }}</a></p>
                    <p><a href="#">{{ __('messageMK.access') }}</a></p>
                    <p><a href="#">{{ __('messageMK.profile') }}</a></p>
                </div>
                <div>
                    <p>{{ __('messageMK.feedback') }}</p>
                    <p><a href="#">{{ __('messageMK.contact') }}</a></p>
                    <p><a href="/suggest">{{ __('messageMK.suggest') }}</a></p>
                    <p><a href="/report">{{ __('messageMK.report') }}</a></p>
                </div>
                <div>
                    <div>
                        <p>{{ __('messageMK.information') }}</p>
                        <p><a href="/policyinfo">{{ __('messageMK.privacy') }}</a></p>
                        <p><a href="#">{{ __('messageMK.deliveryinfo') }}</a></p>
                    </div>
                    <div class="mt-4">
                        <p>{{ __('messageMK.othesite') }}</p>
                        <p><a href="#">{{ __('messageMK.sitelink') }}</a></p>
                    </div>
                </div>
                <div>
                    <p>{{ __('messageMK.powerby') }}</p>
                    <p>Team x</p>
                    <p><a href="">https://www.teamx.com</a></p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center copys">
            <p>Copy right by Food Lab</p>
        </div>
    </footer>
    {{-- End Footer Section --}}

</body>
</html>
