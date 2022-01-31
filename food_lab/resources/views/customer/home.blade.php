@extends('COMMON.layout.layout_customer')

@section('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('css/commonCustomer.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/customer.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    <script src="{{ url('js/customer.js') }}" type="text/javascript" defer></script>

@endsection

@section('title', 'Food Lab')

@section('marquee')
    {{-- Start Marquee --}}
    <marquee class="pt-1">
        @foreach ($news as $new)
            <p class="d-inline mx-5 importantnews" id="{{ $new->category }}">{{ $new->title }}</p>
        @endforeach
    </marquee>
    {{-- End Marquee --}}
@endsection

@section('header')
    {{-- start carousel --}}
    <div id="carouselExampleIndicators" class="carousel slide carousels" data-bs-ride="">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row align-items-center items">
                    <div class="col-6 flex-column">
                        <h1 class="fw-bolder tastes">{{ __('messageMK.TasteOurDeliciousFood') }}</h1>
                        <p class="fw-bold delivery-infos">
                            {{ __('messageMK.We deliver food as fast as you expert and we care about your time, so that you can grab your food at time') }}
                        </p>
                        <a class="btn delivery-btns">{{ __('messageMK.shopnow') }}</a>
                    </div>

                    <div class="col-6 ">
                        <img src="{{ url('img/menu.png') }}" class="carousel-photos" alt="menu1" />
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row align-items-center items">
                    <div class="col-6 flex-column">
                        <h1 class="fw-bolder tastes">{{ __('messageMK.TasteOurDeliciousFood') }}</h1>
                        <p class="fw-bold delivery-infos">
                            {{ __('messageMK.We deliver food as fast as you expert and we care about your time, so that you can grab your food at time') }}
                        </p>
                        <a class="btn delivery-btns">{{ __('messageMK.shopnow') }}</a>
                    </div>
                    <div class="col-6 ">
                        <img src="{{ url('img/menu.png') }}" class="carousel-photos" alt="menu1" />
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row align-items-center items">
                    <div class="col-6 flex-column">
                        <h1 class="fw-bolder tastes">{{ __('messageMK.TasteOurDeliciousFood') }}</h1>
                        <p class="fw-bold delivery-infos">
                            {{ __('messageMK.We deliver food as fast as you expert and we care about your time, so that you can grab your food at time') }}
                        </p>
                        <a class="btn delivery-btns">{{ __('messageMK.shopnow') }}</a>
                    </div>
                    <div class="col-6 ">
                        <img src="{{ url('img/menu.png') }}" class="carousel-photos" alt="menu1" />
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- end carousel --}}
@endsection

@section('section')


    {{-- Start Welcome Section --}}
    <section class="d-flex flex-column justify-content-center align-items-center welcomes">
        <p class="fs-1 fw-bolder welcometexts">{{ __('messageMK.Welcome Our Food Lab') }}</p>
        <p class="fs-4 companyinfos"><i class="fas fa-quote-left falefts"></i>{{ __('messageMK.FoodLabInfo') }}<i
                class="fas fa-quote-right farights"></i></p>
    </section>
    {{-- End Welcome Section --}}

    {{-- Start Best Seller Item Section --}}
    <section class="best-items">
        <fieldset class="d-flex flex-wrap justify-content-around align-items-center border border-3 text-light sellers">
            <legend class="seller-headers">{{ __('messageMK.bestselleritems') }}</legend>

            {{-- start items --}}
            @forelse ($sellProducts as $sellProduct)
                <div class="d-flex flex-column justify-content-center align-items-center fw-bold my-3 py-5"
                    id="{{ $sellProduct->product_id }}">
                    <img src="{{ url('img/bestitem1.png') }}" alt="bestitem1" />
                    <p class="fs-3 pt-2 text-uppercase">{{ $sellProduct->product_name }}</p>
                    <p class="fs-5"><i class="fas fa-coins pe-2 coins"></i> {{ $sellProduct->coin }}</p>
                    <button type="button" class="btn shopbtns">{{ __('messageMK.shopnow') }}</button>
                </div>
            @empty
                <div class="text-center">
                    <p class="fs-2 fw-bolder my-3">No product</p>
                </div>
            @endforelse
            {{-- end items --}}

        </fieldset>
    </section>
    {{-- End Best Seller Item Section --}}

    {{-- Start Recommand Item Section --}}
    @if (session()->has('customerId'))
        <section class="recommand-items">
            <fieldset
                class="d-flex flex-wrap justify-content-around align-items-center border border-3 text-light recommands">
                <legend class="seller-headers">{{ __('messageMK.recommanditems') }}</legend>

                {{-- start items --}}
                <div class="d-flex flex-column justify-content-center align-items-center fw-bold my-3 py-5">
                    <img src="{{ url('img/menu2.png') }}" alt="bestitem1" />
                    <p class="fs-3 pt-2">Item1</p>
                    <p class="fs-5"><i class="fas fa-coins pe-2 coins"></i> 45</p>
                    <button type="button" class="btn shopbtns">{{ __('messageMK.shopnow') }}</button>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center fw-bold my-3  py-5">
                    <img src="{{ url('img/menu2.png') }}" alt="bestitem1" />
                    <p class="fs-3 pt-2">Item1</p>
                    <p class="fs-5"><i class="fas fa-coins pe-2 coins"></i> 45</p>
                    <button type="button" class="btn shopbtns">{{ __('messageMK.shopnow') }}</button>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center fw-bold my-3  py-5">
                    <img src="{{ url('img/menu2.png') }}" alt="bestitem1" />
                    <p class="fs-3 pt-2">Item1</p>
                    <p class="fs-5"><i class="fas fa-coins pe-2 coins"></i> 45</p>
                    <button type="button" class="btn shopbtns">{{ __('messageMK.shopnow') }}</button>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center fw-bold my-3  py-5">
                    <img src="{{ url('img/menu2.png') }}" alt="bestitem1" />
                    <p class="fs-3 pt-2">Item1</p>
                    <p class="fs-5"><i class="fas fa-coins pe-2 coins"></i> 45</p>
                    <button type="button" class="btn shopbtns">{{ __('messageMK.shopnow') }}</button>
                </div>
                {{-- end items --}}

            </fieldset>
        </section>
    @endif
    {{-- End Recommand Item Section --}}

    {{-- Start Delivery Section --}}
    <section class="deliverys">
        <p class="fw-bolder text-center pt-5 pb-3 del-infos">{{ __('messageMK.Delivery Information') }}</p>
        <div class="row">
            {{-- start delivery Informaiton --}}
            <div class="col-12 township-infos">
                <div class="row justify-content-center align-items-center text-center text-white">
                    <p class="col-5 fw-bolder del-headers">{{ __('messageMK.townships') }}</p>
                    <p class="col-2 pt-2"><i class="fas fa-arrow-right"></i></p>
                    <p class="col-5 fw-bolder del-headers">{{ __('messageMK.prices') }}</p>
                </div>
                @foreach ($townships as $township)
                    <div class="row justify-content-center align-items-center text-center text-white">
                        <p class="col-5 townships">{{ $township->township_name }}</p>
                        <p class="col-2 pt-2"><i class="fas fa-arrow-right"></i></p>
                        @if ($township->delivery_price == 0)
                            <p class="col-5"><span class="prices">Free</span></p>
                        @else
                            <p class="col-5"><span class="prices">{{ $township->delivery_price }}</span>
                                Ks</p>
                        @endif
                    </div>
                @endforeach
            </div>
            {{-- end delivery Informaiton --}}
        </div>
    </section>
    {{-- End Delivery Section --}}

    {{-- Start Contact Section --}}
    <section>
        <div class="d-flex flex-row justify-content-center align-items-center contacts">
            <div class="d-flex flex-column justify-content-center align-items-center ms-5">
                <div class="company-infos">
                    <p class="fw-bolder mb-5">{{ __('messageMK.getcontact') }}</p>
                    <div class="company-details">
                        <div class="row">
                            <div class="col-2 text-center">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="col-10">
                                <p> 3rd floor,Myanmar Plazzar, Kabar Aye Pagoda Rd, Yangon</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 text-center">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="col-10">
                                <p><a href="tel:09876543211" class="d-block">09876543211</a><a
                                        href="tel:097788665544" class="d-block">097788665544</a></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 text-center">
                                <p><i class="fas fa-envelope"></i></p>
                            </div>
                            <div class="col-10">
                                <a href="mailto:www.foodlab2022@gmail.com">www.foodlab2022@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d238.61434557816733!2d96.20029431720103!3d16.88432532626319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smm!4v1641994274866!5m2!1sen!2smm"
                    class="maps" width="450" height="450" style="border:0;" allowfullscreen=""
                    loading="lazy"></iframe>
            </div>
        </div>
    </section>
    {{-- End Contact Section --}}

    {{-- Start Footer Section --}}
    <footer>
        <div class="pt-5 ps-3 footer-infos">
            <div class="d-flex align-items-center footer-logos">
                <img src="{{ url('storage/logo/siteLog.png') }}" />
                <p class="fw-bolder footer-names">{{ $name->site_name }}</p>
            </div>
            <div class="d-flex flex-wrap justify-content-around align-items-start mt-5 footer-details">
                <div class="footer-navs">
                    <p><a href="/">{{ __('messageMK.home') }}</a></p>
                    <p><a href="#">{{ __('messageMK.aboutus') }}</a></p>
                    <p><a href="#">{{ __('messageMK.products') }}</a></p>
                    <p><a href="">{{ __('messageMK.buy coin') }}</a></p>
                    <p><a href="#">{{ __('messageMK.inform') }}</a></p>
                    @if (!session()->has('customerId'))
                        <p><a href="/access">{{ __('messageMK.access') }}</a></p>
                    @endif
                </div>
                @if (session()->has('customerId'))
                    <div>
                        <p>{{ __('messageMK.feedback') }}</p>
                        <p><a href="#">{{ __('messageMK.contact') }}</a></p>
                        <p><a href="/suggest">{{ __('messageMK.suggest') }}</a></p>
                        <p><a href="/report">{{ __('messageMK.report') }}</a></p>
                    </div>
                @endif
                <div>
                    <div>
                        <p>{{ __('messageMK.information') }}</p>
                        <p><a href="/policyinfo">{{ __('messageMK.privacy') }}</a></p>
                        <p><a href="#">{{ __('messageMK.deliveryinfo') }}</a></p>
                    </div>
                    <div class="mt-4">
                        <p>{{ __('messageMK.othesite') }}</p>
                        <p class="sitelinks"><a href="#">{{ __('messageMK.sitelink') }}</a></p>
                    </div>
                </div>
                <div>
                    <p>{{ __('messageMK.powerby') }}</p>
                    <p>Team x</p>
                    <p class="mailTeams"><a href="mailto:https://www.teamx.com">https://www.teamx.com</a></p>
                </div>
            </div>
        </div>
        <div class="copys">
            <p></p>
            <p>Copy right by {{ $name->site_name }}</p>
        </div>
    </footer>
    {{-- End Footer Section --}}

@endsection
