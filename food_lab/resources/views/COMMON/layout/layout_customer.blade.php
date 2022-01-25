<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ url('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ url('css/commonCustomer.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
    @yield('css')
    <title>@yield('title')</title>
</head>

<body>
    @yield('marquee')

    {{-- Start Header --}}
    <header class="headers">
        {{-- start navbar --}}
        <nav class="navbar navbar-expand-lg container-fluid py-3">

            <a href="/" class="navbar-brand d-lg-none">
                <img src="{{ url('storage/logo/siteLog.png') }}"  class="pe-2"/>
                <span class="comapanynames">{{ $name->site_name }}</span>
            </a>

            <p class="nav-link d-lg-none profiles texts"  id="profileButton2"><i class="fas fa-user-circle fs-2"></i></p>

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
                        <p class="nav-link texts">{{ __('messageMK.inform') }}</p>
                    </li>
                    @if (session()->has('customerId'))
                        <li class="nav-item">
                            <p class="nav-link texts"  id="profileButton"><i class="fas fa-user-circle fs-2"></i></p>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link texts" href="/access">{{ __('messageMK.access') }}</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <p class="nav-link texts"><i class="fas fa-shopping-cart fs-3"></i></p>
                    </li>
                </ul>
            </div>

            {{-- /*
                * Create:zayar(2022/01/17) 
                * Update: 
                */ --}}
            {{-- start profile alert box --}}
            @isset($user)
                <div id="profileAlert">
                    <div class="d-flex flex-row justify-content-center profileAlertHeader">
                        <i class="fas fa-arrow-circle-left fs-4 mt-2 text-light" id="back"></i>
                        <p class="userProfile">User Profile</p>
                        <i class="fas fa-edit fs-4 mt-2 text-light"></i>
                    </div>
                    <div class="profileAlertBody">
                        <div class="d-flex flex-column justify-content-center align-items-center ">
                            <i class="far fa-user-circle fs-1 text-light"></i>
                            <p class="mt-3"><i class="fas fa-coins text-warning fs-1"></i> <span
                                    class=" fw-bolder ms-2 text-light"> 300</span> </p>
                            <p class="fw-bolder  profileAlertHeader">{{ $user->nickname }}</p>
                            <p class="fw-bolder  profileAlertHeader">{{ $user->phone }}</p>
                            <p class="fw-bolder  profileAlertHeader">{{ $user->email }}</p>
                            <p class="fw-bolder  profileAlertHeader">
                                {{ $user->township_name }}/{{ $user->state_name }}/ ({{ $user->address3 }})</p>
                            <div class="d-flex flex-row mt-3">
                                <a href="{{ route('editprofile.index') }}"><button class="btn fs-5 me-3 editProfile">Edit
                                        Profile</button></a>
                                <a href="{{ route('updateprofile.index') }}"><button
                                        class="btn fs-5 ms-3 updatePassword">Change Password</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endisset
        </nav>
        {{-- end navbar --}}
        {{-- /*
* Create:zayar(2022/01/22) 
* Update: 
*/ --}}
        {{-- start inform alert box --}}

        <div id="informAlert" class="informAlert">
            <i class="fas fa-arrow-circle-left fs-1  mt-1" id="backInform"></i>

            <div class="headerInform d-flex flex-row justify-content-center align-items-center w-50 mt-2">
                <div class="ms-2 me-5">
                    <p class="fw-bolder fs-5  infromTitle" id="clickNews">News</p>
                </div>
                <div class="ms-2 me-2">
                    <p class="fw-bolder fs-5 infromTitle" id="clickMessages">Messages</p>
                </div>
                <div class="ms-5 me-2">
                    <p class="fw-bolder fs-5 infromTitle" id="clickTracks">Track</p>
                </div>
            </div>
            <div class="forNews d-flex flex-column" id="forNews">
                @forelse ($limitednews as $limitednew)
                    <div class="news d-flex flex-row justify-content-center align-items-center">
                        <img src="/storage/newsImage/{{ $limitednew->source }}" alt="">
                        <p class="fs-6 fw-bolder mt-2 me-auto">{{ $limitednew->title }}
                            ({{ $limitednew->detail }})</p>
                    </div>
                @empty
                    <div class="news d-flex flex-row justify-content-center align-items-center">
                        <p class="fs-6 fw-bolder mt-2 me-auto">{{ __('messageZY.nocategory') }} </p>
                    </div>
                @endforelse
                <button class="btn mb-2 alertButton"> More</button>
            </div>
            <div class="forMessages d-flex flex-column" id="forMessages">
                @forelse ($limitedmessages as $limitedmessage)
                    <div class="messages d-flex flex-row justify-content-center align-items-center">
                        <p class="fs-6 fw-bolder me-auto ms-3 mt-3">{{ $limitedmessage->title }}</p>
                        <div class="d-flex flex-column ">
                            <p class="fs-5 fw-bolder me-4 ms-auto mt-2 rounded green">{{ $limitedmessage->status }}
                            </p>
                            <p class=" fw-bold  mb-1 me-3">{{ $limitedmessage->created_at }}</p>
                        </div>
                    </div>
                @empty
                    <div class="news d-flex flex-row justify-content-center align-items-center">
                        <p class="fs-6 fw-bolder mt-2 me-auto">{{ __('messageZY.nocategory') }} </p>
                    </div>
                @endforelse
                <button class="btn mb-2 alertButton"> More</button>
            </div>
            <div class="forTracks d-flex flex-column" id="forTracks">
                @forelse ($limitedtracks as $limitedtrack)
                    <div class="tracks d-flex flex-row justify-content-center align-items-center">
                        <img src="/storage/newsImage/Dogecoin-Transparent.png" alt="">
                        <div class="d-flex flex-column w-100 me-3 mt-4">
                            <p class=" fw-bolder  ">{{ $limitedtrack->product_name }} </p>
                            <p class=" fw-bold ">{{ $limitedtrack->coin }} coin</p>
                        </div>
                        <div class="d-flex flex-column me-3 w-100 mt-4">
                            <p class="fs-5 fw-bolder rounded green">{{ $limitedtrack->status }} </p>
                            <p class=" fw-bold  mb-3 ">{{ $limitedtrack->created_at }} </p>
                        </div>
                    </div>
                @empty
                    <div class="news d-flex flex-row justify-content-center align-items-center">
                        <p class="fs-6 fw-bolder mt-2 me-auto">{{ __('messageZY.nocategory') }} </p>
                    </div>
                @endforelse
                <button class="btn mb-2 alertButton"> More</button>
            </div>
            {{-- end inform alert box --}}
        </div>
        @yield('header')
    </header>
    {{-- End Header --}}

    @yield('section')

</body>

</html>
