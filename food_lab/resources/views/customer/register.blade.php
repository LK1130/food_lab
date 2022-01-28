@extends('COMMON.layout.layout_cusotmer_2')

@section('google')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-signin-client_id" content="608465627296-6kuk054hln5v9k61t8d7vkpo7jqej6u7.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async></script>
@endsection

@section('facebook')
{{--    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>--}}
@endsection

@section('js')
    <link href="{{ url('css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <script src="{{ url('js/bootstrap-tagsinput.min.js') }}" defer></script>
    <script src="{{ url('js/adminProductTagsInput.js') }}" defer></script>
    <script src="{{ url('js/customerRegister.js') }}" type="text/javascript" defer></script>
@endsection

@section('title','Food Lab')

@section('body')
    {{-- Start Access Section--}}
    <section class="accesses">
        <div class="d-flex ps-5 py-4">
            <div class="me-4 mt-3">
                <a href="/"><i class="fas fa-arrow-left text-white arrows"></i></a>
            </div>
            <div>
                <img src="{{ url('/img/logo.png') }}" alt="logo"/>
            </div>
        </div>

        {{-- start register header --}}
        <div class="d-flex ms-5 mb-3 register-headers">
            <div>
                <p class="fw-bolder pb-3 creates">{{ __('messageMK.createAccount') }}</p>
                <div class="d-flex justify-content-around align-items-center text-white sign-withs">
                    <p class="btn g-signin2" data-onsuccess="onSignIn"><i class="fab fa-google"></i>{{ __('messageMK.signUpWithGoogle') }}</p>
                    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                    </fb:login-button>
                </div>
            </div>
            <div class="welcome-registers">
                <p class="text-center creates">{{ __('messageMK.welcomeFrom') }} <span class="d-block ms-5 ps-5">{{ __('messageMK.ourFoodLab') }}</span></p>
            </div>
        </div>
        {{-- end register header --}}

        {{-- start register form --}}
        <div class="d-flex register-forms">
            <form action="/access" method="post" class="d-flex flex-column align-items-center justify-content-start">
                @csrf
                <div class="inputs">
                    <input type="text" id="username" class="form-control" name="username" placeholder="{{ __('messageMK.fullName') }}" value="{{ old('username') }}" autocomplete="off"/>
                    @error('username')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs">
                    <input type="text" id="phone" class="form-control" name="phone" placeholder="{{ __('messageMK.phone') }}" value="{{ old('phone') }}"   autocomplete="off"/>
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs">
                    <input type="email" id="email" class="form-control" name="email" placeholder="{{ __('messageMK.email') }}" value="{{ old('email') }}" autocomplete="off"/>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs">
                    <select class="form-select selects" id="addressTownship" name="addressTownship" >
                        <option class="township-options" selected disabled>{{ __('messageMK.address(Township)') }}</option>
                        @forelse ($townshipnames as $townshipname)
                            <option class="township-options" value="{{ $townshipname->id }}">{{ $townshipname->township_name }}</option>
                        @empty
                            <option disabled>No Township</option>
                        @endforelse 
                    </select>
                    @error('addressTownship')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs">
                    <select class="form-select selects" id="addressState" name="addressState">
                        <option  class="township-options" value="0" selected>{{ __('messageMK.address(State)') }}</option>
                        @forelse ($staenames as $staename)
                            <option  class="township-options" value="{{ $staename->id }}">{{ $staename->state_name }}</option>
                        @empty
                            <option  class="township-options" disabled>No data</option>
                        @endforelse
                    </select>
                    @error('addressState')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs">
                    <input type="text" id="addressNo" class="form-control" name="addressNo" placeholder="{{ __('messageMK.address(street)') }}" value="{{ old('addressNo') }}" autocomplete="off"/>
                    @error('addressNo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs">
                    <div class="passwords">
                        <input type="password" id="password" class="form-control" name="password" placeholder="{{ __('messageMK.password') }}" value="{{ old('password') }}" autocomplete="off"/>
                        <i class="fas fa-eye-slash pwd-eye-slash"></i>
                        <i class="far fa-eye pwd-eye"></i>
                    </div>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs">
                    <div class="passwords">
                        <input type="password" id="cPassword" class="form-control" name="cPassword" placeholder="{{ __('messageMK.confirmPassword') }}" autocomplete="off"/>
                        <i class="fas fa-eye-slash cpwd-eye-slash"></i>
                        <i class="far fa-eye cpwd-eye"></i>
                    </div>
                    @error('cPassword')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs">
                    <input type="button" class="form-control text-center createAccs" id="createAccs" value="{{ __('messageMK.createAccount') }}"  data-bs-toggle="modal" data-bs-target="#modal"/>
                </div>
                {{-- start modal --}}
                <div class="modal fade text-white modals" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content contents">
                            <div class="modal-header justify-content-end">
                                <button type="submit" class="submits">{{ __('messageMK.Skip') }}</button>
                            </div>
                            <div class="modal-body">
                                <fieldset class="border border-3 rounded">
                                    <legend class="modal-headers">{{ __('messageMK.favouriteType') }}</legend>
                                    <div class="m-3">
                                        <input type="text" class="modal-inputs @error('type') border-danger @enderror" name="type" value="@foreach ($types as $type)
                                            {{ $type->favourite_food }},
                                        @endforeach" data-role="tagsinput" id="tags" class="form-control">
                                    </div>
                                </fieldset>
                                <fieldset class="border border-3 rounded">
                                    <legend class="modal-headers">{{ __('messageMK.favouriteTaste') }}</legend>
                                    <div class="m-3">
                                        <select class="modal-selects  @error('taste') border-danger @enderror" name="taste">
                                            <option selected disabled>Favourite your Taste</option>
                                            @forelse ($tastenames as $tastename)
                                                <option value="{{ $tastename->id }}">{{ $tastename->taste }}</option>
                                            @empty
                                                <option disabled>No data</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset class="border border-3 rounded">
                                    <legend  class="modal-headers">{{ __('messageMK.Note') }}</legend>
                                    <div class="m-3  @error('note') border-danger @enderror">
                                        <textarea name="note"></textarea>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="submit" class="btn btn-primary">{{ __('messageMK.submit') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal--}}
            </form>
            <div class="access-imgs">
                <img src="{{ url('img/menu3.png') }}" width="90%"/>
            </div>
        </div>
        {{-- end register form --}}

        <div class="ms-5 py-2 have-accs">
            <p>{{ __('messageMK.alreadyHaveAnAccount') }} <a href="/login" class="ms-3">{{ __('messageMK.loginInHere') }}</a></p>
        </div>
    </section>

@endsection
