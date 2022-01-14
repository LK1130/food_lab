@extends('COMMON.layout.layout_admin')

@section('title')
    Customer Info Detail
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('css/adminDashbord.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/customerinfoDetail.css') }}">
@endsection

@section('script')

@endsection


@section('body')
    <div class="col-md-10">
        <div class="status text title fw-bold mb-4 mt-4">Customer Info Detail</div>
        <div class="row">
            <div class="col-md-12">
                <div class="border border-dark text-center">
                    <li class="lidisplay mt-3 detail"><b>Customer Name</b> : asdasd</li>
                    <li class="lidisplay  detail"> <b>Customer ID</b> : U123123</li>
                    <li class="lidisplay  detail"><b>Nickname</b> : asdasd</li>
                    <li class="lidisplay  detail"> <b>Date of Birth</b> :12.1.1991</li>
                    <li class="lidisplay  detail"><b>Phone No.</b> : 123122312</li>
                    <li class="lidisplay mb-3  detail"> <b>Address</b> : Address3/ Address2/ Address1 </li>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-5">
                        <div class="status text tableheaders fw-bold mt-6">Product History</div>
                        <table class="table boxshad">
                            <thead>
                                <tr class="tableheader tablerows">
                                    <th scope="col">No.</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">UserID</th>
                                    <th scope="col">Product ID</th>
                                    <th scope="col">Date&Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tablecolor1 tablerows">
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>M12231</td>
                                    <td>P12312</td>
                                    <td>12/1/2022 <br>
                                        12:12
                                    </td>
                                </tr>
                                <tr class="tablecolor1 tablerows">
                                    <th scope="row">2</th>
                                    <td>Mark</td>
                                    <td>M12231</td>
                                    <td>P12312</td>
                                    <td>12/1/2022 <br>
                                        12:12
                                    </td>
                                </tr>
                                <tr class="tablecolor1 tablerows">
                                    <th scope="row">3</th>
                                    <td>Mark</td>
                                    <td>M12231</td>
                                    <td>P12312</td>
                                    <td>12/1/2022 <br>
                                        12:12
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6 mt-5">
                        <div class="status text fs-3 fw-bold mt-6">Coin Charge History</div>
                        <table class="table boxshad">
                            <thead>
                                <tr class="tableheader tablerows">
                                    <th scope="col">No.</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">UserID</th>
                                    <th scope="col">Product ID</th>
                                    <th scope="col">Date&Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tablecolor1 tablerows">
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>M12231</td>
                                    <td>P12312</td>
                                    <td>12/1/2022 <br>
                                        12:12
                                    </td>
                                </tr>
                                <tr class="tablecolor1 tablerows">
                                    <th scope="row">2</th>
                                    <td>Mark</td>
                                    <td>M12231</td>
                                    <td>P12312</td>
                                    <td>12/1/2022 <br>
                                        12:12
                                    </td>
                                </tr>
                                <tr class="tablecolor1 tablerows">
                                    <th scope="row">3</th>
                                    <td>Mark</td>
                                    <td>M12231</td>
                                    <td>P12312</td>
                                    <td>12/1/2022 <br>
                                        12:12
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
