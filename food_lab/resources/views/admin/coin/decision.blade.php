@extends('COMMON.layout.layout_admin')
@section('title', 'Coin Decision')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('css/adminCoin.css') }}" />
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('body')

    <div class="col-md-10">
        <div class="mt-4">
            <a href="/coinListing" class="me-5"><button
                    class="btn text-light  inactive btncust">{{ __('messageLK.Back') }}</button></a>
        </div>
        <div class="request_title mx-auto"> User Request</div>
        {{-- Start User Request --}}
        <div class="row mobile_block mt-3">
            <div class="col-3">
                <div class="evd_photo">
                    @isset($path->path)
                        <img src="{{ URL::asset('/storage/coinCharge/' . $path->path) }}"
                            class="rounded  d-block border border-danger border-1 rounded" alt="...">
                    @endisset
                    @empty($path->path)
                        <img src="{{ URL::asset('/img/noimage.jpg') }}"
                            class="rounded  d-block border border-danger border-1 rounded" alt="...">
                    @endempty
                </div>
                <label class="mt-3 fs-5 fw-bold">Contact to Customer</label>
                <div class="mt-1 fs-5 ms-2 text-danger">
                    <i class="bi bi-telephone-fill me-2"></i>
                    <a href="tel:{{ $Cdetail->phone }}">{{ $Cdetail->phone }}</a>
                </div>
                <div class="mt-1 fs-5 ms-2 text-danger">
                    <i class="bi bi-inbox-fill me-2"></i>
                    <a href="mailto:{{ $Cdetail->email }}">{{ $Cdetail->email }}</a>
                </div>
            </div>
            <div class="col">
                <div class="request_detail">
                    <div class="row">
                        <div class="col">
                            <li class="detail_list fs-5 fw-bold"> Customer Name</li>
                            <li class="detail_list fs-5 fw-bold"> Customer ID</li>
                            <li class="detail_list fs-5 fw-bold"> Request Date Time</li>
                            <li class="detail_list fs-5 fw-bold"> Time From Now</li>
                            <li class="detail_list fs-5 fw-bold"> Current Decision</li>
                        </div>
                        <div class="col">
                            <li class="detail_list fs-5"> : {{ $Cdetail->nickname }}</li>
                            <li class="detail_list fs-5 atag"> : <a
                                    href="/customerinfoDetail?id={{ $Cdetail->customerid }}">{{ $Cdetail->customerID }}</a>
                            </li>
                            <li class="detail_list fs-5 labeltag"> : {{ $Cdetail->customerID }}</li>
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
                        <input class="form-check-input" type="checkbox" value="" id="decision" onchange="decision()"
                            @if ($errors->any()) checked @endif>
                        <label class="form-check-label fs-5" for="decision">
                            Decision
                        </label>
                    </div>
                </div>
                {{-- End User Request --}}
                {{-- Start Decision Making --}}
                <div class="mt-4 mb-4 decisiondiv">
                    <form action="/decided" method="POST" id="decisionform">
                        @csrf
                        <div class="fs-5 fw-bold">Requested Coin</div>
                        <div class="fs-1 ms-5" id="reqCoin"> {{ $Cdetail->request_coin }}</div>
                        <div class="fs-5 fw-bold">Received Amount</div>
                        <div class="input-group mb-3 received_amount">
                            <input type="number" class="form-control" id="recAmt" name="amount"
                                placeholder="Received Amount" aria-label="Recipient's username" aria-describedby="checkBtn">
                            <button class="btn btn-outline-info" type="button" onclick="calAmount()"
                                id="checkBtn">Check</button>
                        </div>
                        @error('amount')
                            <li class="text-danger ">{{ $message }}</li>
                        @enderror
                        <label class="fs-5 fw-bold"> Payment By</label>
                        <select class="form-select request_pay" aria-label="Default select example" name="payment">
                            @foreach ($paymentlist as $payment)
                                <option value="{{ $payment->id }}">{{ $payment->payment_name }}</option>
                            @endforeach
                        </select>
                        @error('payment')
                            <li class="text-danger ">{{ $message }}</li>
                        @enderror
                        <div class="form-floating mb-3 mt-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 100px" name="note"></textarea>
                            <label for="floatingTextarea2">Note</label>
                            @error('note')
                                <li class="text-danger ">{{ $message }}</li>
                            @enderror
                        </div>
                        <button type="submit" id="approve" class="btn btn-success btn-lg  me-5">Approve</button>
                        <button type="submit" id="waiting" class="btn btn-primary btn-lg  me-5 ms-5">Waiting</button>
                        <button type="submit" id="reject" class="btn btn-danger btn-lg  ms-5">Reject</button>
                    </form>
                </div>
                {{-- End Decision Making --}}
            </div>
        </div>
    </div>
    <script>
        let rate = @json($rate);
        let chargeId = @json($Cdetail->chargeid)
    </script>
    <script src="{{ URL::asset('js/adminCoin.js') }}"></script>
@endsection
