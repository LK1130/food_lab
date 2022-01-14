@extends('COMMON.layout.layout_admin')

@section('title')
    Order Transaction
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('css/adminOrdertransaction.css') }}">
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ URL::asset('js/orderTransaction.js') }}"></script>
@endsection


@section('body')
    <div class="col-md-10">
        <div class="mt-4">
            <a href="orderTransaction" class="me-5"><button
                    class="btn topbtn text-light fs-4 topbtns">{{ __('messageZN.Order Transaction') }}</button></a>
            <a href="coinchargeList"><button
                    class="btn topbtn inactive text-light fs-4 topbtns">{{ __('messageZN.Coin Charge List') }}</button></a>
        </div>
        <div class="status text fs-2 fw-bold mb-4 mt-4">{{ __('messageZN.Order Transaction') }}</div>
        <div class="row ">
            <div class="col-md-12 roow">
                <table class="table boxshad me-5">
                    <thead>
                        <tr class="tableheader fs-5">
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Payment</th>
                            <th scope="col">GrandTotal Coin</th>
                            <th scope="col">GrandTotal Cash</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Last Control By</th>
                            <th scope="col">Date&Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="tablecolor1 text-light fs-4" id="clickrow" data-href="ordertransactionDetail">
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Coin</td>
                            <td>300</td>
                            <td>0</td>
                            <td>complete</td>
                            <td>AWdasd</td>
                            <td>12/1/2022 <br>
                                12:12
                            </td>
                        </tr>
                        <tr class="tablecolor1 text-light fs-4">
                            <th scope="row">2</th>
                            <td>Mark</td>
                            <td>Coin</td>
                            <td>300</td>
                            <td>0</td>
                            <td>complete</td>
                            <td>AWdasd</td>
                            <td>12/1/2022 <br>
                                12:12
                            </td>
                        </tr>
                        <tr class="tablecolor1 text-light fs-4">
                            <th scope="row">3</th>
                            <td>Mark</td>
                            <td>Coin</td>
                            <td>300</td>
                            <td>0</td>
                            <td>complete</td>
                            <td>AWdasd</td>
                            <td>12/1/2022 <br>
                                12:12
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



    </div>
@endsection
