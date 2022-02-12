@extends('COMMON.layout.layout_cusotmer_2')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('css/commonCustomer.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/newsAll.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <script src="{{ url('js/forAllMessages.js') }}" type="text/javascript" defer></script>

@endsection

@section('title', 'Food Lab')
@section('body')

    <div class="news-container">
        <div class="d-flex flex-row">
            <a href="/"><i class="fa-solid fa-arrow-left fs-2 mt-2 ms-2 text-light back"></i></a>
            <p class="title fs-2 fw-bold ms-4">{{ __('messageZY.message') }}</p>
        </div>
        @php
            $ldate = date('Y-m-d H:i:s');
            $currentdate = strtotime($ldate);
        @endphp
        <div class="allNews">
            @forelse ($allmessages as $allmessage)
                @php
                    $allcolor = ['yellow', 'green', 'yellow', 'red'];
                    $statusMessage = $allmessage->decision_status;
                    $messagecolor = $allcolor[$statusMessage - 1];
                    
                    $date2 = strtotime($allmessage->messagescreated);
                    $totalSecondsDiff = abs($date2 - $currentdate);
                    $totalDaysDiff = $totalSecondsDiff / 60 / 60 / 24; //493.05
                    $diff = (int) $totalDaysDiff;
                @endphp
                @if ($allmessage->seen == 0)
                    <div class="newsAll d-flex flex-row justify-content-center messageClick align-items-center mb-4"
                        id="{{ $allmessage->charge_id }}">
                        <p class="fs-4 fw-bolder me-auto ms-5 mt-3">{{ $allmessage->title }}</p>
                        <div class="d-flex flex-column me-5 nome">
                            <p class="fs-5 fw-bolder me-4 w-75 ms-auto mt-2 rounded text-center {{ $messagecolor }}">
                                {{ $allmessage->status }}
                            </p>
                            <p class=" fw-bold fs-5  mb-1 me-3">
                                {{ $diff == 0 ? 'Today' : ($diff == 1 ? $diff . 'day ago' : $diff . 'days ago') }}</p>
                        </div>
                        <img src="img/new.png" alt="" class="newsLogoAll">
                    </div>
                @else
                    <div class="newsAll d-flex flex-row justify-content-center messageClick align-items-center mb-4"
                        id="{{ $allmessage->charge_id }}">
                        <p class="fs-4 fw-bolder me-auto ms-5 mt-3">{{ $allmessage->title }}</p>
                        <div class="d-flex flex-column me-5 nome">
                            <p class="fs-5 fw-bolder me-4 w-75 ms-auto mt-2 rounded text-center {{ $messagecolor }}">
                                {{ $allmessage->status }}
                            </p>
                            <p class=" fw-bold fs-5  mb-1 me-3">
                                {{ $diff == 0 ? 'Today' : ($diff == 1 ? $diff . 'day ago' : $diff . 'days ago') }}</p>
                        </div>
                        <img src="" alt="" class="newsLogoAll">
                    </div>
                @endif

            @empty
                <div class="news d-flex flex-row justify-content-center align-items-center mb-4">
                    <p class="fs-5 fw-bolder me-auto ms-5 mt-3">{{ __('messageZY.nomessage') }} </p>
                </div>
            @endforelse


        </div>


    </div>
    </div>


@endsection
