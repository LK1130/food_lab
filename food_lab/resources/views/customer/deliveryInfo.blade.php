@extends('COMMON.layout.layout_customer_3')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{--  <link href="{{ url('css/commonCustomer.css') }}" rel="stylesheet" type="text/css"/>  --}}
    {{--  <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css"/>  --}}
    <link rel="stylesheet"  href= "css/customerDeliveryInfo.css"/>
@endsection

@section('script')
    <script src="{{ url('js/customer.js') }}" type="text/javascript" defer></script>
    <script src="js/customerDeliveryInfo.js" type="text/javascript" defer></script>
@endsection

@section('title','Deliver Information')

@section('section')
<h1 class="heading">Delivery Information</h1>
<section class="formDisplay">
   <div class="d-flex flex-column justify-content-center align-items-center">
       
       <form action="/suggest" method="post">
           @csrf
           <div class="d-flex formDiv">
               <label class="fw-bold" id="details">Name</label>
               <input type="text" class="controlForm" id="name"></input>
           </div>
           <div class="d-flex formDiv">
               <label class="fw-bold" id="details">Phone</label>
               <input type="text" class="controlForm" id="phone"></input>
           </div>
           <div class="d-flex formDiv1">
               <label class="fw-bold" id="details">Address</label>
               <textarea class="controlForm" id="address"></textarea>
           </div>
           <div class="d-flex formDiv">
               <label class="fw-bold" id="details">Payment</label>
               <div class="radioBtn">
                   <div class="form-check form-check-inline coin">
                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                       <label class="form-check-label" for="inlineRadio1">Coin</label>
                   </div>
                   <div class="form-check form-check-inline cod">
                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                       <label class="form-check-label" for="inlineRadio2">Cash On Delivery</label>
                   </div>
               </div>
           </div>
           <div class="d-flex amount">
               <div class="amountDiv coinAmount"></div>
               <div class="amountDiv codAmount"></div>
           </div>

           <div class="btnStyle">
               <a href="/" type="reset" class="btn me-5 cancels">Cancel</a>
               <button type="submit" class="order">Order</button>
           </div>
       </form>
   </section>
@endsection

