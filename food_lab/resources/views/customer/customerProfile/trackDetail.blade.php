@extends('COMMON.layout.layout_cusotmer_2')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('css/commonCustomer.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/newsDetail.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    {{-- <script src="{{ url('js/customer.js') }}" type="text/javascript" defer></script> --}}

@endsection

@section('title', 'Track Detail')
@section('body')
    <div class="d-flex ps-5 py-4">
        <div class="me-4 mt-3">
            <a href="{{ url()->previous() }}"><i class="fas fa-arrow-left text-white arrows"></i></a>
        </div>
        <div>
            <img src="/storage/siteLogo/{{ $name->site_logo }}" width="50px" />
        </div>
    </div>
    <h1 class=" fw-bold text-center heading">{{ __('messageZY.trackDetail') }}</h1>
    <div class="allNews  m-auto ">
        <div class="d-flex flex-column trackDetailContainer mt-5 m-auto">
            @php
                $names = $track->title;
                $namesA = explode(' ', $names);
                $namesArray = array_slice($namesA, 1);
                $c = 0;
            @endphp

            <div class="d-flex flex-row justify-content-center roe ms-3 align-center">
                <label for="detailTital" class="detailTital me-auto  ms-1">{{ __('messageZY.product') }}</label>

                <div class="d-flex flex-column namesShow">
                    @foreach ($namesArray as $name)
                        @php
                            $c++;
                        @endphp
                        <p class=" mb-1 ms-5 titleInfo names">
                            {{ $c }}. {{ $name }}</p>
                    @endforeach
                </div>
            </div>
            <div class="d-flex flex-row justify-content-center roe ms-3 align-center">
                <label for="detailTital" class="detailTital me-auto  ms-1">{{ __('messageZY.coin') }}</label>
                <p class="  titleInfo ms-auto">{{ $track->total_coin }}</p>
            </div>
            <div class="d-flex flex-row justify-content-center roe ms-3 align-center">
                <label for="detailTital" class="detailTital me-auto  ms-1">{{ __('messageZY.status') }}</label>
                <p class=" titleInfo ms-auto">{{ $track->status }}</p>
            </div>
            <div class="d-flex flex-row justify-content-center roe ms-3 align-center">
                <label for="detailTital" class="detailTital  me-auto ms-1">{{ __('messageZY.requestedat') }}</label>
                <p class=" titleInfo ms-auto date ">{{ $track->created_at }}</p>
            </div>
        </div>
    </div>
@endsection
