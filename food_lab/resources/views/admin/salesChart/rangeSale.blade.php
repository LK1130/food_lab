
@extends('COMMON.layout.layout_admin')

@section('title')
Monthly Sales
@endsection

@section('css')
<!-- Join Css -->
<link rel="stylesheet"  href= "css/adminSalesChart.css"/>
@endsection

@section('script')
  <!-- For Apex Charts Cdn-->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
 <!-- Join Javascript -->
 <script src= "js/monthlyChart.js"></script>
@endsection

@section('body')
<div class="col-md-10">
      <div class="mt-4">
    <!-- Daily Sales Button -->
    <a href="dailyChart"  class="me-5"><button id="dailySales" class="btn text-light  inactive btncust">Daily Sale</button></a>
    <!--Monthly Sales Button -->
    <a href="monthlyChart" class="me-5"><button id="monthlySales"  class="btn text-light inactive btncust">Monthly Sale</button></a>
    <!-- Yearly Sales Button -->
    <a href="yearlyChart" class="me-5"><button id="yearlySales"  class="btn text-light inactive btncust">Yearly Sale</button></a>
    <!-- Range Sales Button -->
    <a href="rangeChart" class="me-5"><button id="rangeSales"  class="btn text-light active btncust">Range Sale</button></a>  
  </div>
  <h3 id="saleCaption">Range Sale</h3>
    <!-- For Range Sale Search -->
    <form action="/rangeChart" method="Post">
      @csrf
        <div id="rangeSearch">
          <!-- For  Start Range Search -->
          <input id="appt-date"  class="fromRangeCount" type="date" name="fromDate"></input>
          @if ($errors->has('fromDate'))
          <span class="text-danger">{{ $errors->first('fromDate') }}</span>
          @endif
          <!-- For Between Symbol -->
          <h3 id="betweenSymbol">~</h3>
          <!-- For  End Range Search -->
          <input id="appt-date" class="toRangeCount"  type="date" name="toDate"></input>
          @if ($errors->has('toDate'))
          <span class="text-danger">{{ $errors->first('toDate') }}</span>
          @endif
          <!-- Search Btn -->
          <button type="submit" class="btn btn-primary btn-lg" id="rangeSearchSubmit">Search</button>
        </div>
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
    // {{--For Sending Order Array to Order rangeChart.js  --}}
      var orderArray = @json($orderArray);
    // {{--  For Sending Coin Array to Coin rangeChart.js  --}}
      var coinArray = @json($coinArray);
    // {{--  For Sending order Array to Order rangeChart.js --}}
      var orderDaily= @json($orderDaily);
    // {{-- For Sending  coin Array to  Coin rangeChart.js  --}}
      var coinDaily= @json($coinDaily);
    </script>
     <!-- Join Javascript -->
    <script src= "js/rangeChart.js" ></script>
@endsection