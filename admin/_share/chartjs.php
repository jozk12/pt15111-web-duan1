<?php
$getBooking = "select count(id) total, MONTH(checked_in_date) month, SUM(total_price) price from booking where check_in = 0 GROUP BY MONTH(checked_in_date)";
$booking = queryExecute($getBooking, true);

$getContact = "select count(id) total_ct, MONTH(create_at) month_ct from contacts where reply_for IS NULL and status = 0 GROUP BY MONTH(create_at)";
$contacts = queryExecute($getContact, true);
?>
<script>
  $(function() {
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels: [<?php foreach ($booking as $book) : ?> 
                  ' Tháng <?= $book['month']?>',
              <?php endforeach ?>
      ],
      datasets: [{
        label: 'Digital Goods',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: [<?php foreach ($booking as $book) : ?>
            <?= $book['total'] ?>,
          <?php endforeach; ?>
        ]
      }, ]
    }

    var areaChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            display: false,
          }
        }],
        yAxes: [{
          gridLines: {
            display: false,
          },
          ticks: {
            beginAtZero: true,
            precision: 0
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
        <?php foreach ($contacts as $ct) : ?> 
                  ' Tháng <?= $ct['month_ct']?>',
              <?php endforeach ?>
      ],
      datasets: [
        {
          data: [<?php foreach ($contacts as $ct) : ?>
            <?= $ct['total_ct'] ?>,
          <?php endforeach; ?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#006699','#99cc00','#ff9900','#cc6600','#cc0099','#3333cc'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    })
    
    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = {
      labels: [
        <?php foreach ($booking as $book) : ?> 
                  ' Tháng <?= $book['month']?>',
              <?php endforeach ?>
      ],
      datasets: [
        {
          data: [<?php foreach ($booking as $book) : ?>
            <?= $book['price'] ?>,
          <?php endforeach; ?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#006699','#99cc00','#ff9900','#cc6600','#cc0099','#3333cc'],
        }
      ]
    }

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>