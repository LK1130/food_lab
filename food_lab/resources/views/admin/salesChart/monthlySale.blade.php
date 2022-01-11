
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
    <button id="dailySales">Daily Sale</button>
    <!--Monthly Sales Button -->
    <button id="monthlySales">Monthly Sale</button>
    <!-- Yearly Sales Button -->
    <button id="yearlySales">Yearly Sale</button>
    <!-- Range Sales Button -->
    <button id="rangeSales">Range Sale</button>
  </div>
  <br></br>
    <!-- For Range Sale Search -->
    <div id="rangeSearch">
      <h1>Range Sale</h1>
      <div id="inputBox">
        <!-- For  Start Range Search -->
        <input type="text" name="" id="fromRangeCount"></input>
         <!-- For Between Symbol -->
         <h3 id="betweenSymbol">~</h3>
        <!-- For  End Range Search -->
        <input type="text" name="" id="toRangeCount"></input>
        <!-- For  Range Search  Submit-->
        <button type="submit" id="rangeSearchSubmit">Search</button>
      </div>
    </div>
  <!-- For Daily Chart-->
    <div id="lineChart">
      <!-- For showing Daily Chart details-->
      <div id="chart">

      </div>
    </div>
@endsection