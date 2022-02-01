@extends('COMMON.layout.layout_admin')

@section('title')
    Customer Info Detail
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('css/customerinfoDetail.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/admincustomerInfo.css') }}">
@endsection

@section('script')

@endsection


@section('body')
    <div class="col-md-10">
        <a href="customerInfo"><button class="btn btncust1 text-light mt-4">Back</button></a>
        <div class="status text title fw-bold mb-4 mt-4">Customer Info Detail</div>
        <div class="row">
            <div class="col-md-12">
                <div class="border border-dark">
                    <div class="d-flex justify-content-center my-3">
                        <div>
                            <p class="lidisplay  detail"><b>Nickname</b></p>
                            <p class="lidisplay  detail"><b>Customer ID</b></p>
                            <p class="lidisplay  detail"><b>Nickname</b></p>
                            <p class="lidisplay  detail"><b>Date of Birth</b></p>
                            <p class="lidisplay  detail"><b>Phone No.</b></p>
                            <p class="lidisplay  detail"><b>Address</b></p>
                        </div>
                        <div class="mx-2">
                            <p class="lidisplay  detail">:</p>
                            <p class="lidisplay  detail">:</p>
                            <p class="lidisplay  detail">:</p>
                            <p class="lidisplay  detail">:</p>
                            <p class="lidisplay  detail">:</p>
                            <p class="lidisplay  detail">:</p>
                        </div>
                        <div>
                            <p class="lidisplay  detail">{{ $cusdetail->nickname }}</p>
                            <p class="lidisplay  detail">{{ $cusdetail->customerID }}</p>
                            <p class="lidisplay  detail">{{ $cusdetail->nickname }}</p>
                            <p class="lidisplay  detail">12.1.1991</p>
                            <p class="lidisplay  detail">{{ $cusdetail->phone }}</p>
                            <p class="lidisplay  detail">{{ $cusdetail->address3 }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-5 ">
                        <div class="status text tableheaders fw-bold mt-6">Order History</div>
                        <table class="table boxshad">
                            <tr class="tableheader tablerows">
                                <th scope="col">No.</th>
                                <th scope="col">Pay Type</th>
                                <th scope="col">GrandTotal Coin</th>
                                <th scope="col">GrandTotal Cash</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Last Control By</th>
                                <th scope="col">Date&Time</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($t_ad_order as $trans)
                                    <tr class="tablecolor1 tablerows">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $trans->payment_name }}</td>
                                        <td class="text-center">{{ $trans->grandtotal_coin }}</td>
                                        <td class="text-center">{{ $trans->grandtotal_cash }}</td>
                                        <td>{{ $trans->status }}</td>
                                        <td>{{ $trans->ad_name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($trans->order_date)->diffForHumans() }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if ($t_ad_order->hasPages())
                            <div class="d-flex justify-content-center">
                                {{ $t_ad_order->appends([
                                        'id' => $t_ad_order[0]->customer_id,
                                        'customerCoin' => $cuscoin->currentPage(),
                                    ])->links() }}
                            </div>

                        @endif

                    </div>
                    <div class="col-md-6 mt-5">
                        <div class="status text fs-3 fw-bold mt-6">Coin Charge History</div>
                        <table class="table boxshad">
                            <thead>
                                <tr class="tableheader tablerows">
                                    <th scope="col">No.</th>
                                    <th scope="col">Coin Amount</th>
                                    <th scope="col">Approve By</th>
                                    <th scope="col">Request Time</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cuscoin as $coin)
                                    <tr class="tablecolor1 tablerows">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $coin->request_coin }}</td>
                                        <td>{{ $coin->ad_name }}</td>
                                        <td> {{ \Carbon\Carbon::parse($coin->request_datetime)->diffForHumans() }}
                                        </td>
                                        <td>{{ $coin->status }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @if ($cuscoin->hasPages())
                            <div class="d-flex justify-content-center">
                                {{ $cuscoin->appends([
                                        'id' => $t_ad_order[0]->customer_id,
                                        'customerTrans' => $t_ad_order->currentPage(),
                                    ])->links() }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
