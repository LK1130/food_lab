@extends('COMMON.layout.layout_customer')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ url('css/newsAll.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    <script src="{{ url('js/customer.js') }}" type="text/javascript" defer></script>
    <script src="{{ url('js/forInformAlert.js') }}" type="text/javascript" defer></script>
@endsection

@section('title', 'Food Lab')
@section('header')

    <div class="news-container">
        <p class="title fs-2 fw-bold ms-4">{{ __('messageZY.news') }}</p>
        <div class="allNews">
            @forelse ($allnews as $allnew)
                <div class="news mb-4">
                    <div class="news d-flex flex-row justify-content-center align-items-center">
                        <img src="/storage/newsImage/{{ $allnew->source }}" alt="">
                        <p class="fs-6 fw-bolder mt-2 me-auto">{{ $allnew->title }}
                            ({{ $allnew->detail }})</p>
                        <p class="fs-6 fw-bolder mt-2 ms-auto">{{ $allnew->created_at }}</p>
                    </div>
                </div>
            @empty
                <div class="news d-flex flex-row justify-content-center align-items-center">
                    <p class="fs-6 fw-bolder mt-2 me-auto">{{ __('messageZY.nocategory') }} </p>
                </div>
            @endforelse

        </div>
        <a href="/"><button class="btn fs-5  mt-5 backNews">{{ __('messageZY.back') }}</button></a>

    </div>
    </div>


@endsection
