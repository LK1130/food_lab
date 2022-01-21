@extends('COMMON.layout.layout_customer_3')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('css/commonCustomer.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title','Cart')

@section('header')
    {{-- Start Cart Section --}}
    <div class="cart-details">
        <div class="d-flex justify-content-around align-items-center ">
            <i class="fas fa-arrow-left back"></i>
            <p>Shopping Cart</p>
            <i class="fas fa-shopping-cart"></i>
        </div>

        <!--start cart -->
        <div class="cart-container ">
        </div>
        <!--end cart -->

        <p class="warntext">Please first buy an item.</p>
        <div class="mt-2 delivery">
            <p>Delivery fee, taxes, and discounts will be calculated at checkout.</p>
        </div>
        <div class="text-right proceed">
            <a class="delivery" href="deliveryInfo">Delivery</a>
        </div>

    </div>
@endsection
