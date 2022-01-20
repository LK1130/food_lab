
@extends('COMMON.layout.layout_admin')

@section('title')
Yearly Sales
@endsection

@section('css')
<!-- Join Css -->
<link rel="stylesheet"  href= "css/adminSalesChart.css"></link>
@endsection

@section('script')
<!-- For Jquary Cdn-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- For Apex Charts Cdn-->
<script src="https://cdn.jsdelivr.net/npm/apexcharts" ></script>
@endsection

@section('body')
<div class="col-md-10">
  <div class="mt-4">
    <!-- Daily Sales Button -->
    <a href="dailyChart" class="me-5"><button
            class="btn text-light  inactive btncust">Daily Sale</button></a>
     <!--Monthly Sales Button -->
    <a href="monthlyChart" class="me-5"><button
            class="btn text-light  inactive btncust" >Monthly Sale</button></a>
    <!-- Yearly Sales Button -->
    <a href="yearlyChart" class="me-5"><button
            class="btn text-light  active btncust" >Yearly Sale</button></a>
     <!-- Range Sales Button -->
    <a href="rangeChart" class="me-5"><button
            class="btn text-light  inactive btncust">Range Sale</button></a>
</div>
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
