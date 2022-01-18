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
                <p class="text-center creates">Welcome From <span class="d-block ms-5 ps-5">Our Food Lab</span></p>
            </div>
            <div>
                <p class="fw-bolder pb-3 creates">Signin Form</p>
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
                    <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="off"/>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}" autocomplete="off"/>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs">
                    <input type="submit" class="form-control text-center" value="Sign in"/>
                </div>
                <div class="ms-5 py-2 have-accs">
                    <p>If you doesn't have Any account ? <a href="/access" class="ms-3">Sign Up here</a></p>
                </div>
            </form>
        </div>
        {{-- end register form --}}
    </section>
    {{-- End Login Section--}}
@endsection
