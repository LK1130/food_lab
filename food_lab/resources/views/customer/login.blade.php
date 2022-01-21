@extends('COMMON.layout.layout_cusotmer_2')

@section('body')
    {{-- Start Login Section--}}
    <section class="login">
        <div class="d-flex ps-5 py-4">
            <div class="me-4 mt-3">
                <a href="/"><i class="fas fa-arrow-left text-white arrows"></i></a>
            </div>
            <div>
                <img src="{{ url('/img/logo.png') }}" alt="logo"/>
            </div>
        </div>

        {{-- start register header --}}
        <div class="d-flex ms-5 register-headers">
            <div class="welcome-registers">
                <p class="text-center creates">{{ __('messageMK.welcomeFrom') }} <span class="d-block ms-5 ps-5">{{ __('messageMK.ourFoodLab') }}</span></p>
            </div>
            <div>
                <p class="fw-bolder pb-3 creates">{{ __('messageMK.signinForm') }}</p>
            </div>
        </div>
        {{-- end register header --}}

        {{-- start register form --}}
        <div class="d-flex register-forms">
            <div>
                <img src="{{ url('img/menu3.png') }}" width="90%"/>
            </div>
            <form action="/login" method="post" class="d-flex flex-column align-items-center justify-content-center">
                @csrf
                <div class="inputs">
                    <input type="email" id="email" class="form-control" name="email" placeholder="{{ __('messageMK.email') }}" value="{{ old('email') }}" autocomplete="off"/>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs passwords">
                    <input type="password" id="password" class="form-control" name="password" placeholder="{{ __('messageMK.password') }}" value="{{ old('password') }}" autocomplete="off"/>
                    <i class="fas fa-eye-slash pwd-eye-slash"></i>
                    <i class="far fa-eye pwd-eye"></i>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs">
                    <input type="submit" class="form-control text-center createAccs" value="{{ __('messageMK.signIn') }}"/>
                </div>
                <div class="ms-5 py-2 have-accs">
                    <p>{{ __('messageMK.Ifyoudoesn\'thaveAnyaccount') }} ? <a href="/access" class="ms-3">{{ __('messageMK.signUpHere') }}</a></p>
                </div>
            </form>
        </div>
        {{-- end register form --}}
    </section>
    {{-- End Login Section--}}
@endsection
