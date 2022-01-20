@extends('COMMON.layout.layout_admin')

@section('title')
    Customer Info
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('css/admincustomerInfo.css') }}">
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ URL::asset('js/orderTransaction.js') }}"></script>
@endsection


@section('body')
    <div class="col-md-10">
        <div class="status text title fw-bold mb-4 mt-4">Customer Info</div>
        <form action="">
            <div class="d-flex">
                <input type="text" class="form-control cusinput border border-dark">
                <span class="mx-3"><button class="btn bybtns text-light btnstext">By Nickname</button></span>
                <span><button class="btn bybtns text-light btnstext">By ID</button></span>
            </div>
        </form>
        <div class="row mt-4">
            <div class="col-md-12 roow">
                <table class="table boxshad ">
                    <thead>
                        <tr class="tableheader tablerows">
                            <th scope="col">No.</th>
                            <th scope="col">Nickname</th>
                            <th scope="col">CustomerID</th>
                            <th scope="col">Phone No.</th>
                            <th scope="col">Address</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($t_cu_customer as $list1)
                            <tr class="tablecolor1 tablerows">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $list1->nickname }}</td>
                                <td>{{ $list1->customerID }}</td>
                                <td>{{ $list1->phone }}</td>
                                <td>{{ $list1->address3 }}</td>
                                <td>
                                    <form action="customerinfoDetail/" .{{ $list1->id }}>
                                        <button class="btn tablerows btn-outline-light"><i
                                                class="bi bi-arrow-right"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">{{ $t_cu_customer->links() }}</div>
            </div>
        </div>
    </div>
@endsection
