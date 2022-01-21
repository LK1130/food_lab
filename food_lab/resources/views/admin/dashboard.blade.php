@extends('COMMON.layout.layout_admin')

@section('title')
    Dashboard
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('css/adminDashbord.css') }}">
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"
        integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@endsection


@section('body')
    <div class="col-md-10">
        {{-- Top Noti Start --}}
        <div class="d-flex justify-content-end bd-highlight mx-5 my-4">
            {{-- Noti --}}
            <a href="#">
                <button type="button" class="btn btn-lg btn-outline-dark position-relative mx-3 fs-4">
                    <i class="bi bi-bell"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        14
                    </span>
                </button></a>
            {{-- Contact --}}
            <a href="#">
                <button type="button" class="btn btn-lg lg btn-outline-dark position-relative mx-3 fs-4">
                    <i class="bi bi-book"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        12
                    </span>
                </button></a>
            {{-- Report --}}
            <a href="#">
                <button type="button" class="btn btn-lg lg btn-outline-danger position-relative mx-3 fs-4">
                    </i><i class="bi bi-exclamation-triangle"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        13
                    </span>
                </button></a>
        </div>
        {{-- Top Noti End --}}

        {{-- Status Start --}}
        <div class="status text title fw-bold mb-4">{{ __('messageZN.Status') }}</div>
        <div class="row align-items-start me-4">
            <div class="col a ">
                <div class="text-center pb-3">
                    <p class=" numbers tcount">{{ $tcount }}</p>
                    <p class="detail">{{ __('messageZN.Total Transaction') }}</p>
                    <a href="orderTransaction" class="fs-5">{{ __('messageZN.See More Detail') }}</a>
                </div>
            </div>
            <div class="col a ms-3">
                <div class="text-center pb-3">
                    <p class=" numbers cuscount">{{ $cuscount }}</p>
                    <p class="detail">{{ __('messageZN.Total User Register') }}</p>
                    <a href="customerInfo" class="fs-5">{{ __('messageZN.See More Detail') }}</a>
                </div>
            </div>
            <div class="col a ms-3">
                <div class="text-center pb-3">
                    <p class=" numbers coinrate">{{ $coinrate->rate }}</p>
                    <p class="detail">{{ __('messageZN.Coin Rate') }}</p>
                    <a href="orderTransaction" class="fs-5">{{ __('messageZN.See More Detail') }}</a>
                </div>
            </div>
            <div class="col a ms-3">
                <div class="text-center pb-3">
                    <p class=" numbers">12</p>
                    <p class="detail">{{ __('messageZN.Today Order') }}</p>
                    <a href="" class="fs-5">{{ __('messageZN.See More Detail') }}</a>
                </div>
            </div>
            <div class="col a ms-3">
                <div class="text-center ">
                    <h3 class="fw-bolder pt-2 pb-2">{{ __('messageZN.Top 3') }}</h3>
                    <p class="detail fw-bold">1.Idiot Sandwich</p>
                    <p class="detail fw-bold">2.Moron Burger</p>
                    <p class="detail fw-bold">3.Ad</p>
                </div>
            </div>
        </div>
        {{-- Status End --}}
        {{-- Listing Start --}}
        <div class="status text fs-2 fw-bold mb-4 mt-5">{{ __('messageZN.Listing') }}</div>
        <div class="row">
            <div class="col-md-6">
                {{-- Transaction List --}}
                <div class="status text tableheaders fw-bold mb-2">{{ __('messageZN.Transaction List') }}</div>
                <table class="table boxshad">
                    <thead>
                        <tr class="tableheader tablerows">
                            <th scope="col">No.</th>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date&Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderdetail as $list2)
                            <tr class="tablecolor1 tablerows">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $list2->customerID }}</td>
                                <td>{{ $list2->payment_name }}</td>
                                <td>{{ $list2->order_status }}</td>
                                <td>{{ $list2->order_date }} {{ $list2->order_time }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <a href="orderTransaction" class=""><button
                        class="btn seemore text-light">{{ __('messageZN.See More') }}</button></a>
            </div>
            <div class="col-md-6">
                {{-- Customer Info --}}
                <div class="status text tableheaders fw-bold mb-2">{{ __('messageZN.Customer Info') }}</div>
                <table class="table boxshad">
                    <thead>
                        <tr class="tableheader tablerows">
                            <th scope="col">No.</th>
                            <th scope="col">Username</th>
                            <th scope="col">Cus. ID</th>
                            <th scope="col">Address</th>
                            <th scope="col">Ph No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($t_cu_customer as $list1)
                            <tr class="tablecolor1 tablerows">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $list1->nickname }}</td>
                                <td>{{ $list1->customerID }}</td>
                                <td>{{ $list1->address3 }}</td>
                                <td>{{ $list1->phone }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <a href="customerInfo" class=""><button
                        class="btn seemore text-light">{{ __('messageZN.See More') }}</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {{-- Product List --}}
                <div class="status text tableheaders fw-bold mb-2">{{ __('messageZN.Product List') }}</div>
                <table class="table boxshad">
                    <thead>
                        <tr class="tableheader tablerows">
                            <th scope="col">No.</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product ID</th>
                            <th scope="col">Coin</th>
                            <th scope="col">Tpye</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="tablecolor1 tablerows">
                            <th scope="row">1</th>
                            <td>Chicken Fries</td>
                            <td>C12312</td>
                            <td>200</td>
                            <td>Chicken</td>
                        </tr>
                        <tr class="tablecolor1 tablerows">
                            <th scope="row">2</th>
                            <td>Chicken Fries</td>
                            <td>C12312</td>
                            <td>200</td>
                            <td>Chicken</td>
                        </tr>
                        <tr class="tablecolor1 tablerows">
                            <th scope="row">3</th>
                            <td>Chicken Fries</td>
                            <td>C12312</td>
                            <td>200</td>
                            <td>Chicken</td>
                        </tr>
                    </tbody>
                </table>
                <a href="/productList" class="d-flex justify-content-end"><button
                        class="btn seemore text-light">{{ __('messageZN.See More') }}</button></a>
            </div>
            <div class="col-md-6">
                {{-- Coin Charge List --}}
                <div class="status text tableheaders fw-bold mb-2">{{ __('messageZN.Coin Charge List') }}</div>
                <table class="table boxshad">
                    <thead>
                        <tr class="tableheader tablerows">
                            <th scope="col">No.</th>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Approve By</th>
                            <th scope="col">Coin Amount</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coincharge as $list4)
                            <tr class="tablecolor1 tablerows">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $list4->customerID }}</td>
                                <td>{{ $list4->ad_name }}</td>
                                <td>{{ $list4->request_coin }}</td>
                                <td>{{ $list4->status }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <a href="" class=""><button
                        class="btn seemore text-light ">{{ __('messageZN.See More') }}</button></a>
            </div>
        </div>

        <script>
            // for transaction count
            var tcount = @json($tcount);
            // for customer count
            var cuscount = @json($cuscount);
            // for coinrate
            var coinrate = @json($coinrate->rate);
        </script>
        <script src="{{ URL::asset('js/admindashboard.js') }}"></script>
    @endsection
