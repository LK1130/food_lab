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
        <div class="status text title fw-bold mb-4 mt-4">Customer Info Detail</div>
        <div class="row">
            <div class="col-md-12">
                <div class="border border-dark text-center">
                    <li class="lidisplay mt-3 detail"><b>Customer Name</b> :{{ $cusdetail->nickname }} </li>
                    <li class="lidisplay  detail"> <b>Customer ID</b> :{{ $cusdetail->customerID }} </li>
                    <li class="lidisplay  detail"><b>Nickname</b> : {{ $cusdetail->nickname }}</li>
                    <li class="lidisplay  detail"> <b>Date of Birth</b> :12.1.1991</li>
                    <li class="lidisplay  detail"><b>Phone No.</b> :{{ $cusdetail->phone }} </li>
                    <li class="lidisplay mb-3  detail"> <b>Address</b> : {{ $cusdetail->address3 }}
                    </li>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-5">
                        <div class="status text tableheaders fw-bold mt-6">Order History</div>
                        <table class="table boxshad">
                            <tr class="tableheader tablerows">
                                <th scope="col">No.</th>
                                <th scope="col">Customer ID</th>
                                <th scope="col">Payment</th>
                                <th scope="col">GrandTotal Coin</th>
                                <th scope="col">GrandTotal Cash</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Last Control By</th>
                                <th scope="col">Date&Time</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($t_ad_order as $trans)
                                    <tr class="tablecolor1 text-light tablerows">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $trans->customer_id }}</td>
                                        <td>{{ $trans->payment_name }}</td>
                                        <td>{{ $trans->grandtotal_coin }}</td>
                                        <td>{{ $trans->grandtotal_cash }}</td>
                                        <td>{{ $trans->status }}</td>
                                        <td>{{ $trans->ad_name }}</td>
                                        <td>{{ $trans->order_date }} <br>
                                            {{ $trans->order_time }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">{{ $t_ad_order->links() }}</div>
                    </div>
                    <div class="col-md-6 mt-5">
                        <div class="status text fs-3 fw-bold mt-6">Coin Charge History</div>
                        <table class="table boxshad">
                            <thead>
                                <tr class="tableheader tablerows">
                                    <th scope="col">No.</th>
                                    <th scope="col">UserID</th>
                                    <th scope="col">Coin Amount</th>
                                    <th scope="col">Approve By</th>
                                    <th scope="col">Request Time</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cuscoin as $coin)
                                    <tr class="tablecolor1 text-light tablerows">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $coin->customerID }}</td>
                                        <td>{{ $coin->request_coin }}</td>
                                        <td>{{ $coin->ad_name }}</td>
                                        <td>{{ $coin->request_datetime }}</td>
                                        <td>{{ $coin->status }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">{{ $cuscoin->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
