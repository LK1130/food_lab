@extends('COMMON.layout.layout_customer')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('css/customer/common.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('css/customer/style.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('body')

    {{--  Start Marquee  --}}
    <marquee class="pt-1">
        <p class="d-inline mx-5">Every Weekend will give you 5%.</p>
        <p class="d-inline mx-5">Coming new food soon!</p>
    </marquee>
    {{--  End Marquee  --}}

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
                        <a class="nav-link texts" href="#">{{ __('messageMK.home') }}</a>
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
                        <a class="nav-link texts" href="#">{{ __('messageMK.access') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link texts" href="#">profile</a>
                    </li>
                </ul>
            </div>
        </nav>
        {{--  end navbar  --}}

        {{--  start carousel  --}}
        <div id="carouselExampleIndicators" class="carousel slide carousels" data-bs-ride="">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row align-items-center items">
                        <div  class="col-6 flex-column">
                            <h1 class="fw-bolder tastes">{{ __('messageMK.TasteOurDeliciousFood') }}</h1>
                            <p  class="fw-bold delivery-infos">{{ __('messageMK.We deliver food as fast as you expert and we care about your time, so that you can grab your food at time') }}</p>
                        </div>
                        <div class="col-6 ">
                            <img src="{{ url('img/menu.png') }}" alt="menu1"/>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row align-items-center items">
                        <div  class="col-6 flex-column">
                            <h1 class="fw-bolder tastes">{{ __('messageMK.TasteOurDeliciousFood') }}</h1>
                            <p  class="fw-bold delivery-infos">{{ __('messageMK.We deliver food as fast as you expert and we care about your time, so that you can grab your food at time') }}</p>
                        </div>
                        <div class="col-6 ">
                            <img src="{{ url('img/menu.png') }}" alt="menu1"/>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row align-items-center items">
                        <div  class="col-6 flex-column">
                            <h1 class="fw-bolder tastes">{{ __('messageMK.TasteOurDeliciousFood') }}</h1>
                            <p  class="fw-bold delivery-infos">{{ __('messageMK.We deliver food as fast as you expert and we care about your time, so that you can grab your food at time') }}</p>
                        </div>
                        <div class="col-6 ">
                            <img src="{{ url('img/menu.png') }}" alt="menu1"/>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        {{--  end carousel  --}}

    </header>
    {{--End Header--}}

    {{--Start Welcome Section--}}
    <section class="d-flex flex-column justify-content-center align-items-center welcomes">
        <p class="fs-1 fw-bolder welcometexts">{{ __('messageMK.Welcome Our Food Lab') }}</p>
        <p class="fs-4 companyinfos"><i class="fas fa-quote-left falefts"></i>{{ __('messageMK.FoodLabInfo') }}<i class="fas fa-quote-right farights"></i></p>
    </section>
    {{--End Welcome Section--}}

    {{-- Start Best Seller Item Section --}}
    <section class="best-items">
        <fieldset class="d-flex flex-wrap justify-content-around align-items-center border border-3 text-light sellers">
            <legend class="seller-headers">{{ __('messageMK.bestselleritems') }}</legend>
            
            {{--start items--}}
            <div class="d-flex flex-column justify-content-center align-items-center fw-bold my-3 py-5">
                <img src="{{ url('img/bestitem1.png') }}" alt="bestitem1"/>
                <p class="fs-3 pt-2">Item1</p>
                <p class="fs-5"><i class="fas fa-coins pe-2"></i> 45</p>
                <button type="button" class="btn btn-primary">{{ __('messageMK.shopnow') }}</button>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center fw-bold my-3  py-5">
                <img src="{{ url('img/bestitem1.png') }}" alt="bestitem1"/>
                <p class="fs-3 pt-2">Item1</p>
                <p class="fs-5"><i class="fas fa-coins pe-2"></i> 45</p>
                <button type="button" class="btn btn-primary">{{ __('messageMK.shopnow') }}</button>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center fw-bold my-3  py-5">
                <img src="{{ url('img/bestitem1.png') }}" alt="bestitem1"/>
                <p class="fs-3 pt-2">Item1</p>
                <p class="fs-5"><i class="fas fa-coins pe-2"></i> 45</p>
                <button type="button" class="btn btn-primary">{{ __('messageMK.shopnow') }}</button>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center fw-bold my-3  py-5">
                <img src="{{ url('img/bestitem1.png') }}" alt="bestitem1"/>
                <p class="fs-3 pt-2">Item1</p>
                <p class="fs-5"><i class="fas fa-coins pe-2"></i> 45</p>
                <button type="button" class="btn btn-primary">{{ __('messageMK.shopnow') }}</button>
            </div>
            {{--end items--}}

        </fieldset>
    </section>
    {{-- End Best Seller Item Section --}}

    {{-- Start Best Seller Item Section --}}
    <section class="best-items">
        <fieldset class="d-flex flex-wrap justify-content-around align-items-center border border-3 text-light sellers">
            <legend class="seller-headers">{{ __('messageMK.bestselleritems') }}</legend>
            
            {{--start items--}}
            <div class="d-flex flex-column justify-content-center align-items-center fw-bold my-3 py-5">
                <img src="{{ url('img/bestitem1.png') }}" alt="bestitem1"/>
                <p class="fs-3 pt-2">Item1</p>
                <p class="fs-5"><i class="fas fa-coins pe-2"></i> 45</p>
                <button type="button" class="btn btn-primary">{{ __('messageMK.shopnow') }}</button>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center fw-bold my-3  py-5">
                <img src="{{ url('img/bestitem1.png') }}" alt="bestitem1"/>
                <p class="fs-3 pt-2">Item1</p>
                <p class="fs-5"><i class="fas fa-coins pe-2"></i> 45</p>
                <button type="button" class="btn btn-primary">{{ __('messageMK.shopnow') }}</button>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center fw-bold my-3  py-5">
                <img src="{{ url('img/bestitem1.png') }}" alt="bestitem1"/>
                <p class="fs-3 pt-2">Item1</p>
                <p class="fs-5"><i class="fas fa-coins pe-2"></i> 45</p>
                <button type="button" class="btn btn-primary">{{ __('messageMK.shopnow') }}</button>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center fw-bold my-3  py-5">
                <img src="{{ url('img/bestitem1.png') }}" alt="bestitem1"/>
                <p class="fs-3 pt-2">Item1</p>
                <p class="fs-5"><i class="fas fa-coins pe-2"></i> 45</p>
                <button type="button" class="btn btn-primary">{{ __('messageMK.shopnow') }}</button>
            </div>
            {{--end items--}}

        </fieldset>
    </section>
    {{-- End Best Seller Item Section --}}

@endsection
