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
                    <select class="selectpicker p-3 mx-3 m-5 "  data-size="7" name="type" id="selectpicker1">
                        <option class="selectpicker1" value="" selected disabled>Lists By Category</option>
                        @foreach ($mFav as $item)
                            <option  value="{{ $item->id }}" class="special">{{ $item->favourite_food }}</option>
                        @endforeach
                       
                    </select>
                </div>
            </div>

            <div class="col-sm-3 ms-auto my-auto btnappend">
               <a href=""> <button type="button" class="btn typebtns">See All</button></a>
            </div>
        </div>

       <div id="byCategory" class="col-md-12 col-sm-12 d-flex flex-wrap m-auto border border-3 text-light productbox">
            @foreach( $products as $item)
                
            <div class="col-md-3 col-sm-3 d-flex flex-column justify-content-center align-items-center m-auto my-3 fw-bold py-5">
               
                <img src=" @isset($item->path)/storage/{{ $item->path }}@endisset" class="img-fluid images" alt="bestitem1" />
               
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
                    <select class="selectpicker p-3 mx-3 m-5" data-size="7" id="selectpicker2">
                        <option class="" value="" selected disabled>Lists By Taste</option>
                        @foreach ($mTaste as $item)
                        <option  value="{{ $item->id }}" class="special">{{ $item->taste }}</option>
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-3 ms-auto my-auto btnappend">
                <a href=""> <button type="button" class="btn tastebtns">See All</button></a>
             </div>
        </div>

        <div id="byTaste" class="col-md-12 col-sm-12 d-flex flex-wrap m-auto border border-3 text-light productbox">
            
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
            <div class="col-md-3 col-sm-3   mt-4 mb-4  text-center">
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
