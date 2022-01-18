@extends('COMMON.layout.layout_customer')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('css/commonCustomer.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title','Food Lab')

@section('header')
    {{-- Start Report Form Section --}}
    <section class="forms">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <p class="fw-bolder form-headers">{{ __('messageMK.suggestForm') }}</p>
            <form action="/suggest" method="post">
                @csrf
                <div class="d-flex">
                    <label class="fw-bold">{{ __('messageMK.suggestionType') }}</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="d-flex">
                    <label class="fw-bold" id="details">{{ __('messageMK.suggestDetails') }}</label>
                    <textarea class="form-control" id="details"></textarea>

                </div>
                <div class="float-end">
                    <p><span>0</span>/255</p>
                </div>
                <div class="float-end">
                    <button type="submit" class="btn me-5">{{ __('messageMK.suggest') }}</button>
                    <a href="/" type="reset" class="btn me-5 cancels">{{ __('messageMK.cancel') }}</a>
                </div>
            </form>
        </div>
    </section>
    {{-- End Report Form Section --}}
@endsection
