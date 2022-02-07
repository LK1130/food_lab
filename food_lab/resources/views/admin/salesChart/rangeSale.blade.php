@extends('COMMON.layout.layout_admin')

@section('title')
    {{ __('messageCPPK.Range Sales') }}
@endsection

@section('css')
    <!-- Join Css -->
    <link rel="stylesheet" href="css/adminSalesChart.css" />
@endsection

@section('script')
    <!-- For Jquary Cdn-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- For Apex Charts Cdn-->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection

@section('body')
    <div class="col-md-10">
        <div class="mt-4">
            <!-- Daily Sales Button -->
            <a href="dailyChart" class="me-5"><button id="dailySales"
                    class="btn text-light  inactive btncust">{{ __('messageCPPK.Daily') }}</button></a>
            <!--Monthly Sales Button -->
            <a href="monthlyChart" class="me-5"><button id="monthlySales"
                    class="btn text-light inactive btncust">{{ __('messageCPPK.Monthly') }}</button></a>
            <!-- Yearly Sales Button -->
            <a href="yearlyChart" class="me-5"><button id="yearlySales"
                    class="btn text-light inactive btncust">{{ __('messageCPPK.Yearly') }}</button></a>
            <!-- Range Sales Button -->
            <a href="rangeChart" class="me-5"><button id="rangeSales"
                    class="btn text-light active btncust">{{ __('messageCPPK.Range') }}</button></a>
        </div>
        <h3 id="saleCaption">{{ __('messageCPPK.Range Sales') }}</h3>
        <!-- For Range Sale Search -->
        <form action="/rangeChart" method="Post">
            @csrf
            <div id="rangeSearch">
                <!-- For  Start Range Search -->
                <input id="appt-date" class="fromRangeCount" type="date" name="fromDate"></input>
                <!-- For Between Symbol -->
                <h3 id="betweenSymbol">~</h3>
                <!-- For  End Range Search -->
                <input id="appt-date" class="toRangeCount" type="date" name="toDate"></input>
                <!-- Search Btn -->
                <button type="submit" class="btn btn-primary btn-lg" id="rangeSearchSubmit">Search</button>
            </div>
            <div>
                @if ($errors->has('fromDate'))
                    <span class="text-danger errorShow">First Input Box({{ $errors->first('fromDate') }})</span>
                @endif
                @if ($errors->has('toDate'))
                    <span class="text-danger errorShow">Second Input Box({{ $errors->first('toDate') }})</span>
                @endif
                <div>
        </form>
        <!-- For Yearly Sale Chart-->
        <div id="lineChart1">
            <!-- For showing Yearly Chart details-->
            <!-- For  Order Sale Chart-->
            <div id="chart">

            </div>
            <!-- For  Coin Sale Chart-->
            <div id="chart1">

            </div>
        </div>

    </div>
    <script>
        // {{-- For Sending Order Array to Order rangeChart.js --}}
        var orderArray = @json($orderArray);
        // {{-- For Sending Coin Array to Coin rangeChart.js --}}
        var coinArray = @json($coinArray);
        // {{-- For Sending order Array to Order rangeChart.js --}}
        var orderDaily = @json($orderDaily);
        // {{-- For Sending  coin Array to  Coin rangeChart.js --}}
        var coinDaily = @json($coinDaily);
    </script>
    <!-- Join Javascript -->
    <script src="js/rangeChart.js"></script>
@endsection
