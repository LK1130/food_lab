@extends('COMMON.layout.layout_cusotmer_2')

@section('google')
    <script src="https://apis.google.com/js/platform.js" async></script>
@endsection

@section('facebook')
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
@endsection

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
        <div class="d-flex ms-5 register-headers">
            <div>
                <p class="fw-bolder pb-3 creates">Create Account</p>
                <div class="d-flex justify-content-around align-items-center text-white sign-withs">
                    <div class="btn g-signin2" data-onsuccess="onSignIn"><i class="fab fa-google"></i> Sign Up With Google</div>
                    <a href="#" class="btn"><i class="fab fa-facebook"></i> Sign Up With Facebook</a>
                </div>
                <p class="text-center fw-bolder py-2 creates">OR</p>
            </div>
            <div class="welcome-registers">
                <p class="text-center creates">Welcome From <span class="d-block ms-5 ps-5">Our Food Lab</span></p>
            </div>
        </div>
        {{-- end register header --}}

        {{-- start register form --}}
        <div class="d-flex register-forms">
            <form action="/access" method="post" class="d-flex flex-column align-items-center justify-content-start">
                @csrf
                <div class="inputs">
                    <input type="text" id="username" class="form-control" name="username" placeholder="Full Name" value="{{ old('username') }}" autocomplete="off"/>
                    @error('username')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs">
                    <input type="text" id="phone" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone') }}"   autocomplete="off"/>
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs">
                    <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="off"/>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs">
                    <input type="text" id="addressNo" class="form-control" name="addressNo" placeholder="Address(No)" value="{{ old('addressNo') }}" autocomplete="off"/>
                    @error('addressNo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs">
                    <input type="text" id="addressTownship" class="form-control" name="addressTownship" placeholder="Address(Township)" value="{{ old('addressTownship') }}" autocomplete="off"/>
                    @error('addressTownship')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs">
                    <input type="text" id="addressCity" class="form-control" name="addressCity" placeholder="address(City)" value="{{ old('addressCity') }}" autocomplete="off"/>
                    @error('addressCity')
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
                    <input type="password" id="cPassword" class="form-control" name="cPassword" placeholder="Confirm Password" autocomplete="off"/>
                    @error('cPassword')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputs">
                    <input type="submit" class="form-control text-center" value="Create Account"  data-bs-toggle="modal" data-bs-target="#modal"/>
                </div>
            </form>
            <div>
                <img src="{{ url('img/menu3.png') }}" width="90%"/>
            </div>
        </div>
        {{-- end register form --}}

        <div class="ms-5 py-2 have-accs">
            <p>Already Have An Account ? <a href="/login" class="ms-3">Login in here</a></p>
        </div>
    </section>

@endsection
