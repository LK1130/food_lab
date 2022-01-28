@extends('COMMON.layout.layout_admin')
@section('title', 'Coin List')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('css/adminCoin.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/coinRate.css') }}" />
@endsection

@section('script')

@endsection
@section('body')
    <div class="col-md-10">
        <div class="mt-4">
            <a href="coinListing" class="me-5"><button
                    class="btn text-light inactive btncust">{{ __('messageLK.Listing') }}</button></a>
            <a href="addCoin" class="me-5"><button
                    class="btn text-light inactive btncust">{{ __('messageLK.AddCoin') }}</button></a>
            <a href="" class="me-5"><button
                    class="btn text-light active btncust">{{ __('messageLK.CoinRate') }}</button></a>
            <a href="rateHistory" class="me-5"><button
                    class="btn text-light inactive btncust">{{ __('messageLK.CoinHistory') }}</button></a>
        </div>
        {{-- Starts Form --}}
        <a href="{{ url('coinrate') }}"><button class="change" id="back">{{ __('messageZY.back') }}</button></a>
        <form action="rateStore" method="POST" enctype="multipart/form-data">
            @include('COMMON.component.coinRateAdd')
        </form>

    </div>
@endsection
