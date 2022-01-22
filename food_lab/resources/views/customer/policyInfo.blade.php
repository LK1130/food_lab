@extends('COMMON.layout.layout_customer')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('css/commonCustomer.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('css/customer.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title','Food Lab')

@section('header')
    {{-- Start Policy Section --}}
    <section>
        <div class="text-white fw-bolder policy-infos">
            <p class="policyheaders">{{ __('messageMK.policyInfo') }}</p>
            <div class="ps-5 mt-4">
                <p><i class="fas fa-star pe-3"></i>{{ __('messageMK.used1') }}</p>
                <p><i class="fas fa-star pe-3"></i>{{ __('messageMK.transfer1') }}</p>
                <p><i class="fas fa-star pe-3"></i>{{ __('messageMK.transfer2') }}</p>
                <p><i class="fas fa-star pe-3"></i>{{ __('messageMK.transfer3') }}</p>
                <p><i class="fas fa-star pe-3"></i>{{ __('messageMK.used2') }}</p>
            </div>
        </div>
    </section>
@endsection
