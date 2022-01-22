@extends('COMMON.layout.layout_admin')
@section('title', 'Coin Decision')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('css/adminCoin.css') }}" />
@endsection

@section('script')
    <script src="{{ URL::asset('js/adminCoin.js') }}"></script>
@endsection
@section('body')
    <div class="col-md-10">
        <div class="mt-4">
            <a href="/coinListing" class="me-5"><button
                    class="btn text-light  inactive btncust">{{ __('messageLK.Back') }}</button></a>
        </div>
        <div class="request_title mx-auto"> User Request</div>
        <div class="row mobile_block mt-3">
            <div class="col-3">
                <div class="evd_photo">
                    <img src="{{ URL::asset('img/screen_shot.JPG') }}"
                        class="rounded  d-block border border-danger border-1 rounded" alt="...">
                </div>
            </div>
            <div class="col">
                <div class="request_detail">
                    <div class="row">
                        <div class="col">
                            <li class="detail_list fs-5 fw-bold"> Customer Name</li>
                            <li class="detail_list fs-5 fw-bold"> Customer ID</li>
                            <li class="detail_list fs-5 fw-bold"> Coin Amount</li>
                            <li class="detail_list fs-5 fw-bold"> Request Date Time</li>
                            <li class="detail_list fs-5 fw-bold"> Time From Now</li>
                            <li class="detail_list fs-5 fw-bold"> Current Decision</li>
                        </div>
                        <div class="col">
                            <li class="detail_list fs-5"> : {{ $Cdetail->nickname }}</li>
                            <li class="detail_list fs-5"> : {{ $Cdetail->customerID }}</li>
                            <li class="detail_list fs-5"> : {{ $Cdetail->request_coin }}</li>
                            <li class="detail_list fs-5"> : {{ $Cdetail->request_datetime }}</li>
                            <li class="detail_list fs-5"> :
                                {{ \Carbon\Carbon::parse($Cdetail->request_datetime)->diffForHumans() }}</li>
                            @if ($Cdetail->statusid == 1)
                                <li class="detail_list fs-5 fw-bold text-success"> : {{ $Cdetail->status }}</li>
                            @elseif($Cdetail->statusid == 3)
                                <li class="detail_list fs-5 fw-bold text-warning"> : {{ $Cdetail->status }}</li>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="make_decision ">
                    <label class="fs-4 fw-bold mt-4 text-danger"> Make Decision</label>
                    <div class="form-check request_decision_check ms-5">
                        <input class="form-check-input" type="checkbox" value="" id="decision" onchange="decision()">
                        <label class="form-check-label fs-5" for="decision">
                            Decision
                        </label>
                    </div>
                </div>



                <div class="mt-4 decisiondiv">

                    <label class="fs-5 fw-bold"> Payment By</label>
                    <select class="form-select request_pay" aria-label="Default select example">
                        @foreach ($paymentlist as $payment)
                            <option value="{{ $payment->id }}">{{ $payment->payment_name }}</option>
                        @endforeach
                    </select>
                    <div class="form-floating mb-3 mt-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Note</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg  me-5">Approve</button>
                    <button type="submit" class="btn btn-primary btn-lg  me-5 ms-5">Waiting</button>
                    <button type="submit" class="btn btn-danger btn-lg  ms-5">Reject</button>
                </div>

            </div>
        </div>
    </div>
@endsection
