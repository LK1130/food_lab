@extends('COMMON.layout.layout_admin')

@section('title')
    Coin Charge List
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('css/adminOrdertransaction.css') }}">

@endsection

@section('script')

@endsection


@section('body')
    <div class="col-md-10">
        <div class="mt-4">
            <a href="orderTransaction" class="me-5"><button
                    class="btn  inactive text-light fs-4 topbtns">{{ __('messageZN.Order Transaction') }}</button></a>
            <a href="coinchargeList"><button
                    class="btn   text-light fs-4 topbtns btncust">{{ __('messageZN.Coin Charge List') }}</button></a>
        </div>
        <div class="status text tableheaders fw-bold mb-4 mt-4">{{ __('messageZN.Coin Charge List') }}</div>
        <div class="row ">
            <div class="col-md-12 roow">
                <table class="table boxshad me-5">
                    <thead>
                        <tr class="tableheader tablerows">
                            <th scope="col">{{ __('messageZN.No') }}</th>
                            <th scope="col">{{ __('messageZN.Customer ID') }}</th>
                            <th scope="col">{{ __('messageZN.CoinA') }}</th>
                            <th scope="col">{{ __('messageZN.Decisionby') }}</th>
                            <th scope="col">{{ __('messageZN.Request time') }}</th>
                            <th scope="col">{{ __('messageZN.Status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($t_ad_coincharge as $key => $coincharge)
                            <tr class="tablecolor1 text-light tablerows">
                                <th scope="row">{{ $t_ad_coincharge->firstItem() + $key }}</th>
                                <td>{{ $coincharge->customerID }}</td>
                                <td>{{ $coincharge->request_coin }}</td>
                                <td>{{ $coincharge->ad_name }}</td>
                                <td>{{ $coincharge->request_datetime }}
                                </td>
                                <td>{{ $coincharge->status }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">{{ $t_ad_coincharge->links() }}</div>
            </div>
        </div>



    </div>
@endsection
