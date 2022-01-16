@extends('COMMON.layout.layout_admin')
@section('title','Payment Add')

 @section('css') 
 <link rel="stylesheet" href="{{ URL::asset('css/adminAdd.css') }}"/>
 <link rel="stylesheet" href="{{ URL::asset('css/adminLayout.css') }}"/>
 <link rel="stylesheet" href="{{ URL::asset('css/commonAdmincss.css') }}"/>
 @endsection

@section('script') 
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ URL::asset('js/adminAdd.js') }}"></script>
@endsection
@section('body')
    {{-- Starts Header Buttons --}}
<div class="navBar">
    <a href="{{ url('adminLogin') }}"><button class=" headerButton">{{__('messageZY.loginManage')}}</button></a>
    <a href="{{ url('coinrate') }}"><button  class=" headerButton">{{__('messageZY.coinRate')}}</button></a>
    <a href="{{ url('siteManage') }}"><button  class="checked headerButton">{{__('messageZY.siteManager')}}</button></a>
</div>
    {{-- Starts Form --}}
    <div class="adminAddForm">
        <form action="{{ route('payment.update',$payment->id)}}" method="POST" >  
            @csrf
            @method('PUT')
                <p class="formHeader">{{__('messageZY.editpayment')}} </p>
                <div>
                        <div class="form-group">
                            <label for="paymentname">{{__('messageZY.paymentname')}}</label>
                            <input type="text" class="form-control" id="paymentname" name="payment_name" value="{{ $payment->payment_name }}">
                            @error('payment_name')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="accountname">{{__('messageZY.accountname')}}</label>
                            <input type="number" class="form-control" id="accountname"  name="accountname" value="{{ $payment->account_name }}">
                            @error('accountname')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="note">{{__('messageZY.note')}}</label>
                            <input type="text" class="form-control" id="name"  name="note" value="{{ $payment->note }}">
                            @error('note')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg m-4">{{__('messageZY.save')}}</button>
                        </div>
                </div>
        </form>
    </div>  

@endsection