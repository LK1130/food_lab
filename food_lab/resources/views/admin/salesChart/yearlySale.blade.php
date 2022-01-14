
@extends('COMMON.layout.layout_admin')

@section('title')
Yearly Sales
@endsection

@section('css')
<!-- Join Css -->
<link rel="stylesheet"  href= "css/salesChart.css"></link>
@endsection

@section('script')
<!-- For Jquary Cdn-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- For Apex Charts Cdn-->
<script src="https://cdn.jsdelivr.net/npm/apexcharts" ></script>
@endsection

@section('body')
  <!-- Sales Change Button -->
  <div id="salesChangeBtn">
    <!-- Daily Sales Button -->
    <a href="dailyChart"><button id="dailySales" >Daily Sale</button></a>
    <!--Monthly Sales Button -->
    <a href="monthlyChart"><button id="monthlySales">Monthly Sale</button></a>
    <!-- Yearly Sales Button -->
    <a href="yearlyChart"><button id="yearlySales" active>Yearly Sale</button></a>
    <!-- Range Sales Button -->
    <a href="rangeChart"><button id="rangeSales">Range Sale</button></a>
    
  </div>
  <br></br>
  <!-- For Yearly Sale Chart-->
    <div id="lineChart">
      <!-- For showing Yearly Chart details-->
        <!-- For  Order Yearly Sale Chart-->
        <div id="chart">

        </div>
        <!-- For  Coin Yearly Sale Chart-->
        <div id="chart1">

        </div>
    </div>
     <!-- For Sending Array to YearlyChart.js -->
    <script>
      // For Sending Order Array to Order yearlyChart.js
      var orderArray = @json($orderArray);
      // For Sending Coin Array to Coin yearlyChart.js
      var coinArray = @json($coinArray);
      // For Sending Year Array to Order yearlyChart.js 
      var orderYearly= @json($orderYearly);
       // For Sending Year Array to  Coin yearlyChart.js
      var coinYearly= @json($coinYearly);
    </script>
     <!-- Join Javascript -->
    <script src= "js/yearlyChart.js" ></script>
@endsection
