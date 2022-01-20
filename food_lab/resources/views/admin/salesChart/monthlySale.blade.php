@extends('COMMON.layout.layout_admin')

@section('title')
Monthly Sales
@endsection

@section('css')
<!-- Join Css -->
<link rel="stylesheet"  href= "css/adminSalesChart.css"/>
@endsection

@section('script')
<!-- For Jquary Cdn-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- For Apex Charts Cdn-->
<script src="https://cdn.jsdelivr.net/npm/apexcharts" ></script>
@endsection

@section('body')
<div class="col-md-10">
<<<<<<< HEAD
  <div class="mt-4">
    <!-- Daily Sales Button -->
    <a href="dailyChart" class="me-5"><button
            class="btn text-light  inactive btncust">Daily Sale</button></a>
     <!--Monthly Sales Button -->
    <a href="monthlyChart" class="me-5"><button
            class="btn text-light  active btncust" >Monthly Sale</button></a>
    <!-- Yearly Sales Button -->
    <a href="yearlyChart" class="me-5"><button
            class="btn text-light  inactive btncust" >Yearly Sale</button></a>
     <!-- Range Sales Button -->
    <a href="rangeChart" class="me-5"><button
            class="btn text-light  inactive btncust">Range Sale</button></a>
</div>
=======
   <div class="mt-4">
    <!-- Daily Sales Button -->
    <a href="dailyChart"  class="me-5"><button id="dailySales" class="btn text-light  inactive btncust">Daily Sale</button></a>
    <!--Monthly Sales Button -->
    <a href="monthlyChart" class="me-5"><button id="monthlySales"  class="btn text-light active btncust">Monthly Sale</button></a>
    <!-- Yearly Sales Button -->
    <a href="yearlyChart" class="me-5"><button id="yearlySales"  class="btn text-light inactive btncust">Yearly Sale</button></a>
    <!-- Range Sales Button -->
    <a href="rangeChart" class="me-5"><button id="rangeSales"  class="btn text-light inactive btncust">Range Sale</button></a>  
  </div>
>>>>>>> f1fd8e2788d2e264e4b43de55a94d797192dfa90
  <!-- For Daily Chart-->
    <div id="lineChart">
      <!-- For showing Daily Chart details-->
      <div id="chart">

      </div>
      <div id="chart1">

      </div>
    </div>
</div>
     <!-- For Sending Array to monthlyChart.js -->
    <script>
       // For Sending Order Array to monthlyChart.js
      var orderArray = @json($orderArray);
       // For Sending Coin Array to monthlyChart.js
      var coinArray = @json($coinArray);
    </script>
     <!-- Join Javascript -->
    <script src= "js/monthlyChart.js" ></script>
@endsection
