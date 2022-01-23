@extends('COMMON.layout.layout_cusotmer_2')

@section('title','Food Lab')

@section('body')
    {{-- Start Report Form Section --}}
    <section class="forms">
        <div class="d-flex ps-5 py-4">
            <div class="me-4 mt-3">
                <a href="/"><i class="fas fa-arrow-left text-white arrows"></i></a>
            </div>
            <div>
                <img src="{{ url('/img/logo.png') }}" alt="logo"/>
            </div>
        </div>
        
        <div class="d-flex flex-column justify-content-center align-items-center reports">
            <p class="fw-bolder form-headers">{{ __('messageMK.reportForm') }}</p>
            <form action="/report" method="post">
                @csrf
                <div class="d-flex pb-3">
                    <label class="fw-bold">{{ __('messageMK.reportOrder') }}</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected disabled>Open this select menu</option>
                        @foreach ($orderlists as $orderlist)
                            <option value="{{ $orderlist->id }}">#{{ $orderlist->id }} {{ $orderlist->order_date }} {{  $orderlist->order_time }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex  pb-3">
                    <label class="fw-bold" id="details">{{ __('messageMK.reportDetails') }}</label>
                    <textarea class="form-control" id="details"></textarea>

                </div>
                <div class="float-end">
                    <button type="submit" class="btn me-5">{{ __('messageMK.report') }}</button>
                    <a href="/" type="reset" class="btn me-5 cancels">{{ __('messageMK.cancel') }}</a>
                </div>
            </form>
        </div>
    </section>
    {{-- End Report Form Section --}}
@endsection
