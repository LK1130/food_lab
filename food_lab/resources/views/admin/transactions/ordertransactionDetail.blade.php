@extends('COMMON.layout.layout_admin')

@section('title')
    Order Transaction Detail
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('css/adminOrdertransaction.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/adminordertransactionDetail.css') }}">
@endsection

@section('script')

@endsection


@section('body')
    <div class="col-md-10">
        <div class="mt-4">
            <a href="orderTransaction" class="me-5"><button
                    class="btn  text-light fs-4 topbtns btncust">{{ __('messageZN.Order Transaction') }}</button></a>
            <a href="coinchargeList"><button
                    class="btn  inactive text-light fs-4 topbtns">{{ __('messageZN.Coin Charge List') }}</button></a>
        </div>
        <div class="status text fs-2 fw-bold mb-4 mt-4">{{ __('messageZN.Order Transaction Detail') }}</div>
        <div class="row ">
            <div class="col-md-12 roow">
                <div class="border border-dark p-3 ">
                    <div class="row position-relative ">
                        {{-- Name And ID --}}
                        <div class="col-md-6">
                            <div class="text-start ms-5 fs-4">
                                <li class="lidisplay"><b>Customer Name</b> : {{ $order->nickname }}</li>
                                <li class="lidisplay"> <b>Customer ID</b> :{{ $order->customerID }} </li>
                            </div>
                        </div>
                        {{-- Order Id And Date --}}
                        <div class="col-md-6">
                            <div class="text-end me-5 fs-4">
                                <li class="lidisplay"> <b>OrderID</b> :{{ $order->orderid }}</li>
                                <li class="lidisplay"><b>Date</b> : {{ $order->order_date }}
                                    {{ $order->order_time }}</li>
                            </div>
                        </div>
                        <div class="row mainbox">
                            {{-- Table Inside --}}
                            <div class="col-md-12">
                                <table class="table boxshad ms-2 mt-5">
                                    <thead>
                                        <tr class="tableheader fs-5">
                                            <th scope="col">No.</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">ProductID</th>
                                            <th scope="col">Coin</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total Coin</th>
                                            <th scope="col">Total Cash</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tablecolor1 text-light fs-5">
                                            <th scope="row">1</th>
                                            <td>Basda</td>
                                            <td>M12231</td>
                                            <td>312</td>
                                            <td>10</td>
                                            <td>200</td>
                                            <td>1,000</td>
                                        </tr>
                                        <tr class="tablecolor1 text-light fs-5">
                                            <th scope="row">2</th>
                                            <td>Basda</td>
                                            <td>M12231</td>
                                            <td>312</td>
                                            <td>10</td>
                                            <td>200</td>
                                            <td>1,000</td>
                                        </tr>
                                        <tr class="tablecolor1 text-light fs-5">
                                            <th scope="row">3</th>
                                            <td>Basda</td>
                                            <td>M12231</td>
                                            <td>312</td>
                                            <td>10</td>
                                            <td>200</td>
                                            <td>1,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="row position-relative">
                        <div class="col-md-4">
                            <div class="text-start ms-5 fs-4 position-absolute bottom-0 start-0">
                                <p> <b>Last Control By</b> :{{ $order->ad_name }} </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center position-absolute bottom-0 start-50 translate-middle-x ">
                                <li class="lidisplay fs-4"><b>ORDER STATUS</b></li>
                                <li class="lidisplay fs-4">{{ $order->status }}</li>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="text-end position-absolute bottom-0 end-0">
                                <li class="lidisplay fs-5 me-4"><b>Delivery Fees</b> : 1,000</li>
                                @if ($order->grandtotal_coin > 0)
                                    <li class="lidisplay fs-3 me-4"><b>Grand Toatl Coin </b> :
                                        {{ $order->grandtotal_coin }}
                                    </li>
                                @else
                                    <li class="lidisplay fs-3 me-4"><b>Grand Total Cash</b> :
                                        {{ $order->grandtotal_cash }}
                                    </li>
                                @endif

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
@endsection
