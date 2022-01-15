
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
    <a href="dailyChart"><button id="dailySales">Daily Sale</button></a>
    <!--Monthly Sales Button -->
    <a href="monthlyChart"><button id="monthlySales">Monthly Sale</button></a>
    <!-- Yearly Sales Button -->
    <a href="yearlyChart"><button id="yearlySales">Yearly Sale</button></a>
    <!-- Range Sales Button -->
    <a href="rangeChart"><button id="rangeSales" active>Range Sale</button></a>
  </div>
  <br></br>
  <h1 id="saleCaption">Range Sale</h1>
    <!-- For Range Sale Search -->
    <form action="rangeChart" method="Post">
      @csrf
        <div id="rangeSearch">
          <!-- For  Start Range Search -->
          <input id="appt-date"  class="fromRangeCount" type="date" name="fromDate"></input>
          <!-- For Between Symbol -->
          <h3 id="betweenSymbol">~</h3>
          <!-- For  End Range Search -->
          <input id="appt-date" class="toRangeCount"  type="date" name="toDate"></input>
          
          <button type="submit" class="btn btn-primary btn-lg" id="rangeSearchSubmit">Search</button>
        </div>
    </form> 
  <!-- For Yearly Sale Chart-->
  <div id="lineChart">
    <!-- For showing Yearly Chart details-->
      <!-- For  Order Sale Chart-->
      <div id="chart">

      </div>
      <!-- For  Coin Sale Chart-->
      <div id="chart1">

      </div>
  </div>

  <script src= "js/yearlyChart.js" ></script>
@endsection