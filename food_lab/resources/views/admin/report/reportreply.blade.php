@extends('COMMON.layout.layout_admin')

@section('title')
    Customer Report Reply
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('css/adminOrdertransaction.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/reportreply.css') }}">
@endsection

@section('script')
@endsection
@section('body')
    <div class="col-md-10">
        <div class="status text title fw-bold mt-4 mb-5">Customer Reports Reply</div>
        <div class="row">
            <div class="col-md-12">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="userreply" class="form-label detail">User'id Reply</label>
                                <textarea class="form-control border-dark" id="userreply" rows="3"
                                    style="resize: none;height: 15vh" readonly></textarea>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="sugtype" class="form-label detail">Suggest Type</label>
                                <input class="form-control" type="text" id="sugtype" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="reply" class="form-label detail">Reply</label>
                                <textarea class="form-control border-dark" id="reply" rows="3"
                                    style="resize: none;height: 15vh"></textarea>
                            </div>
                            <button class="btn rp brp">Reply</button>
                            <a href="customerReport"><button class="btn rp back">Back</button></a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
