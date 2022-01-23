@extends('COMMON.layout.layout_cusotmer_2')

@section('title','Food Lab')

@section('body')
    {{-- Start Report Form Section --}}
    <section class="forms">
        <div class="d-flex ps-5 py-4">
            <div class="me-4 mt-3">
                <a href="/"><i class="fas fa-arrow-left text-white arrows"></i></a>
            </div>
            <div>
                <img src="{{ url('/img/logo.png') }}" alt="logo"/>
            </div>
        </div>
        
        <div class="d-flex flex-column justify-content-center align-items-center suggests">
            <p class="fw-bolder form-headers">{{ __('messageMK.suggestForm') }}</p>
            <form action="/suggest" method="post">
                @csrf
                <div class="d-flex mb-5 errors">
                    <label class="fw-bold">{{ __('messageMK.suggestionType') }}</label>
                    <select class="form-select" name='type'>
                        <option selected>Open this select menu</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->suggest_type }}</option>
                        @endforeach
                    </select>
                    @error('type')
                        <span class="fw-bloder text-danger error-spans">Plesae Choose one</span>
                    @enderror
                </div>
                <div class="d-flex mb-5 errors">
                    <label class="fw-bold" id="details">{{ __('messageMK.suggestDetails') }}</label>
                    <textarea class="form-control" id="details" name="details"></textarea>
                    @error('details')
                        <span class="fw-bolder text-danger error-spans">{{ $message }}</span>
                    @enderror
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
