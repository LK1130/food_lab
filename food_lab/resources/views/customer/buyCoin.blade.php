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
                <h2 class="coincharge">Coin Charge</h2>
                <form action="buycoinForm" method="POST" class="coinchargeform" enctype="multipart/form-data">
                    @csrf
                    <div class="col-8 d-flex coininput">
                        <span class="col-4"><i class="coinCal fas fa-coins"></i> Coin</span>
                        <div class="col-4">
                            <input type="number" id="coinChargeinput" name="coinput">
                            @error('coinput')
                                <span class="text-danger">Coin must be lower than 1000</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-8 d-flex choosephoto">
                        <span class="col-4"><i class="fileUpload far fa-file-alt"></i> Choose Photo</span>
                        <div class="col-6">
                            <input class="fileuploadInput form-control" type="file" id="formFile" name="fileimage">
                        </div>
                    </div>
                    <button type="submit" class="submitbtn btn btn-danger">Submit</button>
                    <button type="reset" class="cancelbtn btn btn-light">Cancel</button>
                </form>
            </div>
            <div class="coinrule">
                <h2 class="coinRule">Coin Rule</h2>
                <ul class="coinList">
                    <li>1 coin equal <span id="coinratedata" class="coinratedata">{{ $coinrateData->rate }}</span>kyats
                    </li>
                    <li>This coin can be used only on this website</li>
                    <li>This coin cannot be transfered</li>
                </ul>
                <h2 class="coinRule">Payment Accounts</h2>
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
                <h2 class="coinCalculator">Coin Calculator</h2>
                <div class="coinCaldiv">
                    <input type="number" name="" id="ccalcul" class="ccalcul" placeholder="Coin">
                    <span class="equalIcon">=</span>
                    <input type="number" name="" id="mmkcalcul" class="ccalcul" placeholder="MMK">
                </div>
            </div>
        </div>
    </section>
@endsection
