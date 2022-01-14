/*
     * Create:cherry(2022/01/11)
     * Update:
     * This function is used to show Monthly Chart using apex chart.
     */
    var options = {
      series: [
      {
        name: "Order Transaction",
        data: array
      },
      {
        name: "Coin",
        data: array1
        
      }
    ],
      chart: {
      height:400,
      type: 'line',
      dropShadow: {
        enabled: true,
        color: '#000',
        top: 18,
        left: 7,
        blur: 10,
        opacity: 0.2
      },
      toolbar: {
        show: false
      }
    },
    colors: ['#77B6EA', '#ffa600'],
    dataLabels: {
      enabled: true,
    },
    stroke: {
      curve: 'smooth'
    },
    title: {
      text: 'Monthly Sales',
      align: 'left'
    },
    grid: {
      borderColor: '#e7e7e7',
      row: {
        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
        opacity: 0.5
      },
    },
    markers: {
      size: 1
    },
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul','Aug','Sep','Oct','Nov','Dec'], // to show month in x-axis
      title: {
        text: 'Months'
      }
    },
    yaxis: {
      title: {
        text: 'Amount'
      },
      min: 0
    
    },
    legend: {
      position: 'top',
      horizontalAlign: 'right',
      floating: true,
      offsetY: -25,
      offsetX: -5
    }
    };
    
    var chart = new ApexCharts(document.getElementById("chart"), options);
    chart.render();
    
  
  