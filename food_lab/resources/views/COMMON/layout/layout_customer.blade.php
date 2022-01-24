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

            <div class="collapse navbar-collapse text-uppercase fw-bolder navcontainer" id="navbarNav">
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
                        <a class="nav-link texts" href="#" id="informButton">{{ __('messageMK.inform') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link texts" href="/access">{{ __('messageMK.access') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link texts" href="#" id="profileButton">profile</a>
                    </li>
                </ul>
            </div>

    
                {{--  /*
* Create:zayar(2022/01/17) 
* Update: 
*/  --}}
{{--  start profile alert box  --}}

<div id="profileAlert">
    <div class="d-flex flex-row justify-content-center profileAlertHeader">   
        <i class="fas fa-arrow-circle-left fs-4 mt-2 text-light" id="back"></i>
        <p class="userProfile">User Profile</p>
        <i class="fas fa-edit fs-4 mt-2 text-light"></i>
    </div>
    <div  class="profileAlertBody">
        <div class="d-flex flex-column justify-content-center align-items-center ">
            <i class="far fa-user-circle fs-1 text-light"></i>
            <p class="mt-3"><i class="fas fa-coins text-warning fs-1"></i> <span class=" fw-bolder ms-2 text-light"> 300</span> </p>
            <p class="fw-bolder  profileAlertHeader">{{ $user->nickname }}</p>
            <p class="fw-bolder  profileAlertHeader">{{ $user->phone }}</p>
            <p class="fw-bolder  profileAlertHeader">{{ $user->email }}</p>
            <p class="fw-bolder  profileAlertHeader">{{ $user->township_name }}/{{ $user->state_name }}/ ({{ $user->address3 }})</p>
            <div class="d-flex flex-row mt-3">
                <a href="{{ route('editprofile.index') }}"><button class="btn fs-5 me-3 editProfile">Edit Profile</button></a>
                <a href="{{ route('updateprofile.index') }}"><button class="btn fs-5 ms-3 updatePassword">Change Password</button></a>
            </div>
        </div>
    </div>
</div>

            

        </nav>
        {{--  end navbar  --}}
                                {{--  /*
* Create:zayar(2022/01/22) 
* Update: 
*/  --}}
{{--  start inform alert box  --}}

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
            <p class="fs-6 fw-bolder mt-2 me-auto">{{ $limitednew->title }} ({{ $limitednew->detail }})</p>
        </div>
        @empty
        <div class="news d-flex flex-row justify-content-center align-items-center">
            <p class="fs-6 fw-bolder mt-2 me-auto">{{__('messageZY.nocategory')}} </p>
        </div>
        @endforelse
        <button class="btn mb-2 alertButton" > More</button>
    </div>
    <div class="forMessages d-flex flex-column" id="forMessages">
        @forelse ($limitedmessages as $limitedmessage)
        <div class="messages d-flex flex-row justify-content-center align-items-center">
            <p class="fs-6 fw-bolder me-auto ms-3 mt-3">{{ $limitedmessage->title }}</p>
            <div class="d-flex flex-column ">
                <p class="fs-5 fw-bolder me-4 ms-auto mt-2 rounded green">{{ $limitedmessage->status }}</p>
                <p class=" fw-bold  mb-1 me-3">{{ $limitedmessage->created_at }}</p>
            </div>
        </div>
        @empty
        <div class="news d-flex flex-row justify-content-center align-items-center">
            <p class="fs-6 fw-bolder mt-2 me-auto">{{__('messageZY.nocategory')}} </p>
        </div>
        @endforelse
        <button class="btn mb-2 alertButton" > More</button>
    </div>
    <div class="forTracks d-flex flex-column" id="forTracks">
        @forelse ($limitedtracks as $limitedtrack)
        <div class="tracks d-flex flex-row justify-content-center align-items-center">
            <img src="/storage/newsImage/Dogecoin-Transparent.png" alt="" >
            <div class="d-flex flex-column w-100 me-3 mt-4">
                <p class=" fw-bolder  ">{{ $limitedtrack->product_name }} </p>
                <p class=" fw-bold ">{{ $limitedtrack->coin }}  coin</p>
            </div>
            <div class="d-flex flex-column me-3 w-100 mt-4">
                <p class="fs-5 fw-bolder rounded green">{{ $limitedtrack->status }} </p>
                <p class=" fw-bold  mb-3 ">{{ $limitedtrack->created_at }} </p>
            </div>
        </div>
        @empty
        <div class="news d-flex flex-row justify-content-center align-items-center">
            <p class="fs-6 fw-bolder mt-2 me-auto">{{__('messageZY.nocategory')}} </p>
        </div>
        @endforelse
        {{--  <div class="tracks d-flex flex-row justify-content-center align-items-center">
            <img src="/storage/newsImage/Dogecoin-Transparent.png" alt="" >
            <div class="d-flex flex-column w-100 me-3 mt-4">
                <p class=" fw-bolder  ">Spicy Noodle </p>
                <p class=" fw-bold ">200 coin</p>
            </div>
            <div class="d-flex flex-column me-3 w-100 mt-4">
                <p class="fs-5 fw-bolder    rounded green">Approved</p>
                <p class=" fw-bold  mb-3 ">2022-2-15 8:30 pm</p>
            </div>
        </div>
        <div class="tracks d-flex flex-row justify-content-center align-items-center">
            <img src="/storage/newsImage/Dogecoin-Transparent.png" alt="" >
            <div class="d-flex flex-column w-100 me-3 mt-4">
                <p class=" fw-bolder  ">Spicy Noodle </p>
                <p class=" fw-bold ">200 coin</p>
            </div>
            <div class="d-flex flex-column me-3 w-100 mt-4">
                <p class="fs-5 fw-bolder    rounded green">Approved</p>
                <p class=" fw-bold  mb-3 ">2022-2-15 8:30 pm</p>
            </div>
        </div>
        <div class="tracks d-flex flex-row justify-content-center align-items-center">
            <img src="/storage/newsImage/Dogecoin-Transparent.png" alt="" >
            <div class="d-flex flex-column w-100 me-3 mt-4">
                <p class=" fw-bolder  ">Spicy Noodle </p>
                <p class=" fw-bold ">200 coin</p>
            </div>
            <div class="d-flex flex-column me-3 w-100 mt-4">
                <p class="fs-5 fw-bolder    rounded green">Approved</p>
                <p class=" fw-bold  mb-3 ">2022-2-15 8:30 pm</p>
            </div>
        </div>  --}}
        <button class="btn mb-2 alertButton" > More</button>
    </div>
    {{--  end inform alert box  --}}
    </div>
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
