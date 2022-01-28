@extends('COMMON.layout.layout_admin')
@section('title', 'Coin List')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('css/adminCoin.css') }}" />
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
@section('body')
    <div class="col-md-10">
        <div class="mt-4">
            <a href="" class="me-5"><button
                    class="btn text-light  inactive btncust">{{ __('messageLK.Listing') }}</button></a>
            <a href="" class="me-5"><button
                    class="btn text-light  active btncust">{{ __('messageLK.AddCoin') }}</button></a>
            <a href="rateChange" class="me-5"><button
                    class="btn text-light  inactive btncust">{{ __('messageLK.CoinRate') }}</button></a>
            <a href="rateHistory" class="me-5"><button
                    class="btn text-light  inactive btncust">{{ __('messageLK.CoinHistory') }}</button></a>
        </div>

        <div class="row mt-4">
            <div class="col-7">
                <form action="" class="">
                    <div class="d-flex align-items-center">
                        <span class="fs-5 w-10 me-3">CustomerID: </span> <input type="text"
                            class="form-control border border-dark searchBtn" id="customerID" required>
                        <span><button class="btn text-light active btncust" id="search">Search</button></span>
                    </div>
                </form>
            </div>
            <div class="col">
                <div class="d-flex align-items-center">
                    <a href="/customerInfo"><button class="btn text-light active btncust">Customer List</button></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="border border-dark p-4">
                    <li class="lidisplay mt-3 fs-4"><b>Nickname</b> :<span id="nickname"></span> </li>
                    <li class="lidisplay fs-4"> <b>Customer ID</b> : <span id="cid"></span> </li>
                    <li class="lidisplay fs-3 text-warning float-end"> <b>Coin : <span id="coin"></span> </b> </li>
                    <li class="lidisplay fs-4"><b>Phone No.</b> : <span id="phone"></span> </li>
                    <li class="lidisplay mb-3 fs-4"> <b>Address</b> :<span id="address"></span></li>

                    {{-- Add Coin --}}
                    <div class="fs-5 fw-bold">Add Coin</div>
                    <div class="input-group mb-3 received_amount">
                        <input type="number" class="form-control" id="recAmt" name="amount"
                            aria-label="Recipient's username" aria-describedby="checkBtn" />
                    </div>
                    @error('amount')
                        <li class="text-danger ">{{ $message }}</li>
                    @enderror

                    {{-- Note --}}
                    <div class="form-floating mb-3 mt-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 120px" name="note"></textarea>
                        <label for="floatingTextarea2" class="fs-5">Note</label>
                        @error('note')
                            <li class="text-danger ">{{ $message }}</li>
                        @enderror
                    </div>

                    <button type="submit" id="approve" class="btn btn-warning btn-lg  me-5">Add Coin</button>
                </div>
            </div>
        </div>
    </div>

@endsection
