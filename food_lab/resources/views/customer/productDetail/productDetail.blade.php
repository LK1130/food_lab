@extends('COMMON.layout.layout_customer')


@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('css/commonCustomer.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/customerProductDetail.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   
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


        {{-- // need to insert --}}
        <a href="/cart"  class="position-relative d-lg-none me-5 cart1">
            <i class="fas fa-shopping-cart mr-2 fs-2 texts cart"></i> <span
                id="count" class="position-absolute top-0 start-120 translate-middle  badge badge-circle badge-danger leftside"></span>

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
                    <a class="nav-link texts mt-3 cart1" href="/cart" ><i class="fas fa-shopping-cart fs-3"></i></a>
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
                            <img src="@isset($photos[0]->path)/storage/{{ $photos[0]->path }}@endisset" id="mainimg" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="col-md-12 col-sm-12 ms-auto mb-3">
                                <div class="d-flex col-md-12 col-sm-12  mx-auto mb-3 bg-light">
                                    <div class="d-flex justify-content-center col-md-2 col-sm-2 mt-2 mb-2 customBlock">
                                        <img src="@isset($photos[1]->path)/storage/{{ $photos[1]->path }}@endisset" 
                                                class="img-fluid images" onclick="changeImage(this)" >
                                        </div>
                                        <div class="d-flex justify-content-center col-md-2 col-sm-2 mt-2 mb-2 customBlock">
                                            <img src="@isset($photos[2]->path)/storage/{{ $photos[2]->path }}@endisset"
                                                    class="img-fluid  images"  onclick="changeImage(this)" alt="">
                                            </div>
                                            <div class="d-flex justify-content-center col-md-2 col-sm-2 mt-2 mb-2 customBlock">
                                                <img src="@isset($photos[3]->path)/storage/{{ $photos[3]->path }}@endisset"
                                                        class="img-fluid  images" onclick="changeImage(this)" alt="">
                                                </div>
                                                <div class="d-flex justify-content-center col-md-2 col-sm-2 mt-2 mb-2 customBlock ">
                                                    <img src="@isset($photos[4]->path)/storage/{{ $photos[4]->path }}@endisset"
                                                            class="img-fluid  images" onclick="changeImage(this)" alt="">
                                                    </div>
                                                    <div class="d-flex justify-content-center col-md-2 col-sm-2 mt-2 mb-2 mr-2 customBlock">
                                                        <img src="@isset($photos[5]->path)/storage/{{ $photos[5]->path }}@endisset"
                                                                class="img-fluid img-thumbnail images" onclick="changeImage(this)" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-10 ms-auto">
                                            <form action="/cartOne" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-10 col-sm-10 m-auto mt-2">
                                                        <p class="pdname">{{ $productId->product_name }}</p>
                                                        <div class="d-flex justify-content-between">
                                                            <p class="pcoin">Coin -</p>
                                                            <p class="coins">{{ $productId->coin }}</p>
                                                        </div>

                                                        <div class="d-flex justify-content-between">
                                                            <p class="pamount">Amount -</p>
                                                            <p class="amount">{{ $productId->amount }}</p>
                                                        </div>

                                                        <div class="d-flex  justify-content-between">
                                                            <p class="ptype">Type -</p>
                                                            <p class="type">{{ $productId->favourite_food }}</p>
                                                        </div>

                                                        <div class="d-flex justify-content-between">
                                                            <p class="ptaste">Taste -</p>

                                                            <p class="taste">{{ $productId->taste }}</p>
                                                        </div>

                                                        <div class="">
                                                            <p class="pingredients">Ingredients -</p>
                                                            <p class="col-md-10 col-sm-10  mx-4 text-justify  m-auto ingredients">
                                                                {{ $productId->list }}
                                                                {{-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam obcaecati perferendis accusantium vitae magnam, sapiente odit labore modi? Dolore at eius consequatur ducimus corporis nemo, quod distinctio ipsam eaque mollitia! --}}
                                                            </p>
                                                        </div>

                                                        <div class="col-md-10">
                                                            <p class="pdesc">Description -</p>
                                                            {{-- <input type="text" class="form-control border-0 bg-dark text-light" value="{{ $productId->description }}" readonly> --}}
                                                            <p class="col-md-10 col-sm-10 mx-4 mt-2 m-auto text-justify desc ">
                                                                {{ $productId->description }}
                                                                {{-- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure reiciendis voluptates esse reprehenderit corrupti, magnam est molestias aperiam quia unde inventore sunt aliquam dolore id impedit aspernatur quidem voluptatum enim.lorelore Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam minus ratione sapiente exercitationem necessitatibus accusantium distinctio optio. Fugit, aspernatur enim eius labore nobis officiis tenetur necessitatibus ducimus aut corrupti deserunt! --}}
                                                            </p>
                                                        </div>
                                                    </div>


                                                    <div class="d-flex col-md-12 col-sm-10 ">
                                                        <div class="container-fluid col-md-7 col-sm-6 d-flex ms-auto justify-content-between mb-3">
                                                            <div class="d-flex justify-content-center col-md-5 bg-light  rounded mt-3 qty ">
                                                                <span class="minus">-</span>
                                                                <input type="number" class="count" id="qty" name="qty" value="1">
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


                                @php
                                $count = 0;
                                $label = '';
                                $countId = 1;
                            @endphp
                            <div class="container-fluid mt-5">
                                <div class="row">
                                    @for ($i = 0; $i < count($detail); $i++)
                                        @php
                                            $label = $detail[$i]->label;
                                        @endphp
                                        <div class="col-md-3 d-flex ms-auto lab">
                                            <p class="ptopping  ptop">{{ $detail[$i]->label }}</p>
                                        </div>
                                        <div class="col-md-8 col-sm-10  d-flex flex-wrap ">
                                            @foreach ($detail as $item1)
                                                @if ($label == $item1->label && $item1->category == 2)
                                                    <div class="col-md-3 col-sm-2 form-check m-2">
                                                        <input type="checkbox" name="check{{ $countId }}" id="" class="form-check-input "
                                                            value="{{ $item1->value }}">
                                                        <label for="" class="form-check-label labels">{{ $item1->value }}</label>
                                                    </div>
                                                    @php
                                                        $count++;
                                                        $countId++;
                                                    @endphp
                                                @elseif ($item1->label == $label && $item1->category === 1)
                                                    <div class="col-md-3 col-sm-2  m-2">
                                                        <select name="select{{ $countId }}" id="" class="form-select">
                                                            @php
                                                           
                                                            $countId++;
                                                            @endphp
                                                            @foreach ($detail as $item2)
                                                                @if ($item2->label == $label && $item2->category === 1)
                                                                    <option value="{{ $item2->order }}">{{ $item2->value }}</option>
                                                                    @php
                                                                        $count++;
                                                                        
                                                                    @endphp
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @break
                                                @endif
                                            @endforeach
                                        </div>
                                        @php
                                            $i = $count;
                                        @endphp
                                    @endfor
                                </div>
                            </div>

                                {{-- </div>
                            </div> --}}

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-10 col-sm-10 m-auto ">
                                            <p class="ptopping">Anything note</p>
                                        </div>

                                        <div class="col-md-4 col-sm-10 form-outline m-auto ">
                                            <textarea class="form-control" id="note" name="note" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="container-fluid mt-5 p-3">
                                    <div class="d-flex justify-content-center">
                                        <p class="copy">Copy right by Food Lab</p>
                                    </div>
                                </div>
                            </div>

                            <script>
                              
                                let pid = @json($productId->pid);
                                console.log(pid);
                               
                            </script>
                            
                            <script src="{{ url('js/productDetail.js') }}" type="text/javascript" defer></script>
                        @endsection
