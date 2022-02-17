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

    <div class="news-container">
        <div class="d-flex flex-row">
            <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left fs-2 mt-2 ms-2 back"></i></a>
            <p class="title fs-2 fw-bold ms-4">{{ __('messageZY.trackDetail') }}</p>
        </div>

        <div class="allNews">
            <div class="d-flex flex-column trackDetailContainer  m-auto">
                @php
                    $names = $track->title;
                    $namesA = explode(' ', $names);
                    $namesArray = array_slice($namesA, 1);
                    $c = 0;
                @endphp

                <div class="d-flex flex-row justify-content-center roe ms-3 align-center">
                    <label for="detailTital"
                        class="detailTital fs-4 me-auto ms-5 pname">{{ __('messageZY.product') }}</label>

                    <div class="d-flex flex-column namesShow">
                        @foreach ($namesArray as $name)
                            @php
                                $c++;
                            @endphp
                            <p class="fs-4 mb-1 ms-5 titleInfo">
                                {{ $c }}. {{ $name }}</p>
                        @endforeach


                    </div>
                </div>
                <div class="d-flex flex-row justify-content-center roe ms-3 align-center">
                    <label for="detailTital" class="detailTital me-auto fs-4 ms-5">{{ __('messageZY.coin') }}</label>

                    <p class="fs-5 mt-1 titleInfo ms-auto">{{ $track->total_coin }}</p>
                </div>
                <div class="d-flex flex-row justify-content-center roe ms-3 align-center">
                    <label for="detailTital" class="detailTital me-auto fs-4 ms-5">{{ __('messageZY.status') }}</label>

                    <p class="fs-5 mt-1 titleInfo ms-auto">{{ $track->status }}</p>
                </div>
                <div class="d-flex flex-row justify-content-center roe ms-3 align-center">
                    <label for="detailTital"
                        class="detailTital fs-4 me-auto ms-5">{{ __('messageZY.requestedat') }}</label>

                    <p class="fs-5 mt-1 titleInfo ms-auto DetailC">{{ $track->created_at }}</p>
                </div>
            </div>
        </div>


    </div>
    </div>


@endsection
