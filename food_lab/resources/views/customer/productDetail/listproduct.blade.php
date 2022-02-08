@extends('COMMON.layout.layout_customer')

@section('title')
    Product Menu
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--  <link href="{{ url('css/customerProduct.css') }}" rel="stylesheet" type="text/css" />  --}}
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
   
    {{--  <script src="{{ url('js/productChange.js') }}" type="text/javascript" defer></script>  --}}
@endsection

@section('title', 'Food Lab')

@section('header')

    <div class="container-fluid">
           <div class="row">
               <div class="col-md-10 col-sm-10  m-auto ">
                <div class="bgproduct">
                <div class="headerproduct p-3">Products</div>
                <div class="row">
                   @forelse ($products as $item)
                       
                   <div class="col-md-10 col-sm-8 m-auto">
                    <div class="d-flex justify-content-between p-1 mb-3 productblog">
                       <div class="img-container">
                        <img src="/storage/{{ $item->path }}" class="img-fluid" alt="">
                       </div>
                       <div class="d-flex flex-column p-4">
                           <p class="productName">{{ $item->product_name }}</p>
                           <p class="productCategory mt-2">({{ $item->favourite_food }})</p>
                       </div>
                       <div class="d-flex flex-column p-4 ">
                           <p class="productTaste">{{ $item->taste }}</p>
                           <p class="productCoin mt-2">{{ $item->coin }} Coin</p>
                       </div>
                       <div class="d-flex  flex-column mt-3 mr-3">
                          <a href="productDetail?id={{ $item->link_id }}"><button type="button" class="btn detailbtns">More Details</button></a> 
                          <a href=""> <button type="button " class="btn shopbtns">Shop Now</button></a> 
                       </div>
                    </div>
                    
                </div>
                   @empty
                       <div class="d-flex justify-content-between p-1 mb-3 productblog">
                            <p class="productName">There is no Product</p>
                       </div>
                   @endforelse
                    
                </div>
                </div>

                
               </div>
           </div>

    </div>


    
    <div class="d-flex justify-content-end  ">
        <a href="productLists"><button class="btn  p-3 m-5 backbtnss">{{ __('messageZY.back') }}</button></a>
    </div>


@endsection