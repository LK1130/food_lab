@extends('COMMON.layout.layout_cusotmer_2')

@section('css')
    <link href="css/commonCustomer.css" rel="stylesheet" type="text/css"/>
    {{--  join link to customerCart.css  --}}
    <link href="css/customerCart.css" rel="stylesheet" type="text/css"/>
    {{--  coin icon cdn  --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{--  jquery cdn  --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    {{--  coin icon cdn  --}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" ></script> 
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" ></script> 
    {{--  join link to customerCart.js  --}}
    <script src="js/customerCart.js" type="text/javascript"></script>
@endsection

@section('title','Cart')

@section('body')
    {{-- Start Cart Section --}}
    {{--  <h3 class="cartTitle">{{ __('messageCPPK.yourCart') }}</h3>  --}}
    {{--  <div class="cart">  --}}
        {{--  Item Title  --}}
        {{--  <div class="itemTitle">
            <span id="productTitle">{{ __('messageCPPK.Product') }}</span>
            <span id="qtyTitle">{{ __('messageCPPK.Quantity') }}</span>
            <div class="form-box ">
                <div class="button-box ">
                    <div id="btnSwitch"></div>
                        <button type="button" class="toggle-btn" onclick="leftClick()" >{{ __('messageCPPK.Coin') }}</button>
                        <button type="button" class="toggle-btn" onclick="rightClick()">{{ __('messageCPPK.Cash') }}</button>
                </div>
            </div>
        </div>  --}}
        
          {{--  Added Buy Products  --}}
        {{--  <div class="calculateitem">
           
            <div class="item"> 
                <div><ion-icon name="close-sharp" class="iconSize"></ion-icon></div>
                <div class="imgBox">
                    <img src="img/menu.png"alt = "" class="imgSize"/>
                </div>
                <div class= "itemdetail">   
                    <p id= "pname">Hotpot</p>
                    <p id= "code">#33445</p>
                </div>
                <div class="quantityDiv">
                    <div class="wrapper">
                        <span class="minus">-</span>
                        <span class="num">1</span>
                        <span class="plus">+</span>
                    </div>
                </div>
                <div class="amountDiv"> 
                    <span  class= "coinBox" id="itemCoinPrice"><i class="fas fa-coins fa-1x" id="coinIcon"></i>   30</span>
                    <span  class= "cashBox" id="itemPrice">34000 Ks</span>
                </div>
            </div>
        </div>
        <br></br>  --}}
         {{--  Calculate Total Price  --}}
        {{--  <div class="secDiv">
            <img src="img/shopCart.png" alt="" class="imgDiv">
            <div class="totalDiv">
                
                <div class="amountDiv1"> 
                    <span id="amounttitle">{{ __('messageCPPK.originalTotal') }}</span>
                    <span  class= "coinDiv" id="coinSubTotal"><i class="fas fa-coins fa-1x" id="coinIcon"></i>   30</span>
                    <span  class= "cashDiv" id="subTotal">34000 Ks</span>
                </div>
                <div class="amountDiv1">
                    <span  class="deliverytitle">{{ __('messageCPPK.DeliveryFee') }}</span>
                    <span class="coinDiv" id="coinDeliPrice"><i class="fas fa-coins fa-1x" id="coinIcon"></i></span>
                    <span class="cashDiv" id="deliPrice">2000Ks</span>
                </div>
                <div class="amountDiv1">
                    <div class="grandtitle">{{ __('messageCPPK.GrandTotal') }}</div>
                    <div class="coinDiv" id="coinTotalPrice"><i class="fas fa-coins fa-1x" id="coinIcon"></i></div>
                    <div class="cashDiv" id="totalPrice">36000Ks</div>
                </div> 
            </div>
        </div>  --}}
    {{--  Delivery Click Btn  --}}
        {{--  <div class="btnStyle">
            <a href="/" type="reset" class="btn me-5 cancels">{{ __('messageCPPK.Back') }}</a>
            <button type="submit" class="btn me-5 order">{{ __('messageCPPK.Delivery') }}</button>
        </div>
    </div>
    <br></br>  --}}
    {{--  Copyright  --}}
    {{--  <div class="d-flex justify-content-center align-items-center copys">
        <p>{{ __('messageCPPK.Copyright') }}</p>
    </div>  --}}

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
            <div class="row justify-content-center align-items-center mt-3 products">
                <div class="col-1 text-center">
                    <ion-icon name="close-sharp" class="fs-2"></ion-icon>
                </div>
                <div class="col-3">
                    <img src="img/menu.png" alt = "" style="width: 80%"/>
                </div>
                <div class="col-2">
                    <p class="fw-bold" id="pname">Hotpot</p>
                    <p class="fw-bold" id="code">#33445</p>
                </div>
                <div class="col-3 text-center">
                    <div class="mx-auto wrapper">
                        <span class="minus">-</span>
                        <span class="num">1</span>
                        <span class="plus">+</span>
                    </div>
                </div>
                <div class="col-3 text-center">
                    <span class="coinBox"><i class="fas fa-coins fa-1x me-2"></i>30</span>
                    <span class="cashBox">34000 Ks</span>
                </div>
            </div>
            
            <div class="row justify-content-center align-items-center mt-3 products">
                <div class="col-1 text-center">
                    <ion-icon name="close-sharp" class="fs-2"></ion-icon>
                </div>
                <div class="col-3">
                    <img src="img/menu.png" alt = "" style="width: 80%"/>
                </div>
                <div class="col-2">
                    <p class="fw-bold" id="pname">Hotpot</p>
                    <p class="fw-bold" id="code">#33445</p>
                </div>
                <div class="col-3 text-center">
                    <div class="mx-auto wrapper">
                        <span class="minus">-</span>
                        <span class="num">1</span>
                        <span class="plus">+</span>
                    </div>
                </div>
                <div class="col-3 text-center">
                    <span class="coinBox"><i class="fas fa-coins fa-1x me-2"></i>30</span>
                    <span class="cashBox">34000 Ks</span>
                </div>
            </div>
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
                        <p class="coinDiv" id="coinSubTotal"><i class="fas fa-coins fa-1x" id="coinIcon"></i>30</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <p class="deliverytitle">{{ __('messageCPPK.DeliveryFee') }}</p>
                    </div>
                    <div class="col-6">
                        <p class="coinDiv" id="coinDeliPrice"><i class="fas fa-coins fa-1x" id="coinIcon"></i>10</p>
                    </div>
                </div>
                <div class="row mb-2 totals">
                    <div class="col-6">
                        <p class="grandtitle">{{ __('messageCPPK.GrandTotal') }}</p>
                    </div>
                    <div class="col-6">
                        <p class="coinDiv" id="coinTotalPrice"><i class="fas fa-coins fa-1x" id="coinIcon"></i>40</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="/" class="btn me-3 cancels">{{ __('messageCPPK.Back') }}</a>
                    <a href="/deliveryInfo" class="btn order">{{ __('messageCPPK.Delivery') }}</a>
                </div>
            </div>
        </div>
        {{--  <div class="d-flex justify-content-center align-items-center copys">
            <p>{{ __('messageCPPK.Copyright') }}</p>
        </div>  --}}
    </section>
    {{--  End Cart Session   --}}
@endsection
