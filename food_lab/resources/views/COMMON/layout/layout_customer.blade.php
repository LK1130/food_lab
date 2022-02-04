<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ url('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ url('css/commonCustomer.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ url('js/commonCustomer.js') }}" type="text/javascript" defer></script>
    <script src="{{ url('js/forInformAlert.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @yield('script')
    @yield('css')
    <title>@yield('title')</title>
</head>

<body>

    {{-- Start Marquee --}}
    <marquee class="pt-1">
        @foreach ($news as $new)
            <p class="d-inline mx-5 importantnews" id="{{ $new->category }}">{{ $new->title }}</p>
        @endforeach
    </marquee>
    {{-- End Marquee --}}

    {{-- Start Header --}}
    <header class="headers">
        {{-- start navbar --}}
        <nav class="navbar navbar-expand-lg container-fluid py-3 nav-containers">

            <a href="/" class="navbar-brand d-lg-none">
                <img src="{{ url('storage/logo/siteLog.png') }}" class="pe-2" />
                <span class="text-uppercase comapanynames">{{ $name->site_name }}</span>
            </a>

            @if (session()->has('customerId'))
                <script>
                    var customerid = {{ session('customerId') }}
                    var sessionHas = true
                </script>
            @else
                <script>
                    var customerid = null;
                    var sessionHas = false
                </script>
            @endif

            <div class="d-flex">
                <a href="/" class="d-lg-none pt-2 me-3 texts"><i class="fas fa-shopping-cart fs-3"></i></a>

                @if (session()->has('customerId'))
                    <p class="nav-link d-lg-none me-5 texts" id="profileButton2"><i class="fas fa-user-circle fs-1"></i>
                    </p>
                @endif

                <button class="navbar-toggler nav-buttons" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <div class="bg-light line1"></div>
                    <div class="bg-light line2"></div>
                    <div class="bg-light line3"></div>
                </button>
            </div>

            <div class="collapse navbar-collapse text-uppercase fw-bolder" id="navbarNav">
                <ul class="navbar-nav w-100 justify-content-around align-items-center border-0 rounded py-3 navs">
                    @if ($nav == 'home')
                        <li class="nav-item">
                            <a class="nav-link texts actives" href="/">{{ __('messageMK.home') }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link texts" href="/">{{ __('messageMK.home') }}</a>
                        </li>
                    @endif
                    @if ($nav == 'product')
                        <li class="nav-item">
                            <a class="nav-link texts actives" href="#">{{ __('messageMK.products') }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link texts" href="/productLists">{{ __('messageMK.products') }}</a>
                        </li>
                    @endif
                    @if ($nav == 'coin')
                        <li class="nav-item">
                            <a class="nav-link texts actives" href="/buycoin">{{ __('messageMK.buy coin') }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link texts" href="/buycoin">{{ __('messageMK.buy coin') }}</a>
                        </li>
                    @endif
                    <li class="nav-item companys">
                        <a href="/" class="navbar-brand d-lg-inline">
                            <img src="{{ url('storage/logo/siteLog.png') }}" class="pe-2" />
                            <span class="comapanynames">{{ $name->site_name }}</span>
                        </a>
                    </li>
                    @if ($nav == 'inform')
                        <li class="nav-item">
                            <p class="nav-link texts actives position-relative" id="informButton">
                                {{ __('messageMK.inform') }}
                                <span id="alertCount"
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{-- {{ $count }} --}}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </p>
                        </li>
                    @else
                        <li class="nav-item">
                            <p class="nav-link texts  position-relative" id="informButton">
                                {{ __('messageMK.inform') }}
                                <span id="alertCount"
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{-- {{ $count }} --}}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </p>
                        </li>
                    @endif

                    @if (session()->has('customerId'))
                        <li class="nav-item">
                            <p class="nav-link texts" id="profileButton"><i class="fas fa-user-circle fs-2"></i></p>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link texts" href="/access">{{ __('messageMK.access') }}</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="/" class="nav-link texts" id="cartButton"><i class="fas fa-shopping-cart fs-3"></i></a>
                    </li>
                </ul>
            </div>

            {{-- /*
                * Create:zayar(2022/01/17) 
                * Update: 
                */ --}}
            {{-- start profile alert box --}}

            <div id="profileAlert">
                <div class="d-flex flex-row justify-content-center profileAlertHeader">
                    <i class="fas fa-arrow-circle-left fs-4 mt-2 text-light" id="back"></i>
                    <p class="userProfile text-center">User Profile</p>
                    <a href="/logout"><i class="fas fa-sign-out-alt fs-4 mt-2 text-light" id="logout"></i></a>
                </div>
                <div class="profileAlertBody" id="profileAlertBody">

                </div>
            </div>

        </nav>
        {{-- end navbar --}}
        {{-- /*
* Create:zayar(2022/01/22) 
* Update: 
*/ --}}
        {{-- start inform alert box --}}

        <div id="informAlert" class="informAlert">
            <i class="fas fa-arrow-circle-left fs-1  mt-1" id="backInform"></i>

            @if (session()->has('customerId'))
                <div class="headerInform d-flex flex-row justify-content-center align-items-center  mt-2">
                    <div>
                        <p class="fw-bolder fs-5  infromTitle" id="clickNews">{{ __('messageZY.new') }}</p>
                    </div>
                    <div>
                        <p class="fw-bolder fs-5 infromTitle" id="clickMessages">{{ __('messageZY.message') }}</p>
                    </div>
                    <div>
                        <p class="fw-bolder fs-5 infromTitle" id="clickTracks">{{ __('messageZY.track') }}</p>
                    </div>
                </div>
                <div class="forNews d-flex flex-column" id="forNews">

                    <a href="/customerNews" class="ms-auto"><button class="btn mb-2 alertButton">
                            {{ __('messageZY.more') }}</button></a>
                </div>
                <div class="forMessages d-flex flex-column" id="forMessages">

                    <a href="/messages" class="ms-auto"><button class="btn mb-2 alertButton">
                            {{ __('messageZY.more') }}</button></a>
                </div>
                <div class="forTracks d-flex flex-column" id="forTracks">

                    <a href="/tracks" class="ms-auto"><button class="btn mb-2 alertButton">
                            {{ __('messageZY.more') }}</button></a>
                </div>
            @else
                <div class="headerInform d-flex flex-row justify-content-center align-items-center  mt-2">
                    <div>
                        <p class="fw-bolder fs-5 text-center  infromTitle" id="clickNews">{{ __('messageZY.new') }}
                        </p>
                    </div>
                </div>
                <div class="forNews d-flex flex-column" id="forNews">

                    <a href="/customerNews" class="ms-auto"><button class="btn mb-2 alertButton">
                            {{ __('messageZY.more') }}</button></a>
                </div>
            @endif


            {{-- end inform alert box --}}
        </div>
        @yield('header')
    </header>
    {{-- End Header --}}

    @yield('section')

</body>

</html>
