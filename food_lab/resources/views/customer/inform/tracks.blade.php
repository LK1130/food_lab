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
            <p class="title fs-2 fw-bold ms-4">{{ __('messageZY.track') }}</p>
        </div>
        <div class="allNews ">
            @forelse ($alltracks as $alltrack)
                @php
                    $allcolor = ['yellow', 'red', 'green', 'red', 'green', 'green'];
                    $statusMessage = $alltrack->order_status;
                    $messagecolor = $allcolor[$statusMessage - 1];
                @endphp
                @if ($alltrack->seen == 0)
                    <div class="tracks d-flex flex-row justify-content-center align-items-center my-4">

                        <div class="d-flex flex-column  me-auto ms-5 mt-4  ">
                            <p class=" fw-bolder fs-4 productname">
                                {{ $alltrack->product_name }}asdfasdfasdfasdf.asdfasdfasdfasdf,adsfasdfadsdfasdf,asdfasdfaasdfasdfasdfasdfsdfasf,asdfasdfasdfasd,fasdfasdfasdf

                            </p>
                            <p class=" fw-bold fs-4">{{ $alltrack->coin }} {{ __('messageZY.coin') }}
                                ( {{ $alltrack->amount }} {{ __('messageZY.mmk') }} )</p>
                        </div>
                        <div class="d-flex flex-column  me-5 mt-4 ">
                            <p class="fs-3 me-3 fw-bolder rounded {{ $messagecolor }} w-100 text-center">
                                {{ $alltrack->status }}
                            </p>
                            <p class=" fw-bold fs-5 mb-3 ">{{ $alltrack->trackscreated }}</p>
                        </div>
                        <img src="img/new.png" alt="" class="newsLogoAll">
                    </div>
                @else
                    <div class="tracks d-flex flex-row justify-content-center align-items-center my-4">
                        <div class="d-flex flex-column me-auto ms-5 mt-4 nome">
                            <p class=" fw-bolder fs-4 productname">{{ $alltrack->product_name }}
                                asdfasdfasdfasdf.asdfasdfasdfasdf,adsfasdfadsdfasdf,asdfasdfaasdfasdfasdfasdfsdfasf,asdfasdfasdfasd,fasdfasdfasdf
                            </p>
                            <p class=" fw-bold fs-4">{{ $alltrack->coin }} {{ __('messageZY.coin') }}
                                ( {{ $alltrack->amount }} {{ __('messageZY.mmk') }} )</p>
                        </div>
                        <div class="d-flex flex-column me-5  mt-4 ">
                            <p class="fs-3 fw-bolder rounded {{ $messagecolor }} w-100 text-center">
                                {{ $alltrack->status }}
                            </p>
                            <p class=" fw-bold fs-5 mb-3 ">{{ $alltrack->trackscreated }}</p>
                        </div>
                        <img src="" alt="" class="newsLogoAll">
                    </div>
                @endif

            @empty
                <div class="news d-flex flex-row justify-content-center align-items-center my-4">

                    <div class="d-flex flex-column w-100 ms-5 mt-4">
                        <p class=" fw-bolder fs-5 ">{{ __('messageZY.notrack') }} </p>

                    </div>

                </div>
            @endforelse
        </div>


    </div>
    </div>


@endsection