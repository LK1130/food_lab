@extends('COMMON.layout.layout_cusotmer_2')

@section('css')
    <link href="css/commonCustomer.css" rel="stylesheet" type="text/css"/>
    {{--  join link to customerCart.css  --}}
    <link href="css/customerCart.css" rel="stylesheet" type="text/css"/>
    {{--  coin icon cdn  --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

@endsection

@section('js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{--  jquery cdn  --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    {{--  coin icon cdn  --}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" ></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" ></script>
    {{--  join link to customerCart.js  --}}
    <script src="js/customerCart.js" type="text/javascript" defer></script>
@endsection

@section('title','Cart')

@section('body')
    {{--  Start Cart Session  --}}
    <section class="cart-section">
        <div class="cartTitle">
            <p class="pt-3 ms-3 fs-1 fw-bolder">{{ __('messageCPPK.yourCart') }}</p>
            <div class="row text-uppercase text-center">
                <div class="col-1"></div>
                <div class="col-5 my-auto">
                    <p id="productTitle">{{ __('messageCPPK.Product') }}</p>
                </div>
                <div class="col-3 my-auto">
                    <p id="qtyTitle">{{ __('messageCPPK.Quantity') }}</p>
                </div>
                <div class="col-3">
                    <div class="button-box">
                        <div id="btnSwitch"></div>
                        <button type="button" class="toggle-btn" onclick="leftClick()" >{{ __('messageCPPK.Coin') }}</button>
                        <button type="button" class="toggle-btn" onclick="rightClick()">{{ __('messageCPPK.Cash') }}</button>
                    </div>
                </div>
            </div>

            {{-- Start Added Buy Products  --}}
            @php
                $i = 1;
            @endphp
            @forelse ($products as $product)
                <div class="row justify-content-center align-items-center mt-3 products">
                    <div class="col-1 text-center">
                        <ion-icon name="close-sharp" class="fs-1 delete" id="{{ $i++ }}"></ion-icon>
                    </div>
                    <div class="col-3" style="width: 280px">
                        <img src="/storage/{{ $product['path'] }}" alt = "" style="width: 100%"/>
                    </div>
                    <div class="col-2">
                        <p class="fw-bold text-uppercase" id="pname">{{ $product['product_name'] }}</p>
                        <p class="fw-bold" id="code">#{{ $product['id'] }}</p>
                    </div>
                    <div class="col-3 text-center">
                        <div class="mx-auto wrapper">
                            <span class="minus">-</span>
                            <span class="num">{{ $product['quantity'] }}</span>
                            <span class="plus">+</span>
                        </div>
                    </div>
                    <div class="col-3 text-center">
                        @php
                            $totalCoin = $product['quantity'] * $product['coin'];
                            $totalCash = $product['quantity'] * $product['amount'];
                        @endphp
                        <span class="coinBox"><i class="fas fa-coins fa-1x me-2"></i><span class="coin">{{ $totalCoin }}</span></span>
                        <span class="cashBox"><span class="cash">{{ $totalCash }}</span> Ks</span>
                    </div>
                </div>
            @empty
                <div class="fs-1 fw-bolder my-3 products no-datas">
                    <p class="text-white text-center">Plesae Buy First item . <a href="/productLists" class="btn">Buy now</a></p>
                </div>
            @endforelse
            {{-- End Added Buy Products  --}}
        </div>
        <div class="row my-4 bouchers">
            <div class="col-lg-6 d-flex align-items-center justify-content-center cart-icons">
                <img src="img/shopCart.png" alt="" style="width: 40%">
            </div>
            <div class="col-lg-6 col-md-12 text-center">
                <div class="row mb-2">
                    <div class="col-6">
                        <p id="amounttitle">{{ __('messageCPPK.originalTotal') }}</p>
                    </div>
                    <div class="col-6">
                        <p class="coinDiv" id="coinSubTotal"><i class="fas fa-coins fa-1x me-2" id="coinIcon"></i><span class="totalCoin"></span></p>
                        <p class="cashBox"><span class="totalCash"></span> Ks</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <p class="deliverytitle">{{ __('messageCPPK.DeliveryFee') }}</p>
                    </div>
                    <div class="col-6">
                        <p class="coinDiv" id="coinDeliPrice"><i class="fas fa-coins fa-1x me-2" id="coinIcon"></i><span class="delCoin">{{ $delCoin }}</span></p>
                        <p class="cashBox"><span class="delCash">{{ $delCash }}</span> Ks</p>
                    </div>
                </div>
                <div class="row mb-2 totals">
                    <div class="col-6">
                        <p class="grandtitle">{{ __('messageCPPK.GrandTotal') }}</p>
                    </div>
                    <div class="col-6">
                        <p class="coinDiv" id="coinTotalPrice"><i class="fas fa-coins fa-1x me-2" id="coinIcon"></i><span class="grandCoin"></span></p>
                        <p class="cashBox"><span class="grandCash"></span> Ks</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="/productLists" class="btn me-3 cancels">{{ __('messageCPPK.Back') }}</a>
                    <p class="btn order" id="order">{{ __('messageCPPK.Delivery') }}</a>
                </div>
            </div>
        </div>
    </section>
    {{--  End Cart Session   --}}
@endsection
