@extends('COMMON.layout.layout_cusotmer_2')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{--  <link href="{{ url('css/commonCustomer.css') }}" rel="stylesheet" type="text/css"/>  --}}
    {{--  <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css"/>  --}}
    <link rel="stylesheet"  href= "css/customerDeliveryInfo.css"/>
@endsection

@section('js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/customerDeliveryInfo.js" type="text/javascript" defer></script>
@endsection

@section('title','Deliver Information')

@section('body')
<section>
    <p class="fs-1 text-white fw-bold text-center pt-4"><img src="{{ url('storage/logo/siteLog.png') }}" alt="Logo">{{ __('messageCPPK.Food Lab') }}</p>
    <h1 class="fw-bold ms-4 my-4 heading">{{ __('messageCPPK.Delivery Information') }}</h1>
    <div class="d-flex flex-column justify-content-center align-items-center">
        <form action="/insertOrder" class="py-3 formDisplay" method="post">
            @csrf
            <div class="d-flex mb-4 forms">
                <div class="text-center labels">
                    <label class="fw-bold" id="details">{{ __('messageCPPK.Name') }}</label>
                </div>
                <div class="inputs">
                    <input type="text" name='username' class="controlForm" value="{{$deliInfo->nickname }}" disabled/>
                </div>
            </div>
            <div class="d-flex mb-4 forms">
                <div class="text-center labels">
                    <label class="fw-bold"id="details">{{ __('messageCPPK.Phone') }}</label>
                </div>
                <div class="inputs">
                    <input type="text" name="phone" class="controlForm phone" value="{{$deliInfo->phone }}"/>
                </div>
            </div>
            <div class="d-flex mb-4 forms">
                <div class="text-center labels">
                    <label class="fw-bold" id="details">{{ __('messageCPPK.Address') }}</label>
                </div>
                <div class="inputs">
                    <textarea class="controlForm" disabled>{{ $deliInfo->address3}} , {{ $deliInfo->township_name }} , {{ $deliInfo->state_name }}</textarea>
                    
                    <p class="fs-6 text-start text-danger">click this button to change name and address.  
                        <a href="/" class="btn btn-warning btn-sm"> User Profile</a></a>
                    </p>
   
                </div>
            </div>
            <div class="d-flex mb-4 forms">
                <div class="text-center labels">
                    <label class="fw-bold" id="details">{{ __('messageCPPK.Payment') }}</label>
                </div>
                <div class="d-flex justify-content-around align-items-center inputs">
                    <div>
                        <input type="radio" id="coin" class="me-3 vouncher" name="money" value="0" checked/> 
                        <label for="coin" class="text-white moneys cursor">{{ __('messageCPPK.Coin') }}</label>
                    </div>
                    <div>
                        <input type="radio" id="cash" class="me-3 vouncher" name="money" value="1"/> 
                        <label for="cash" class="text-white moneys cursor">{{ __('messageCPPK.Cash') }}</label>
                    </div>
                </div>
            </div>
            <div class="d-flex mb-4 forms">
                <div class="text-center labels">
                </div>
                <div class="d-flex justify-content-center align-items-center inputs">
                    <div class="text-center amount coin">
                        <p class="moneys">{{ $grandCoin }}</p>
                    </div>
                    <div class="text-center amount cash hide">
                        <p class="moneys">{{ $grandCash }} Ks</p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center forms">
                <div>
                    <a href="/cart" type="reset" class="btn me-5 cancels">{{ __('messageCPPK.Back') }}</a>
                    <button type="submit" class="order">{{ __('messageCPPK.Order') }}</button>
                </div>
            </div>
        </form>
              {{-- start modal --}}
      <div id="modal" class="modal fade"  data-bs-backdrop="static" data-bs-keyboard="false"
      tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="col-sm-4 modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
              {{-- <div class="modal-header"> --}}
                
              <div class="d-flex justify-content-end ">
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
              </div>
              {{-- </div> --}}
              {{-- <div class="modal-body"> --}}
                <p class="mx-4"> <span><i class="fas fa-check-circle text-success mx-2"></i></span>Your order has successfully completed!</p>
              {{-- </div> --}}
              <div class="modal-footer">
               <a href="/"> <button type="button" class="btn btnCart" >OK</button></a>
              </div>
            </div>
          </div>
        </div>
{{-- end modal --}}
        
    </div>
   </section>
@endsection

