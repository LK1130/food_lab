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
                    <p><a href="/">{{ __('messageMK.home') }}</a></p>
                    <p><a href="#">{{ __('messageMK.aboutus') }}</a></p>
                    <p><a href="#">{{ __('messageMK.products') }}</a></p>
                    <p><a href="">{{ __('messageMK.buy coin') }}</a></p>
                    <p><a href="#">{{ __('messageMK.inform') }}</a></p>
                    <p><a href="/access">{{ __('messageMK.access') }}</a></p>
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