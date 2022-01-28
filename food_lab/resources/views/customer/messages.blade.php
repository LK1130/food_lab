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
        <p class="title fs-2 fw-bold ms-4">{{ __('messageZY.message') }}</p>
        <div class="allNews">
            @forelse ($allmessages as $allmessage)
                @php
                    $allcolor = ['yellow', 'green', 'yellow', 'red'];
                    $statusMessage = $allmessage->decision_status;
                    $messagecolor = $allcolor[$statusMessage - 1];
                @endphp
                <div class="news d-flex flex-row justify-content-center align-items-center mb-4">
                    <p class="fs-6 fw-bolder me-auto ms-5 mt-3">{{ $allmessage->title }}</p>
                    <div class="d-flex flex-column me-5">
                        <p class="fs-5 fw-bolder me-4 ms-auto mt-2 rounded {{ $messagecolor }}">
                            {{ $allmessage->status }}
                        </p>
                        <p class=" fw-bold  mb-1 me-3">{{ $allmessage->created_at }}</p>
                    </div>
                </div>
            @empty

            @endforelse


        </div>
        <a href="/"><button class="btn fs-5  mt-5 backNews">{{ __('messageZY.back') }}</button></a>

    </div>
    </div>


@endsection
