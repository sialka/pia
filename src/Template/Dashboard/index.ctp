<?php
    $nav = [
        'Usuarios' => ''
    ];

    echo $this->element('breadcrumb'); 
     
    echo $this->Html->script('chart/chart.js');
    
?>

<style>
    @media (min-width: 768px) {
      .chart-pie {
        height: calc(26rem - 43px) !important;
      }
    }
</style>

<!-- Content Row -->
<div class="container-row">

    <div class="row col-12 d-block m-auto text-center">
        <h1 class='h3 mb-4 dashboard-title'>
            <?= "Reunião da Piedade" ?>
        </h1>
    </div>
    
    <div class="row">
        <div class="col-12">
            <p class="text-center">Implementar</p>
        </div>
    </div>

</div>

<script>
    
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Administração", "1 - Centro", "2 - Aeroporto", "3 - Bonsucesso", "4 - Pimentas"],
    datasets: [{
      data: [
        <?= $saldos['saldos']['setor0'] ?>, 
        <?= $saldos['saldos']['setor1'] ?>,
        <?= $saldos['saldos']['setor2'] ?>,
        <?= $saldos['saldos']['setor3'] ?>,
        <?= $saldos['saldos']['setor4'] ?>,
      ],
      backgroundColor: ['#0d6efd', '#1CC88A', '#36B9CC', '#dc3545', '#ffc107'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: true,
      caretPadding: 5,
    },
    legend: {
      display: true
    },
    cutoutPercentage: 50,
    responsive: true,
    title: {
        display: false,
        text: 'Chart'
    }
  },
});

    
</script>