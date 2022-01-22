@extends('COMMON.layout.layout_admin')
@section('title', 'Coin List')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('css/adminCoin.css') }}" />
@endsection

@section('script')

@endsection
@section('body')
    <div class="col-md-10">
        <div class="mt-4">
            <a href="coinListing" class="me-5"><button
                    class="btn text-light  active btncust">{{ __('messageLK.Back') }}</button></a>
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
                        <div class="col-4">
                            <li class="detail_list fs-5 fw-bold"> Customer Name</li>
                            <li class="detail_list fs-5 fw-bold"> Customer ID</li>
                            <li class="detail_list fs-5 fw-bold"> Coin Amount</li>
                            <li class="detail_list fs-5 fw-bold"> Request Date</li>
                            <li class="detail_list fs-5 fw-bold"> Request Time</li>
                            <li class="detail_list fs-5 fw-bold"> Time From Now</li>
                            <li class="detail_list fs-5 fw-bold"> Payment By</li>
                        </div>
                        <div class="col">
                            <li class="detail_list fs-5"> : Linn Ko Ko</li>
                            <li class="detail_list fs-5"> : LK1130</li>
                            <li class="detail_list fs-5"> : 10,000</li>
                            <li class="detail_list fs-5"> : 2022/01/22</li>
                            <li class="detail_list fs-5"> : 12:12</li>
                            <li class="detail_list fs-5"> : 1 Days ago:</li>
                            <select class="form-select request_pay" aria-label="Default select example">
                                <option selected>Kpay</option>
                                <option value="1">CB</option>
                                <option value="2">AYA</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="make_decision ">
                    <label class="fs-4 fw-bold mt-4 text-danger"> Make Decision</label>
                    <div class="form-check request_decision_check ms-5">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label fs-5" for="flexCheckChecked">
                            Decision
                        </label>
                    </div>
                    <div class="form-floating mt-4">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Note</label>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
