@extends('COMMON.layout.layout_admin')

@section('title')
    Customer Report Reply
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('css/reportreply.css') }}">
@endsection

@section('script')
@endsection
@section('body')
    <div class="col-md-10">
        <a href="customerContact"><button class="btn btncust1 text-light mt-4">Back</button></a>
        <div class="status text title fw-bold mt-4 mb-5">Customer Reports Reply</div>
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="userreply" class="form-label detail">{{ $reply->customerID }}'s Message</label>
                            <textarea class="form-control border-dark" id="userreply" rows="3"
                                placeholder="{{ $reply->report_message }}" style="resize: none;height: 15vh"
                                readonly></textarea>
                        </div>
                        <form action="reportrp/{{ $reply->ID }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="reply" class="form-label detail">Reply</label>
                                <textarea class="form-control border-dark" id="reply" rows="3"
                                    style="resize: none;height: 15vh" name="reply"></textarea>
                            </div>
                            <button class="btn rp brp" type="submit">Reply</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
