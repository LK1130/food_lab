
@extends('COMMON.layout.layout_admin')

@section('title')
Daily Sales
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
    <!-- Daily Sales Button -->
    <a href="dailyChart"><button id="dailySales" class="active">Daily Sale</button></a>
    <!--Monthly Sales Button -->
    <a href="monthlyChart"><button id="monthlySales">Monthly Sale</button></a>
    <!-- Yearly Sales Button -->
    <a href="yearlyChart"><button id="yearlySales">Yearly Sale</button></a>
    <!-- Range Sales Button -->
    <a href="rangeChart"><button id="rangeSales">Range Sale</button></a>  
  <br></br>
  <!-- For Daily Chart-->
    <div id="lineChart">
      <!-- For showing Daily Chart details-->
      <!-- For  Order daily Sale Chart-->
      <div id="chart">
      
      </div>
      <!-- For  Coin daily Sale Chart-->
      <div id="chart1">

      </div>
    </div>
</div>
     <!-- For Sending Array to DailyChart.js -->
    <script>
      // For Sending Order Array to Order dailyChart.js
      var orderArray = @json($orderArray);
      // For Sending Coin Array to Coin dailyChart.js
      var coinArray = @json($coinArray);
      // For Sending daily Array to Order dailyChart.js 
      var orderDaily= @json($orderDaily);
       // For Sending daily Array to  Coin dailyChart.js
      var coinDaily= @json($coinDaily);
    </script>
     <!-- Join Javascript -->
    <script src= "js/dailyChart.js" ></script>
@endsection
