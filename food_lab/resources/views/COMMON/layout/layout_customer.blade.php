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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js">
    </script>


    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('script')
    @yield('css')
    @yield('script')
    <title>@yield('title')</title>
</head>

<body>

    {{-- Start Marquee --}}
    <p></p>
    <marquee>
        @foreach ($news as $new)
            <p class="d-inline mx-5 importantnews p-3 fs-5" id="{{ $new->category }}">{{ $new->title }}</p>
        @endforeach
    </marquee>
    {{-- End Marquee --}}

    {{-- Start Header --}}
    <header class="headers">
        {{-- start navbar --}}
        <nav class="navbar navbar-expand-lg container-fluid py-3 nav-containers">

            <a href="/" class="navbar-brand d-lg-none">
                <img src="/storage/siteLogo/{{ $name->site_logo }}" width="80px" class="pe-2" />
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
                @if (session()->has('customerId'))
                    <p class="nav-link d-lg-none mt-1 texts" id="">
                        <a href="/cart" class="d-lg-none position-relative texts"><i
                                class="fas fa-shopping-cart fs-3"></i>
                            <span id="cartCount1"
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cartout cartcount"></span></a>
                    </p>
                    <div class="btn-group d-lg-none">
                        <p class="nav-link texts dropdown-toggle" id="profileButton2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle fs-2"></i>
                        </p>
                        <ul class="dropdown-menu  dropdown-menu-end mb-2 dropdown-menu-dark"
                            aria-labelledby="profileButton2">

                            <li><a class="dropdown-item"
                                    href="{{ route('editprofile.index') }}">{{ __('messageZY.profileSetting') }}</a>
                            </li>
                            <li><a class="dropdown-item" href="" data-bs-toggle="modal"
                                    data-bs-target="#modal">{{ __('messageZY.logout') }}</a></li>
                        </ul>
                    </div>
                    {{-- <p class="nav-link d-lg-none me-2 texts" id="profileButton2"><i class="fas fa-user-circle fs-1"></i>
                    </p> --}}
                @endif

                <button class="navbar-toggler nav-buttons" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation" id="closeInform">
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
                            <a class="nav-link texts actives" href="#">{{ __('messageMK.Food') }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link texts" href="/productLists">{{ __('messageMK.Food') }}</a>
                        </li>
                    @endif
                    @if (session()->has('customerId'))
                        @if ($nav == 'coin')
                            <li class="nav-item">
                                <a class="nav-link texts actives" href="/buycoin">{{ __('messageMK.buy coin') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link texts" href="/buycoin">{{ __('messageMK.buy coin') }}</a>
                            </li>
                        @endif
                    @endif
                    <li class="nav-item companys">
                        <a href="/" class="navbar-brand d-lg-inline">
                            <img src="/storage/siteLogo/{{ $name->site_logo }}" width="80px"
                                class="pe-2" />
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
                        <li class="nav-item" id="cartButton">
                            <a href="/cart" class="nav-link texts "><i class="fas fa-shopping-cart fs-3"></i>
                                <span id="cartCount2"
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cartcount"></span></a>
                        </li>
                        <li class="nav-item">

                            {{-- <div class="dropdown">
                                <p class="nav-link texts dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle fs-2"></i>
                                </p>
                                <div class="dropdown-menu ms-auto">
                                    <button class="dropdown-item" type="button">Action</button>
                                    <button class="dropdown-item" type="button">Another action</button>
                                    <button class="dropdown-item" type="button">Something else here</button>
                                </div>
                            </div> --}}
                            <div class="btn-group">
                                <p class="nav-link texts dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle fs-2"></i>
                                </p>
                                <ul class="dropdown-menu  dropdown-menu-end mt-1 dropdown-menu-dark"
                                    aria-labelledby="dropdownMenuButton">

                                    <li><a class="dropdown-item"
                                            href="{{ route('editprofile.index') }}">{{ __('messageZY.profileSetting') }}</a>
                                    </li>
                                    <li><a class="dropdown-item" href="" data-bs-toggle="modal"
                                            data-bs-target="#modal">{{ __('messageZY.logout') }}</a></li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link texts" href="/signin">{{ __('messageMK.access') }}</a>
                        </li>
                    @endif
                </ul>
            </div>


            {{-- start profile alert box --}}

            <div id="profileAlert">
                <div class="d-flex flex-row justify-content-center profileAlertHeader">

                    <p class="userProfile text-center">User Profile</p>
                    {{-- /logout --}}
                    <a href="" data-bs-toggle="modal" data-bs-target="#modal"><i
                            class="fas fa-sign-out-alt fs-4 mt-2 me-2 text-light" id="logout"></i></a>
                </div>
                <div class="profileAlertBody" id="profileAlertBody">
                    <div class="d-flex flex-row gap-4 justify-content-center  profileAlertfooter">
                        <a href="{{ route('editprofile.index') }}" class="mb-3 "><button
                                class="btn fs-5  editProfile">Edit
                                Profile</button></a>
                        <a href="{{ route('updateprofile.index') }}" class="mb-3 "><button
                                class="btn fs-5  updatePassword">Change
                                Password</button></a>
                    </div>
                </div>
            </div>
            {{-- End profile alert box --}}
            {{-- start Logout Alert --}}
            <div id="modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="col-sm-4 modal-dialog modal-dialog-centered " role="document">
                    <div class="modal-content">
                        {{-- <div class="modal-header"> --}}

                        <div class="d-flex justify-content-end ">


                            <button type="button" class="btn-close mt-1 me-2" data-bs-dismiss="modal"
                                aria-label="Close"></button>

                        </div>
                        {{-- </div> --}}
                        {{-- <div class="modal-body"> --}}
                        <p class="mx-4"> <span><i
                                    class="fa-solid fa-exclamation"></i></span>{{ __('messageZY.yousure') }}</p>
                        {{-- </div> --}}
                        <div class="modal-footer">
                            <a href="/logout"> <button type="button"
                                    class="btn btnCart">{{ __('messageZY.logout') }}</button></a>
                            <button type="button" class="btn btnShopping"
                                data-bs-dismiss="modal">{{ __('messageZY.back') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Logout Alert --}}
            {{-- start Inform Alert --}}
            <div id="informAlert" class="informAlert">


                @if (session()->has('customerId'))
                    <div class="headerInform d-flex flex-row justify-content-center align-items-center  mt-2">
                        <div>
                            <p class="fw-bolder fs-5  infromTitle" id="clickNews">{{ __('messageZY.new') }}</p>
                        </div>
                        <div>
                            <p class="fw-bolder fs-5 infromTitle" id="clickMessages">{{ __('messageZY.message') }}
                            </p>
                        </div>
                        <div>
                            <p class="fw-bolder fs-5 infromTitle" id="clickTracks">{{ __('messageZY.track') }}</p>
                        </div>
                    </div>
                    <div class="forNews d-flex flex-column" id="forNews">

                        <a href="/customerNews" class="ms-auto me-2"><button class="btn mb-2 alertButton">
                                {{ __('messageZY.more') }}</button></a>
                    </div>
                    <div class="forMessages d-flex flex-column" id="forMessages">

                        {{-- <a href="/messages" class="ms-auto me-2"><button class="btn mb-2 alertButton">
                                {{ __('messageZY.more') }}</button></a> --}}
                    </div>
                    <div class="forTracks d-flex flex-column" id="forTracks">

                        {{-- <a href="/tracks" class="ms-auto me-2"><button class="btn mb-2 alertButton">
                                {{ __('messageZY.more') }}</button></a> --}}
                    </div>
                @else
                    <div class="headerInform d-flex flex-row justify-content-center align-items-center  mt-2">
                        <div>
                            <p class="fw-bolder fs-5 text-center  infromTitle" id="clickNews">
                                {{ __('messageZY.new') }}
                            </p>
                        </div>
                    </div>
                    <div class="forNews d-flex flex-column" id="forNews">

                        <a href="/customerNews" class="ms-auto me-2"><button class="btn mb-2 alertButton">
                                {{ __('messageZY.more') }}</button></a>
                    </div>
                @endif
            </div>
            {{-- End Inform Alert --}}
        </nav>
        {{-- end navbar --}}


        @yield('section')

</body>

</html>
