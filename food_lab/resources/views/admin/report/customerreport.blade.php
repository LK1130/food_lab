@extends('COMMON.layout.layout_admin')

@section('title')
    Customer Report
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('css/adminOrdertransaction.css') }}">
@endsection

@section('script')
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

        <div class="status text title fw-bold mb-4">Customer Reports</div>
        <div class="row">
            <div class="col-md-12">
                <table class="table boxshad me-5">
                    <thead>
                        <tr class="tableheader tablerows">
                            <th scope="col">No.</th>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Suggest Type</th>
                            <th scope="col">Message</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="tablecolor1 text-light tablerows">
                            <th scope="row">1</th>
                            <td>U12312</td>
                            <td>O123123</td>
                            <td>Delivery</td>
                            <td>Nout kya</td>
                            <td><a href="reportreplies">
                                    <button class="btn btn-primary">Reply</button></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
