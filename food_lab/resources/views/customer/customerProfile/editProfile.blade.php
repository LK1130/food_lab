@extends('COMMON.layout.layout_cusotmer_2')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('css/commonCustomer.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/customerEditProfile.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="{{ url('css/customerUpdateProfile.css') }}" rel="stylesheet" type="text/css" /> --}}
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <script src="{{ url('js/bootstrap-tagsinput.min.js') }}" defer></script>
    <script src="{{ url('js/adminProductTagsInput.js') }}" defer></script>
    <script src="{{ url('js/updateProfile.js') }}" type="text/javascript" defer></script>
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
@endsection
@section('title', 'Edit Profile')

@section('body')
    {{-- Start Profile Edit Section --}}
    <div class="body">
        
        <div class="headerEditProfile ms-5 mt-3">
            <a href="{{ url('/') }}"><i class="fas fa-arrow-circle-left fs-1 me-4 text-light" id="back"></i></a>
            <a href="{{ url('/') }}"><img src="{{ url('img/logo.png') }}" /></a>
        </div>
        {{-- edit profile --}}
        <div id="editProfile">
            <div class="titleEditProfile d-flex justify-content-center ">
                <p class="fw-bold">{{ __('messageZY.editprofile') }}</p>
            </div>
            <form action="{{ route('editprofile.update', $user->cid) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="bodyEditProfile d-flex flex-row justify-content-center">

                    <div class="d-flex me-3 ms-3 mt-0 mb-1 infos">
                        <i class="fas fa-user fs-3 me-4 mt-2 text-light"></i>
                        <div class="InputParent">
                            <input type="text" name="username" id="username" class="InputChild"
                                value="{{ $user->nickname }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="d-flex  me-3 ms-3 mt-0 mb-1 infos">
                        <i class="fas fa-pen-square fs-3 me-4 mt-2 text-light"></i>
                        <div class="InputParent">
                            <input type="text" name="bio" id="nickname" class="InputChild" value="{{ $user->bio }}"
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="d-flex  me-3 ms-3 mt-0 mb-1 infos">
                        <i class="fas fa-address-book fs-3 me-4 mt-2 text-light"></i>
                        <div class="InputParent">
                            <select name="township" id="Taste" class="InputChild">
                                @php
                                    $userTownship = $user->address1;
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
                                    <option>{{ __('messageZY.notownship') }} .</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="d-flex  me-3 ms-3 mt-0 mb-1 infos">
                        <i class="fas fa-address-book fs-3 me-4 mt-2 text-light"></i>
                        <div class="InputParent">
                            <select name="state" id="Taste" class="InputChild">
                                @php
                                    $userState = $user->address2;
                                @endphp
                                @forelse($states as $state)
                                    @if ($userState == $state->id)
                                        <option value="{{ $state->id }}" class="text-dark" selected>
                                            {{ $state->state_name }}</option>
                                    @else
                                        <option value="{{ $state->id }}" class="text-dark">
                                            {{ $state->state_name }}
                                        </option>
                                    @endif
                                @empty
                                    <option>{{ __('messageZY.notownship') }} .</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="d-flex  me-3 ms-3 mt-0 mb-1 infos">
                        <i class="fas fa-address-book fs-3 me-4 mt-2 text-light"></i>
                        <div class="InputParent">
                            <input type="text" name="addressNumber" id="addressNumber" class="InputChild"
                                value="{{ $user->address3 }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="d-flex  me-3 ms-3 mt-0 mb-1 infos">
                        <i class="fas fa-phone-alt fs-3 me-4 mt-2 text-light"></i>
                        <div class="InputParent">
                            <input type="number" name="phonenumber" id="phonenumber" class="InputChild"
                                value="{{ $user->phone }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="d-flex  me-3 ms-3 mt-0 mb-1 infos">
                        <i class="fas fa-envelope fs-3 me-4 mt-2 text-light"></i>
                        <div class="InputParent">
                            <input type="text" id="email" class="InputChild" value="{{ $user->email }}" readonly>
                        </div>
                    </div>

                    <div class="d-flex  me-3 ms-3 mt-0 mb-2 infos" id="favType">
                        <i class="fas fa-grin-hearts fs-3 me-4 mt-2 text-light"></i>
                        <div class="InputParent" id="favType2">
                            <input type="text" name="favtype" value="{{ $user->fav_type }}" data-role="tagsinput">
                        </div>
                    </div>
                    <div class="d-flex  me-3 ms-3 mt-0 mb-1 infos">
                        <i class="fas fa-dizzy fs-3 me-4 mt-2 text-light"></i>
                        <div class="InputParent">
                            <input type="text" name="Allergic" id="Allergic" class="InputChild"
                                value="{{ $user->allergic }}" autocomplete="off">
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
                    <div class="btnDiv">
                        <button class="btn updateButton "  >{{ __('messageZY.updateprofile') }}</button>
                        <button class="btn changePassword" id="changePasswordBtn">{{ __('messageZY.changepassword') }}</button>
                    <div>
                </div>
            </form>
        </div>

         {{-- Update Profile --}}
        
        {{-- <div id="updateProfile">
            <div class="headerUpdateProfile ms-5 mt-3">
                <a href="{{ url('/') }}"><i class="fas fa-arrow-circle-left fs-1 me-4 text-light" id="back"></i></a>
                <a href="{{ url('/') }}"><img src="{{ url('img/logo.png') }}" /></a>
            </div>
            <div class="titleUpdateProfile d-flex justify-content-center ">
                <p class="fw-bold">{{ __('messageZY.updateprofile') }}</p>
            </div>
                <div class="bodyUpdateProfile d-flex flex-column justify-content-center">

                    <div class="d-flex me-3 ms-3 mt-0 mb-4 infos">
                        <i class="fas fa-user fs-3 me-4 mt-2 text-light"></i>
                        <div class="InputParent1">
                            <input type="text" name="username" id="username" class="InputChild" value="{{ $user->nickname }}"
                        disabled>
                        </div>
                    </div>
                    <div class="d-flex  me-3 ms-3 mt-0 mb-4 infos">
                        <i class="fas fa-phone-alt fs-3 me-4 mt-2  text-light"></i>
                        <div class="InputParent1">
                            <input type="number" name="phonenumber" id="phonenumber" class="InputChild"
                            value="{{ $user->phone }}" disabled>
                        </div>
                    </div>
                    <div class="d-flex me-3 ms-3 mt-0 mb-4 infos">
                        <i class="fas fa-address-book fs-3 me-4 mt-2 text-light"></i>
                        <div class="InputParent1">
                            <input type="text" id="address" class="InputChild"
                                value="{{ $user->township_name }}/{{ $user->state_name }}/ ({{ $user->address3 }})"
                                disabled>
                        </div>
                    </div>
                    <div class="d-flex  me-3 ms-3 mt-0 mb-4 infos">
                        <i class="fas fa-envelope fs-3 me-4 mt-2 text-light"></i>
                        <div class="InputParent1">
                            <input type="text" name="email" id="email" class="InputChild" value="{{ $user->email }}"
                            disabled>
                        </div>
                    </div>
                    <div class="btnDiv">
                        <button class="btn editProfile">{{ __('messageZY.editprofile') }}</button>
                        <button class="btn changePassword">{{ __('messageZY.changepassword') }}</button>
                    <div>
                </div>
              
               
        </div> --}}

        {{-- to change password --}}
        <div class="alertBox" id="alertBox">
            <i class="fas fa-arrow-circle-left fs-1 mt-3 ms-3 text-light" id="back"></i>
            <form action="{{ route('updateprofile.update', $user->cid) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="absolute d-flex flex-column justify-content-center alertUpdate">
                    @error('oldpassword')
                        <span class="errorIcon"><i
                                class="fas fa-exclamation-circle fs-3 mt-2 errorPassword text-danger"></i></span>
                    @enderror
                    <p class="InputTitle" id="old">{{ __('messageZY.oldpassword') }}</p>
                    <div class="d-flex  me-3 ms-3  infos">
                        <div class="InputParentAlert">
                            <input type="text" name="oldpassword" class="InputChild" autocomplete="off">

                        </div>
                    </div>
                    @error('newpassword')
                        <span class="errorIcon"><i
                                class="fas fa-exclamation-circle fs-3 mt-2 errorPassword text-danger"></i></span>
                    @enderror
                    <p class="InputTitle" id="new">{{ __('messageZY.newpassword') }}</p>
                    <div class="d-flex  me-3 ms-3  infos">

                        <div class="InputParentAlert">
                            <input type="text" name="newpassword" class="InputChild" autocomplete="off">
                        </div>
                    </div>
                    @error('confirmpassword')
                        <span class="errorIcon"><i
                                class="fas fa-exclamation-circle fs-3 mt-2 errorPassword text-danger"></i></span>
                    @enderror
                    <p class="InputTitle" id="confirm">{{ __('messageZY.confirmnewpassword') }}</p>
                    <div class="d-flex  me-3 ms-3  infos1">
                        <div class="InputParentAlert">
                            <input type="text" name="confirmpassword" class="InputChild1" autocomplete="off">

                        </div>
                    </div>

                </div>
                <button class="btn updateButtonAlert " id="updatePassword">{{ __('messageZY.updatepassword') }}</button>
            </form>
        </div>
    </div>

    {{-- End Profile Edit Section --}}
@endsection
