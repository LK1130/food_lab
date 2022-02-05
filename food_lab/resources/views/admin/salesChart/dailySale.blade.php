
@extends('COMMON.layout.layout_admin')

@section('title')
{{ __('messageCPPK.Daily Sales') }}
@endsection

@section('css')
<!-- Join Css -->
<link rel="stylesheet"  href= "css/adminSalesChart.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
@endsection

@section('script')
<!-- For Jquary Cdn-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- For Apex Charts Cdn-->
<script src="https://cdn.jsdelivr.net/npm/apexcharts" ></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"
integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection

@section('body')
<div class="col-md-10">
  <div class="mt-4">
    <!-- Daily Sales Button -->
    <a href="dailyChart"  class="me-5"><button id="dailySales" class="btn text-light  active btncust">{{ __('messageCPPK.Daily') }}</button></a>
    <!--Monthly Sales Button -->
    <a href="monthlyChart" class="me-5"><button id="monthlySales"  class="btn text-light inactive btncust">{{ __('messageCPPK.Monthly') }}</button></a>
    <!-- Yearly Sales Button -->
    <a href="yearlyChart" class="me-5"><button id="yearlySales"  class="btn text-light inactive btncust">{{ __('messageCPPK.Yearly') }}</button></a>
    <!-- Range Sales Button -->
    <a href="rangeChart" class="me-5"><button id="rangeSales"  class="btn text-light inactive btncust">{{ __('messageCPPK.Range') }}</button></a>  
  </div>
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
