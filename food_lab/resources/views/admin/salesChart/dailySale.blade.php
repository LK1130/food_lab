
@extends('COMMON.layout.layout_admin')

@section('title')
Daily Sales
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
    <a href="dailyChart"><button id="dailySales" active>Daily Sale</button></a>
    <!--Monthly Sales Button -->
    <a href="monthlyChart"><button id="monthlySales">Monthly Sale</button></a>
    <!-- Yearly Sales Button -->
    <a href="yearlyChart"><button id="yearlySales">Yearly Sale</button></a>
    <!-- Range Sales Button -->
    <a href=""><button id="rangeSales">Range Sale</button></a>
    
  </div>
  <br></br>
  <!-- For Daily Chart-->
    <div id="lineChart">
      <!-- For showing Daily Chart details-->
      <div id="chart">

      </div>
    </div>
     <!-- For Sending Array to monthlyChart.js -->
    <script>
      // For Sending Order Array to monthlyChart.js
      var array = @json($orderArray);
      // For Sending Coin Array to monthlyChart.js
      var array1 = @json($coinArray);
      // For Sending Date Array to monthlyChart.js
      var daily = @json($dailyArray);
     
    </script>
     <!-- Join Javascript -->
    <script src= "js/dailyChart.js" ></script>
@endsection
