@extends('COMMON.layout.layout_admin')
@section('title', 'Site Manage')

@section('css')

    <link rel="stylesheet" href="{{ URL::asset('css/adminLayout.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/commonAdmincss.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/siteManage.css') }}" />
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="{{ URL::asset('js/siteManage.js') }}"></script>
@endsection
@section('body')
    {{-- Starts Header Buttons --}}
    <div class="navBar">
        <a href="{{ url('adminLogin') }}"><button
                class="btn text-light   btncust">{{ __('messageZY.loginManage') }}</button></a>
        <a href="{{ url('coinrate') }}"><button
                class="btn text-light   btncust">{{ __('messageZY.coinRate') }}</button></a>
        <a href="{{ url('siteManage') }}"><button
                class="btn text-light  active btncust">{{ __('messageZY.siteManager') }}</button></a>
    </div>
    {{-- Starts Table --}}
    <select class="select" id="select">
        <option value="siteManage" selected>{{ __('messageZY.siteManage') }}</option>
        <option value="app">{{ __('messageZY.appManage') }}</option>
        <option value="news">{{ __('messageZY.newsmanage') }}</option>
    </select>
    <div id="site">
        <h2>{{ __('messageZY.siteedit') }}</h2>
        <form action="siteManage/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="rowInput">
                <label for="name">{{ __('messageZY.sitename') }}</label>
                <div class="input-group mb-3">
                    <input type="text" id="name" name="name" value="{{ $siteInfo == null ? '' : $siteInfo->site_name }}">
                    @error('name')
                        <li class="text-danger ">{{ $message }}</li>
                    @enderror
                </div>

            </div>
            <div class="rowInput">
                <label for="logo">{{ __('messageZY.sitelogo') }}</label>
                <div class="showImageInitial">
                    <h2>{{ __('messageZY.sitecurrentimg') }}</h2>
                    <img id="imgInitial" src="/storage/siteLogo/{{ $siteInfo == null ? '' : $siteInfo->site_logo }}"
                        class="py-2 px-2" />
                </div>
                <div class="showImageChange">
                    <h2>{{ __('messageZY.yourimage') }}</h2>
                    <img id="imageChange" src="" class="py-2 px-2" />
                </div>
                <div class="input-group mb-3">
                    <input type="file" id="logo" name="logo" value="{{ $siteInfo == null ? '' : $siteInfo->site_logo }}">
                </div>
            </div>
            <div class="rowInput">
                <label for="policy">{{ __('messageZY.privacy') }}</label>
                <div class="input-group mb-3">
                    <textarea id="policy"
                        name="policy">{{ $siteInfo == null ? '' : $siteInfo->privacy_policy }}</textarea>
                    @error('policy')
                        <li class="text-danger ">{{ $message }}</li>
                    @enderror
                </div>

            </div>
            <div class="rowInput">
                <div class="checkbox">
                    <label for="maintenance">{{ __('messageZY.maintenance') }}</label>
                    @if ($siteInfo == null ? '' : $siteInfo->maintenance == 0)
                        <input type="checkbox" id="maintenance">
                    @else
                        <input type="checkbox" id="maintenance" checked>
                    @endif
                    <input type="text" id="mvalue" value="" name="maintenance">
                </div>
            </div>
            <button type="submit" class="save">{{ __('messageZY.save') }}</button>
        </form>
    </div>

@endsection
