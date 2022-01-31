@extends('COMMON.layout.layout_cusotmer_2')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('css/commonCustomer.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/customerEditProfile.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title', 'Edit Profile')

@section('body')
    {{-- Start Profile Edit Section --}}
    <div class="body">
        <div class="headerEditProfile ms-5 mt-3">
            <a href="{{ url('/') }}"><i class="fas fa-arrow-circle-left fs-1 me-4 text-light" id="back"></i></a>
            <a href="{{ url('/') }}"><img src="{{ url('img/logo.png') }}" /></a>
        </div>
        <div class="titleEditProfile d-flex justify-content-center ">
            <p class="fw-bold">{{ __('messageZY.editprofile') }}</p>
        </div>
        <form action="">
            <div class="bodyEditProfile d-flex flex-row justify-content-center">

                <div class="d-flex me-3 ms-3 mt-0 mb-1 infos">
                    <i class="fas fa-user fs-3 me-4 mt-2 text-light"></i>
                    <div class="InputParent">
                        <input type="text" name="username" id="username" class="InputChild"
                            value="{{ $user->nickname }}">
                    </div>
                </div>
                <div class="d-flex  me-3 ms-3 mt-0 mb-1 infos">
                    <i class="fas fa-pen-square fs-3 me-4 mt-2 text-light"></i>
                    <div class="InputParent">
                        <input type="text" name="nickname" id="nickname" class="InputChild" value="{{ $user->bio }}">
                    </div>
                </div>
                <div class="d-flex  me-3 ms-3 mt-0 mb-1 infos">
                    <i class="fas fa-address-book fs-3 me-4 mt-2 text-light"></i>
                    <div class="InputParent">
                        <select name="Taste" id="Taste" class="InputChild">
                            @php
                                $userTownship = $user->township;
                            @endphp
                            @forelse($townships as $township)
                                @if ($userTownship == $township->id)
                                    <option value="{{ $township->id }}" class="text-dark" selected>
                                        {{ $township->township_name }}</option>
                                @else
                                    <option value="{{ $township->id }}" class="text-dark">
                                        {{ $township->township_name }}
                                    </option>
                                @endif
                            @empty
                                <option>{{ __('messageZY.notaste') }} .</option>
                            @endforelse

                        </select>
                    </div>
                </div>
                <div class="d-flex  me-3 ms-3 mt-0 mb-1 infos">
                    <i class="fas fa-phone-alt fs-3 me-4 mt-2 text-light"></i>
                    <div class="InputParent">
                        <input type="number" name="phonenumber" id="phonenumber" class="InputChild"
                            value="{{ $user->phone }}">
                    </div>
                </div>
                <div class="d-flex  me-3 ms-3 mt-0 mb-1 infos">
                    <i class="fas fa-envelope fs-3 me-4 mt-2 text-light"></i>
                    <div class="InputParent">
                        <input type="text" name="email" id="email" class="InputChild" value="{{ $user->email }}">
                    </div>
                </div>

                <div class="d-flex  me-3 ms-3 mt-0 mb-1 infos">
                    <i class="fas fa-grin-hearts fs-3 me-4 mt-2 text-light"></i>
                    <div class="InputParent">
                        <input type="text" name="Likes" id="Likes" class="InputChild" data-role="tagsinput"
                            value="{{ $user->favourite_food }}">
                    </div>
                </div>
                <div class="d-flex  me-3 ms-3 mt-0 mb-1 infos">
                    <i class="fas fa-dizzy fs-3 me-4 mt-2 text-light"></i>
                    <div class="InputParent">
                        <input type="text" name="Allergic" id="Allergic" class="InputChild"
                            value="{{ $user->allergic }}">
                    </div>
                </div>
                <div class="d-flex  me-3 ms-3 mt-0 mb-1 infos">
                    <i class="fas fa-utensils fs-3 me-4 mt-2 text-light"></i>
                    <div class="InputParent">
                        <select name="Taste" id="Taste" class="InputChild">
                            @php
                                $userTaste = $user->taste;
                            @endphp
                            @forelse($tastes as $taste)
                                @if ($userTaste == $taste->id)
                                    <option value="{{ $taste->id }}" class="text-dark" selected>
                                        {{ $taste->taste }}</option>
                                @else
                                    <option value="{{ $taste->id }}" class="text-dark">{{ $taste->taste }}
                                    </option>
                                @endif
                            @empty
                                <option>{{ __('messageZY.notaste') }} .</option>
                            @endforelse
                        </select>

                    </div>
                </div>
                <button class="btn updateButton">{{ __('messageZY.updateprofile') }}</button>
            </div>
        </form>
    </div>

    {{-- End Profile Edit Section --}}
@endsection
