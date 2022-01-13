/*
     * Create:cherry(2022/01/13)
     * Update:
     * This function is used to show Daily Chart using apex chart.
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
          left: 9,
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
        text: 'Daily Sales',
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
        categories: daily, // to show dates from database in x-axis
        title: {
          text: 'Daily'
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
      
    
    