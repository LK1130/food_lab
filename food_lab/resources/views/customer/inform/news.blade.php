@extends('COMMON.layout.layout_customer')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ url('css/newsAll.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    {{-- <script src="{{ url('js/customer.js') }}" type="text/javascript" defer></script> --}}

@endsection

@section('title', 'Food Lab')
@section('header')

    <div class="news-container">
        <div class="d-flex flex-row">
            <a href="/"><i class="fa-solid fa-arrow-left fs-2 mt-2 ms-2 back"></i></a>
            <p class="title fs-2 fw-bold ms-4">{{ __('messageZY.news') }}</p>
        </div>

        <div class="allNews">
            @forelse ($allnews as $allnew)
                <div class="news mb-4">
                    <div class="news d-flex flex-row justify-content-center align-items-center">
                        <img src="/storage/newsImage/{{ $allnew->source }}" alt="" class="newsImg">
                        <div class="mobile me-5">
                            <p class="fs-5 fw-bolder  ms-auto me-5">{{ $allnew->title }}
                                ({{ $allnew->detail }})</p>
                            <p class="fs-5 fw-bolder  ms-auto">{{ $allnew->newscreated }}</p>
                        </div>

                    </div>
                </div>
            @empty
                <div class="news d-flex flex-row justify-content-center align-items-center">
                    <p class="fs-5 fw-bolder mt-2 me-auto">{{ __('messageZY.nonews') }} </p>
                </div>
            @endforelse

        </div>


    </div>
    </div>


@endsection
