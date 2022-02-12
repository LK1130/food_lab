@extends('COMMON.layout.layout_cusotmer_2')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('css/commonCustomer.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/newsAll.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    {{-- <script src="{{ url('js/customer.js') }}" type="text/javascript" defer></script> --}}

@endsection

@section('title', 'Food Lab')
@section('body')

    <div class="news-container">
        <div class="d-flex flex-row">
            <a href="/"><i class="fa-solid fa-arrow-left fs-2 mt-2 ms-2 back"></i></a>
            <p class="title fs-2 fw-bold ms-4">{{ __('messageZY.news') }}</p>
        </div>
        @php
            $ldate = date('Y-m-d H:i:s');
            $currentdate = strtotime($ldate);
        @endphp
        <div class="allNews">
            @forelse ($allnews as $allnew)
                @php
                    $date2 = strtotime($allnew->newscreated);
                    $totalSecondsDiff = abs($date2 - $currentdate);
                    $totalDaysDiff = $totalSecondsDiff / 60 / 60 / 24; //493.05
                    $diff = (int) $totalDaysDiff;
                @endphp
                @if ($diff < 3)
                    <div class="newsForAll mt-4">
                        <div class="news d-flex flex-row justify-content-center align-items-center">
                            <img src="/storage/newsImage/{{ $allnew->source }}" alt="" class="newsImg me-auto ms-5">
                            <div class="mobile me-5">
                                <p class="fs-5 fw-bolder  ms-auto me-5">{{ $allnew->title }}
                                    ({{ $allnew->detail }}) </p>
                                <p class="fs-5 fw-bolder  ms-auto">
                                    {{ $diff == 0 ? 'Today' : ($diff == 1 ? $diff . 'day ago' : $diff . 'days ago') }}

                                </p>
                            </div>
                            <img src="img/new.png" alt="" class="newsLogoAll">
                        </div>
                    </div>
                @else
                    <div class="newsForAll mt-4">
                        <div class="news d-flex flex-row justify-content-center align-items-center">
                            <img src="/storage/newsImage/{{ $allnew->source }}" alt="" class="newsImg me-auto ms-5">
                            <div class="mobile me-5">
                                <p class="fs-5 fw-bolder  ms-auto me-5">{{ $allnew->title }}
                                    ({{ $allnew->detail }}) </p>
                                <p class="fs-5 fw-bolder  ms-auto">
                                    {{ $diff == 0 ? 'Today' : ($diff == 1 ? $diff . 'day ago' : $diff . 'days ago') }}
                                </p>
                            </div>
                            <img src="" alt="" class="newsLogoAll">
                        </div>
                    </div>
                @endif

            @empty
                <div class="newsForAll mb-4">
                    <div class="news d-flex flex-row justify-content-center align-items-center">
                        <p class="fs-5 fw-bolder mt-2 me-auto">{{ __('messageZY.nonews') }} </p>
                    </div>
                </div>
            @endforelse

        </div>


    </div>
    </div>


@endsection
