@extends('COMMON.layout.layout_admin')
@section('title','Coin List')

 @section('css') 
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
 <link rel="stylesheet" href="{{ URL::asset('css/adminCoin.css') }}"/>
 @endsection

@section('script') 

@endsection
@section('body')
    <div class="col-md-10">
        <div class="mt-4">
            <a href="coinListing" class="me-5"><button
                    class="btn text-light  active btncust">{{ __('messageLK.Back') }}</button></a>
        </div>
        
        <div class="photo"></div>
        
    </div>
@endsection
