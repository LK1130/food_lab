@extends('COMMON.layout.layout_customer')

@section('script')
    <script src="{{ url('js/buyCoin.js') }}" type="text/javascript" defer></script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="{{ url('css/buyCoin.css') }}" rel="stylesheet" type="text/css" />

@endsection


@section('header')
    <section>

        <div class="container">
            <div class="coinchargeformdiv">
                <h2 class="coincharge">{{ __('messageCPPK.Coin Charge') }}</h2>
                <form action="buycoinForm" method="POST" class="coinchargeform" enctype="multipart/form-data">
                    @csrf
                    <div class="col-8 d-flex coininput">
                        <span class="col-7"><i class="coinCal fas fa-coins"></i> {{ __('messageCPPK.Coin') }}</span>
                        <div class="col-7">
                                <input type="number" id="coinChargeinput" name="coinput">
                            @error('coinput')
                                <span class="text-danger">Coin must be lower than 1000</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-8 d-flex choosephoto">
                        <span class="col-7"><i class="fileUpload far fa-file-alt"></i> {{ __('messageCPPK.Choose Photo') }}</span>
                        <div class="col-7">
                            <input class="fileuploadInput form-control" type="file" id="formFile" name="fileimage">
                            @error('file')
                                <span class="text-danger">Your file size is too big.</span>
                            @enderror
                        </div>
                    </div>
                    <a href="/" class="cancelbtn btn btn-light">{{ __('messageCPPK.Cancel') }}</a>
                    <button type="submit" class="submitbtn btn btn-danger">{{ __('messageCPPK.Submit') }}</button>
                </form>
            </div>
            <div class="coinrule">
                <h2 class="coinRule">{{ __('messageCPPK.Coin Rule') }}</h2>
                <ul class="coinList">
                    <li>1 coin equal <span id="coinratedata" class="coinratedata">{{ $coinrateData->rate }}</span> Kyats
                    </li>
                    <li>This coin can be used only on this website</li>
                    <li>This coin cannot be transfered</li>
                </ul>
                <h2 class="coinRule">{{ __('messageCPPK.Payment Accounts') }}</h2>
                <table>
                    <ul class="coinList">
                        @forelse ($paymentAccount as $accounts)
                            <li>{{ $accounts->payment_name }} <span><i class="fas fa-arrow-right"></i></span>
                                {{ $accounts->account_name }}</li>
                        @empty

                        @endforelse
                    </ul>
                </table>
                <hr class="coinRulehr">
                <h2 class="coinCalculator">{{ __('messageCPPK.Coin Calculator') }}</h2>
                <div class="coinCaldiv">
                    <input type="number" name="" id="ccalcul" class="ccalcul" placeholder="Coin">
                    <span class="equalIcon">=</span>
                    <input type="number" name="" id="mmkcalcul" class="ccalcul" placeholder="MMK">
                </div>
            </div>
        </div>
        <div class="container-fluid mt-5 p-3">
            <div class="d-flex justify-content-center">
                <p class="copy">{{ __('messageCPPK.Copyright') }}</p>
            </div>
        </div>
    </section>
@endsection
