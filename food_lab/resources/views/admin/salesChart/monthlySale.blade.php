
@extends('COMMON.layout.layout_admin')

@section('title')
Monthly Sales
@endsection

@section('css')
<!-- Join Css -->
<link rel="stylesheet"  href= "css/salesChart.css"></link>
@endsection

@section('script')
  <!-- For Apex Charts Cdn-->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
 <!-- Join Javascript -->
 <script src= "js/monthlyChart.js"></script>
@endsection


@section('body')
  <!-- Sales Change Button -->
  <div id="salesChangeBtn">
    <!-- Daily Sales Button -->
    <a href=""><button id="dailySales">Daily Sale</button></a>
    <!--Monthly Sales Button -->
    <a href=""><button id="monthlySales" active>Monthly Sale</button></a>
    <!-- Yearly Sales Button -->
    <a href=""><button id="yearlySales">Yearly Sale</button></a>
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
@endsection