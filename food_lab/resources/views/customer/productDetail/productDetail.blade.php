@extends('COMMON.layout.layout_customer')


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('css/commonCustomer.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/customerProductDetail.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ url('js/productDetail.js') }}" type="text/javascript" defer></script>
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
            <i class="fas fa-shopping-cart mr-2 fs-2 texts cart"></i> <span class="position-absolute top-0 start-120 translate-middle  badge badge-circle badge-danger leftside">2</span>
        
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

    <div class="container-fluid">
        <div class="d-flex mt-2">
            <a href="/">
               <i class="fas fa-arrow-left fs-2 text-white arrows"></i>
            </a>
            <div class="mx-5 details">Item Details</div>
        </div>

        <div class="container mt-3">
            <div class="row">
                <div class="col-md-6 col-sm-10 m-auto">
                    <div class="row">
                        <div class="col-sm-10 m-auto">
                            <img src="{{ url('img/mohingar.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-12 col-sm-12 ms-auto mb-3">
                            <div class="d-flex col-md-12 col-sm-12  mx-auto mb-3 bg-light">
                                <div class="d-flex justify-content-center col-md-2 col-sm-2 mt-2 mb-2 customBlock">
                                    <img src="{{ url('img/mohingar.png') }}" class="img-fluid images" alt="">
                                </div>
                                <div class="d-flex justify-content-center col-md-2 col-sm-2 mt-2 mb-2 customBlock">
                                    <img src="{{ url('img/mohingar.png') }}" class="img-fluid  images" alt="">
                                </div>
                                <div class="d-flex justify-content-center col-md-2 col-sm-2 mt-2 mb-2 customBlock">
                                    <img src="{{ url('img/menu4.png') }}" class="img-fluid  images" alt="">
                                </div>
                                <div class="d-flex justify-content-center col-md-2 col-sm-2 mt-2 mb-2 customBlock ">
                                    <img src="{{ url('img/menu5.png') }}" class="img-fluid  images" alt="">
                                </div>
                                <div class="d-flex justify-content-center col-md-2 col-sm-2 mt-2 mb-2 mr-2 customBlock">
                                    <img src="{{ url('img/mohingar.png') }}" class="img-fluid img-thumbnail images"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-10 ms-auto">
                    <form action="">
                        <div class="row">
                            <div class="col-md-10 col-sm-10 m-auto mt-2">
                                <p class="pdname">Mote Hin gar</p>
                                <div class="d-flex justify-content-between">
                                    <p class="pcoin">Coin -</p>
                                    <p class="coins">20</p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p class="pamount">Amount -</p>
                                    <p class="amount">3000 Ks</p>
                                </div>

                                <div class="d-flex  justify-content-between">
                                    <p class="ptype">Type  -</p>
                                    <p class="type">Myanmar Food</p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <p class="ptaste">Taste -</p>

                                    <p class="taste">Spicy</p>
                                </div>

                                <div class="">
                                    <p class="pingredients">Ingredients -</p>
                                    <p class="col-md-10 col-sm-10  mx-5 text-justify  m-auto ingredients">Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Quisquam culpa temporibus ab aliquid nihil ullam
                                        soluta, laudantium porro esse libero repellendus a eligendi aut nisi sit aperiam
                                        adipisci mollitia voluptate! lore
                                    </p>
                                </div>

                                <div class="">
                                    <p class="pdesc">Description -</p>

                                    <p class="col-md-10 col-sm-10 mx-5 mt-2 m-auto text-justify desc ">Lorem ipsum, dolor sit amet consectetur
                                        adipisicing elit. Facere nam doloremque ea minus facilis minima fuga, enim at
                                        nostrum sit voluptate quaerat ex officiis temporibus praesentium assumenda sed quas
                                        hic! Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita odit mollitia
                                        optio modi odio magni earum harum quasi ad aliquid. Magnam iure ducimus sequi
                                        asperiores provident nostrum. Dolorum, obcaecati sed?</p>
                                </div>
                            </div>

                    
                            <div class="d-flex col-md-12 col-sm-10 ">
                               <div class="container-fluid col-md-7 col-sm-6 d-flex ms-auto justify-content-between mb-3">
                                <div class="d-flex justify-content-center col-md-5 bg-light  rounded mt-3 qty ">
                                    <span class="minus">-</span>
                                    <input type="number" class="count" name="qty" value="1">
                                    <span class="plus">+</span>
                                </div>
                                <div class="d-flex justify-content-end col-md-6 col-sm-6 mt-3  ">
                                    <button class="btn btns">Buy Now</button>
                                </div>
                               </div>
                               

                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="container-fluid mt-5">
            <div class="row">                 
                    <div class="col-md-3 d-flex ms-auto">
                        <p class="ptopping">Topping  -</p>
                    </div>
                    <div class="col-md-8 col-sm-10  d-flex flex-wrap ">
                        <div class="col-md-3 col-sm-2 form-check m-2">
                         <input type="checkbox" name="" id="" class="form-check-input ">
                        <label for="" class="form-check-label labels">Bayar Kyaw</label>
                        </div>
                        <div class="col-md-3 col-sm-2 form-check m-2">
                            <input type="checkbox" name="" id="" class="form-check-input">
                           <label for="" class="form-check-label labels">Bayar Kyaw</label>
                           </div>
                        
                           {{-- <div class="col-md-3 col-sm-2 form-check mt-2 mb-2">
                            <input type="checkbox" name="" id="" class="form-check-input ">
                           <label for="" class="form-check-label labels">Bayar Kyaw</label>
                           </div>

                           <div class="col-md-3 col-sm-2 form-check mt-2 mb-2">
                            <input type="checkbox" name="" id="" class="form-check-input ">
                           <label for="" class="form-check-label labels">Bayar Kyaw</label>
                           </div>

                           <div class="col-md-3 col-sm-2  form-check mt-2 mb-2">
                            <input type="checkbox" name="" id="" class="form-check-input ">
                           <label for="" class="form-check-label labels">Bayar Kyaw</label>
                           </div> --}}
                         
                    </div>


                    <div class="col-md-3 d-flex ms-auto">
                        <p class="ptopping">Other Category  -</p>
                    </div>
                    <div class="col-md-8 col-sm-10  d-flex flex-wrap">
                        <div class="col-md-3 col-sm-2  m-2">
                            <select name="" id="" class="form-select">
                                <option value="">Spicy</option>
                                <option value="">Sweet</option>
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-2  m-2">
                            <select name="" id="" class="form-select">
                                <option value="">Spicy</option>
                                <option value="">Sweet</option>
                            </select>
                        </div>
                        
                    </div>
                   
             
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-sm-10 m-auto ">
                    <p class="ptopping">Anything note</p>
                </div>

                <div class="col-md-4 col-sm-10 form-outline m-auto ">
                        <textarea class="form-control" id="note" name="note"rows="5"></textarea>  
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5 p-3">
            <div class="d-flex justify-content-center">
                <p class="copy">Copy right by Food Lab</p>
            </div>
        </div>
    </div>

@endsection
