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
            <a href="/"><i class="fa-solid fa-arrow-left fs-2 mt-2 ms-2 back"></i></a>
            <p class="title fs-2 fw-bold ms-4">{{ __('messageZY.trackDetail') }}</p>
        </div>

        <div class="allNews">
            <div class="d-flex flex-column trackDetailContainer  m-auto">
                <div class="d-flex flex-row justify-content-center roe ms-3 align-center">
                    <img src="/storage/newsImage/Dogecoin-Transparent.png" alt="">
                </div>

                <div class="d-flex flex-row justify-content-center roe ms-3 align-center">
                    <label for="detailTital" class="detailTital fs-4">{{ __('messageZY.title') }}</label>
                    <p class="fs-5 mt-1 titleInfo">--</p>
                    <p class="fs-5 mt-1 titleInfo">{{ $track->title }}</p>
                </div>
                <div class="d-flex flex-row justify-content-center roe ms-3 align-center">
                    <label for="detailTital" class="detailTital fs-4">{{ __('messageZY.coin') }}</label>
                    <p class="fs-5 mt-1 titleInfo">--</p>
                    <p class="fs-5 mt-1 titleInfo">{{ $track->total_coin }}</p>
                </div>
                <div class="d-flex flex-row justify-content-center roe ms-3 align-center">
                    <label for="detailTital" class="detailTital fs-4">{{ __('messageZY.status') }}</label>
                    <p class="fs-5 mt-1 titleInfo">--</p>
                    <p class="fs-5 mt-1 titleInfo">{{ $track->status }}</p>
                </div>
                <div class="d-flex flex-row justify-content-center roe ms-3 align-center">
                    <label for="detailTital" class="detailTital fs-4">{{ __('messageZY.requestedat') }}</label>
                    <p class="fs-5 mt-1 titleInfo">--</p>
                    <p class="fs-5 mt-1 titleInfo">{{ $track->created_at }}</p>
                </div>
            </div>
        </div>


    </div>
    </div>


@endsection
