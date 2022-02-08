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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ url('js/productChange.js') }}" type="text/javascript" defer></script>
@endsection

@section('title', 'Food Lab')

@section('header')

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
