@extends('COMMON.layout.layout_admin')
@section('title','Coin Rate Change')

 @section('css') 
 <link rel="stylesheet" href="{{ URL::asset('css/coinRate.css') }}"/>
 <link rel="stylesheet" href="{{ URL::asset('css/adminLayout.css') }}"/>
 <link rel="stylesheet" href="{{ URL::asset('css/commonAdmincss.css') }}"/>
 @endsection

@section('script') 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ URL::asset('js/adminAdd.js') }}"></script>
@endsection
@section('body')
    {{-- Starts Header Buttons --}}
<div class="navBar">
    <a href="{{ url('adminLogin') }}"><button class=" headerButton">{{__('messageZY.loginManage')}}</button></a>
    <a href="{{ url('coinrate') }}"><button  class="checked headerButton">{{__('messageZY.coinRate')}}</button></a>
    <a href="{{ url('siteManage') }}"><button  class=" headerButton">{{__('messageZY.siteManager')}}</button></a>
</div>
    {{-- Starts Form --}}
    <a href="{{ url('coinrate') }}"><button class="change" id="back">{{__('messageZY.back')}}</button></a>
    <form action="{{route('coinrate.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <fieldset class="border p-2">
        <legend>{{__('messageZY.changecoinrate')}}</legend>
        <div class="rowInput">
            <label for="coin">{{__('messageZY.coin')}}</label>
            <div class="input-group mb-3">
                <input type="text" id="coin" value="1" disabled>
                <img src="{{ url('img/dogeCoin.png') }}" class="input-group-text coinImg" id="basic-addon2">
            </div>
        </div>
        <div class="rowInput">
            <label for="kyat">{{__('messageZY.kyat')}}</label>
            <div class="input-group mb-3">
                <input type="number" id="kyat" name="kyat">
                @error('kyat')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
            </div>
        </div>
        <div class="rowInput">
            <label for="note">{{__('messageZY.note')}}</label>
            <div class="input-group mb-3">
                <input type="text" id="note" name="note">
                @error('note')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
            </div>
        </div>
        <button type="submit" class="change">{{__('messageZY.change')}}</button>
        <input type="reset" value="{{__('messageZY.reset')}}" class="reset">
        
    </fieldset>
</form>

@endsection