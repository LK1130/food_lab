@extends('COMMON.layout.layout_customer')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ url('css/newsAll.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    {{-- <script src="{{ url('js/customer.js') }}" type="text/javascript" defer></script> --}}
    <script src="{{ url('js/forInformAlert.js') }}" type="text/javascript" defer></script>
@endsection

@section('title', 'Food Lab')
@section('header')

    <div class="news-container">
        <p class="title fs-2 fw-bold ms-4">{{ __('messageZY.track') }}</p>
        <div class="allNews">
            @forelse ($alltracks as $alltrack)
                @php
                    $allcolor = ['yellow', 'red', 'green', 'red', 'green', 'green'];
                    $statusMessage = $alltrack->order_status;
                    $messagecolor = $allcolor[$statusMessage - 1];
                @endphp
                <div class="news d-flex flex-row justify-content-center align-items-center">
                    <img src="/storage/newsImage/Dogecoin-Transparent.png" alt=""> {{-- need to change --}}
                    <div class="d-flex flex-column w-100 ms-5 mt-4">
                        <p class=" fw-bolder fs-5 ">{{ $alltrack->product_name }} </p>
                        <p class=" fw-bold ">{{ $alltrack->coin }} {{ __('messageZY.coin') }}</p>
                    </div>
                    <div class="d-flex flex-column ms-5  mt-4 w-50">
                        <p class="fs-5 fw-bolder rounded {{ $messagecolor }} w-50 text-center">{{ $alltrack->status }}
                        </p>
                        <p class=" fw-bold  mb-3 ">{{ $alltrack->created_at }}</p>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
        <a href="/"><button class="btn fs-5  mt-5 backNews">{{ __('messageZY.back') }}</button></a>

    </div>
    </div>


@endsection
