@extends('COMMON.layout.layout_customer')

@section('title')
    Product Menu
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ url('css/customerProduct.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('css/commonCustomer.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ url('js/productChange.js') }}" type="text/javascript" defer></script>
@endsection

@section('title', 'Food Lab')

@section('marquee')
    {{-- Start Marquee --}}
    <marquee class="pt-1">
        {{-- @foreach ($news as $new) --}}
        {{-- <p class="d-inline mx-5 news" id="{{ $new->category }}">{{  $new->title }}</p> --}}
        {{-- <p class="d-inline mx-5 news">Hello</p> --}}
        {{-- @endforeach --}}
    </marquee>
    {{-- End Marquee --}}
@endsection

@section('header')
    {{-- start navbar --}}
    <nav class="navbar navbar-expand-lg container-fluid py-3">

        <a href="/" class="navbar-brand d-lg-none">
            {{-- <img src="{{ url('storage/logo/siteLog.png') }}"  class="pe-2"/> --}}

            <img src=" {{ url('img/logo.png') }}" class="pe-2" />
            <span class="comapanynames">{{ $name->site_name }}</span>

        </a>

        <a href="/" class="position-relative d-lg-none me-5">
            <i class="fas fa-shopping-cart mr-2 fs-2 texts cart"></i> <span
                class="position-absolute top-0 start-120 translate-middle  badge badge-circle badge-danger leftside">2</span>

        </a>
        <button class="navbar-toggler nav-buttons" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <div class="bg-light line1"></div>
            <div class="bg-light line2"></div>
            <div class="bg-light line3"></div>
        </button>

        <div class="collapse navbar-collapse text-uppercase fw-bolder" id="navbarNav">
            <ul class="navbar-nav w-100 justify-content-around align-items-center border-0 rounded py-3 navs">
                <li class="nav-item">
                    <a class="nav-link texts actives" href="#">{{ __('messageMK.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link texts" href="#">{{ __('messageMK.products') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link texts" href="#">{{ __('messageMK.buy coin') }}</a>
                </li>
                <li class="nav-item companys">
                    <a href="/" class="navbar-brand d-lg-inline">
                        {{-- <img src="{{ url('storage/logo/siteLog.png') }}"  class="pe-2"/> --}}

                        <img src=" {{ url('img/logo.png') }}" class="pe-2" />
                        <span class="comapanynames">{{ $name->site_name }}</span>
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
    {{-- end navbar --}}

    {{-- proudct section --}}
    <section>
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <p class="products">Products</p>
            </div>

        </div>

        <div class="container-fluid p-3">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <select class="selectpicker p-3 mx-4 m-5 "  data-size="7" name="type" id="selectpicker1">
                        <option class="selectpicker1" value="" selected disabled>Lists By Category</option>
                        @foreach ($mFav as $item)
                            <option  value="{{ $item->id }}" class="special">{{ $item->favourite_food }}</option>
                        @endforeach
                        {{-- <option class="special">Mustard</option>
                        <option class="special">Ketchup</option>
                        <option class="special">Relish</option> --}}
                    </select>
                </div>
            </div>
        </div>

        <div id="byCategory" class="col-md-12 col-sm-12 d-flex flex-wrap m-auto border border-3 text-light productbox">
            @foreach( $products as $item)
                
            {{-- <div class="col-md-3 col-sm-3 d-flex flex-column justify-content-center align-items-center m-auto my-3 fw-bold py-5">
                <img src="/storage/{{ $item->path }}" class="img-fluid images" alt="bestitem1" />
                <p class="fs-3 pt-2">{{ $item->product_name }}</p>
                <p class="fs-5"><i class="fas fa-coins pe-2 coins"></i>{{ $item->coin }}</p>
                <a href="productDetail?id={{ $item->link_id }}"><button type="button" class="btn detailbtns"> More Details</button></a>
                <a href=""><button type="button" class="btn shopbtns">{{ __('messageMK.shopnow') }}</button></a>
            </div> --}}


            @endforeach
        </div>


        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <select class="selectpicker p-3 mx-4 m-5" data-size="7" id="selectpicker2">
                        <option class="" value="" selected disabled>Lists By Taste</option>
                        @foreach ($mTaste as $item)
                        <option  value="{{ $item->id }}" class="special">{{ $item->taste }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div  class="col-md-12 col-sm-12 d-flex flex-wrap m-auto border border-3 text-light productbox">
            
            @foreach( $products as $item)
                
            <div class="col-md-3 col-sm-3 d-flex flex-column justify-content-center align-items-center m-auto my-3 fw-bold py-5">
                <img src="/storage/{{ $item->path }}" class="img-fluid images" alt="bestitem1" />
                <p class="fs-3 pt-2">{{ $item->product_name }}</p>
                <p class="fs-5"><i class="fas fa-coins pe-2 coins"></i>{{ $item->coin }}</p>
                <a href="productDetail?id={{ $item->link_id }}"><button type="button" class="btn detailbtns"> More Details</button></a>
                <a href=""><button type="button" class="btn shopbtns">{{ __('messageMK.shopnow') }}</button></a>
            </div>


            @endforeach
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-3 mx-2 mt-4 mb-4  text-center">
                    <p class=" recommends">Recommend items</p>
                
            </div>
        </div>

        <div class="col-md-12 col-sm-12 d-flex flex-wrap m-auto border border-3 text-light productbox">
            
            @foreach( $products as $item)
                
            <div class="col-md-3 col-sm-3 d-flex flex-column justify-content-center align-items-center m-auto my-3 fw-bold py-5">
                <img src="/storage/{{ $item->path }}" class="img-fluid images" alt="bestitem1" />
                <p class="fs-3 pt-2">{{ $item->product_name }}</p>
                <p class="fs-5"><i class="fas fa-coins pe-2 coins"></i>{{ $item->coin }}</p>
                <a href="productDetail?id={{ $item->link_id }}"><button type="button" class="btn detailbtns"> More Details</button></a>
                <a href=""><button type="button" class="btn shopbtns">{{ __('messageMK.shopnow') }}</button></a>
            </div>


            @endforeach
            

        </div>

        
    </div>

    <div class="container-fluid mt-5 p-3">
        <div class="d-flex justify-content-center">
            <p class="copy">Copy right by Food Lab</p>
        </div>
    </div>
    </section>
@endsection
