@extends('COMMON.layout.layout_admin')
@section('title', 'Admin Edit')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/adminLayout.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/commonAdmincss.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/adminAdd.css') }}" />
@endsection

@section('script')
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ URL::asset('js/adminAdd.js') }}"></script>
@endsection
@section('body')
    {{-- Starts Header Buttons --}}
    <div class="navBar">
        <a href="{{ url('adminLogin') }}"><button
                class="btn text-light  active btncust">{{ __('messageZY.loginManage') }}</button></a>
        <a href="{{ url('coinrate') }}"><button
                class="btn text-light   btncust">{{ __('messageZY.coinRate') }}</button></a>
        <a href="{{ url('siteManage') }}"><button
                class="btn text-light  btncust">{{ __('messageZY.siteManager') }}</button></a>
    </div>
    {{-- Starts Form --}}
    <a href="{{ url('adminLogin') }}"><button class="checked btn text-light addAdminButton active btncust mt-4 "
            id="appBack4">{{ __('messageZY.back') }}</button></a>
    <div class="adminAddForm">

        <form action="{{ route('adminLogin.update', $admins->id) }}" method="POST">
            @csrf
            @method('PUT')
            <p class="formHeader">{{ __('messageZY.editAdmin') }} </p>
            <div>
                <div class="form-group">
                    <label for="username">{{ __('messageZY.username') }}</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="{{ $admins->ad_name }}">
                    @error('username')
                        <li class="text-danger ">{{ $message }}</li>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">{{ __('messageZY.password') }}</label>
                    <ion-icon name="eye-off-outline" id="icon"></ion-icon>
                    <input type="password" class="form-control" id="password" name="password" value="">
                    @error('password')
                        <li class="text-danger ">{{ $message }}</li>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">{{ __('messageZY.role') }}</label>
                    <select class="form-control" id="role" name="role">
                        {{ $role = $admins->ad_role }}
                        @if ($role == 'SA')
                            <option selected>{{ __('messageZY.sa') }}</option>
                            <option>{{ __('messageZY.ad') }}</option>
                            <option>{{ __('messageZY.ka') }}</option>
                            <option>{{ __('messageZY.dl') }}</option>
                        @endif
                        @if ($role == 'AD')
                            <option>{{ __('messageZY.sa') }}</option>
                            <option selected>{{ __('messageZY.ad') }}</option>
                            <option>{{ __('messageZY.ka') }}</option>
                            <option>{{ __('messageZY.dl') }}</option>
                        @endif
                        @if ($role == 'KA')
                            <option>{{ __('messageZY.sa') }}</option>
                            <option>{{ __('messageZY.ad') }}</option>
                            <option selected>{{ __('messageZY.ka') }}</option>
                            <option>{{ __('messageZY.dl') }}</option>
                        @endif
                        @if ($role == 'DL')
                            <option>{{ __('messageZY.sa') }}</option>
                            <option>{{ __('messageZY.ad') }}</option>
                            <option>{{ __('messageZY.ka') }}</option>
                            <option selected>{{ __('messageZY.dl') }}</option>
                        @endif
                    </select>
                    @error('role')
                        <li class="text-danger ">{{ $message }}</li>
                    @enderror
                </div>
                <div class="form-group mt-4">

                    <label for="validation">{{ __('messageZY.valid') }}</label>
                    @if ($admins->ad_valid == 1)
                        <input type="checkbox" class="mt-2" id="validate" checked>
                    @else
                        <input type="checkbox" class="mt-2" id="validate">
                    @endif

                    @error('validate')
                        <li class="text-danger ">{{ $message }}</li>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit"
                        class="btn text-light addAdminButton active btncust mt-5">{{ __('messageZY.editAdmin') }}</button>

                </div>
            </div>
            <input type="text" id="validateInteger" value="" name="validate">
        </form>

    </div>

@endsection
