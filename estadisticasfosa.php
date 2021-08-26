<?php
include_once "lib/librerias.php";

$fechaAct = date("Y-m-d");
$fechaInicio = date("Y/m/01");
$fechaFinal = date("Y/m/t"); 

$estadistica = new estadisticas;
$estad = $estadistica->getFosa($conn, $fechaAct, $fechaInicio, $fechaFinal);

/************************** GRAFICA DE BARRA ********************************/
$i=0;
$cant = 0;
$total = 0;
$fecha = array();

if(!empty($estad->litrosM) && count($estad->litrosM)>0)
   foreach ($estad->litrosM as $r) { 

      $fecha[$i] = muestrafecha($r->start_date);
      $cantidad[$i] = ($r->ltrs);

      if(@$r->ltrs > $cant){
         $cant =  @$r->ltrs;
      }
      $total += @$r->ltrs;
      $i++;
   }


   $json=new Services_JSON();
   @$fecha = $json->encode($fecha);
   @$cantidad = $json->encode($cantidad);
/*****************************************************************************/

/************************** GRAFICA DE TORTA *********************************/
$i=0;
$cantl = 0;
$totalP = 0;
$nombre = array();

if(!empty($estad->masVendidos) && count($estad->masVendidos)>0)
   foreach ($estad->masVendidos as $r) { 

      $nombre[$i] = ($r->description);
      $cantProd[$i] = ($r->quantity);

      if(@$r->quantity > $cantl){
         $cantl =  @$r->quantity;
      }
      $totalP += @$r->quantity;
      $i++;
   }


   $json=new Services_JSON();
   @$nombre = $json->encode($nombre);
   @$cantProd = $json->encode($cantProd);
/*****************************************************************************/

/************************** GRAFICA DE TORTA 2*********************************/
$i=0;
$cantl = 0;
$totalP = 0;
$nombreD = array();

if(!empty($estad->masVendidosD) && count($estad->masVendidosD)>0)
   foreach ($estad->masVendidosD as $r) { 

      $nombreD[$i] = ($r->description);
      $cantProdD[$i] = ($r->quantity);

      if(@$r->quantity > $cantl){
         $cantl =  @$r->quantity;
      }
      $totalP += @$r->quantity;
      $i++;
   }


   $json=new Services_JSON();
   @$nombreD = $json->encode($nombreD);
   @$cantProdD = $json->encode($cantProdD);
/*****************************************************************************/

/************************** GRAFICA DE TORTA 3*********************************/
$i=0;
$cantv = 0;
$totalv = 0;
$nombrev = array();

if(!empty($estad->vehiculos) && count($estad->vehiculos)>0)
   foreach ($estad->vehiculos as $r) { 

      $nombrev[$i] = ($r->description);
      $cantProdv[$i] = ($r->quantity);

      if(@$r->quantity > $cantv){
         $cantv =  @$r->quantity;
      }
      $totalv += @$r->quantity;
      $i++;
   }


   $json=new Services_JSON();
   @$nombrev = $json->encode($nombrev);
   @$cantProdv = $json->encode($cantProdv);
/*****************************************************************************/
   ?>
   <!-- Begin Page Content -->
   <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
         <h1 class="h3 mb-0 text-gray-800">Estadísticas de Servicios</h1>
      </div>

      <!-- Content Row -->
      <div class="row">

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
               <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Servicios Realizados (Mensual)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                           <?=muestrafloat($total);?>
                        </div>
                     </div>
                     <div class="col-auto">
                        <i class="fas fa-wrench fa-2x text-gray-300"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
               <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Servicios Realizados (Diario)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                           <?=($estad->id);?>
                        </div>
                     </div>
                     <div class="col-auto">
                        <i class="fas fa-wrench fa-2x text-gray-300"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Content Row -->

      <div class="row">

         <!-- Area Chart -->
         <div class="col-xl-6 col-lg-4">
            <div class="card shadow mb-4">
               <!-- Card Header - Dropdown -->
               <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Gráfica de Servicios Realizados Mensual</h6>
                  <div class="dropdown no-arrow">
                     <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" 
                     aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                  </a>
               </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">Total de Servicios Realizados: <?=muestrafloat($total)?>
               <div class="chart-area">
                  <canvas id="EstadisticasDiario"></canvas>
               </div>
            </div>
         </div>      
      </div>

      <!-- Donut Chart -->
      <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">
          
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Vehiculos Mas Frecuentes (Mensual)</h6>
          </div>
          
          <div class="card-body">
            <div class="chart-pie pt-4">
              <canvas id="myPieChart3"></canvas>
            </div>
           </div>
        </div>
      </div>
      
      <!-- Donut Chart -->
      <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">
          
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Agentes Mas Efectivos (Diario)</h6>
          </div>
          
          <div class="card-body">
            <div class="chart-pie pt-4">
              <canvas id="myPieChart2"></canvas>
            </div>
           </div>
        </div>
      </div>
      <!-- Donut Chart -->
      <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">
          
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Agentes mas Efectivos (Mensual)</h6>
          </div>
          
          <div class="card-body">
            <div class="chart-pie pt-4">
              <canvas id="myPieChart"></canvas>
            </div>
           </div>
        </div>
      </div>

</div>

</div>
<!-- /.container-fluid -->

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/chart.js/chartjs-plugin-datalabels.min.js"></script>
<!-- Page level custom scripts -->
<!--<script src="js/demo/chart-area-demo.js"></script>-->

<script type="text/javascript">

   setTimeout(graficoDiario, 100);
   function graficoDiario(){

// Bar Chart Example
var ctx = document.getElementById("EstadisticasDiario");
var myBarChart = new Chart(ctx, {
   type: 'line',
   data: {
      labels: <?=$fecha?>,
      datasets: [{
         label: "Total",
         lineTension: 0.6,
// backgroundColor: ['#4e73df'],//, '#1cc88a', '#36b9cc', '#f35954', '#1cc88a', '#36b9cc','#4e73df'],
hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#f74943', '#17a673', '#2c9faf','#2e59d9'],
borderColor: "#203175",
pointRadius: 6,
pointBackgroundColor: "#e85e05",
//pointBorderColor: '#2e59d9',
pointHoverRadius: 8,
pointHoverBackgroundColor: "#203175",
pointHoverBorderColor: "#e85e05",
pointHitRadius: 10,
pointBorderWidth: 3,
data: <?=$cantidad?>
}],
},
options: {
   maintainAspectRatio: false,
   layout: {
      padding: {
         left: 5,
         right: 10,
         top: 18,
         bottom: -10
      }
   },
   "hover": {
      "animationDuration": 0
   },
   "animation": {
      "duration": 5,
      "onComplete": function () {
         var chartInstance = this.chart,
         ctx = chartInstance.ctx;

         ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
         ctx.textAlign = 'center';
         ctx.textBaseline = 'bottom';

         this.data.datasets.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            meta.data.forEach(function (bar, index) {
               var data = number_format(dataset.data[index],2,',','.');                            
               ctx.fillText(data, bar._model.x, bar._model.y - 5);
            });
         });
      }
   },
   scales: {
      xAxes: [{
         time: {
            unit: 'date'
         },
         gridLines: {
            display: true,
            drawBorder: true
         },
         ticks: {
            maxTicksLimit: 10
         },
         maxBarThickness: 75,
      }],
      yAxes: [{
         ticks: {
            //min: 0,
           // max: <?=$cant?>,
            maxTicksLimit: 10,
            padding: 8,
// Include a dollar sign in the ticks
callback: function(value, index, values) {
   return  number_format(value,2,',','.');
}
},
gridLines: {
   color: "rgb(234, 236, 244)",
   zeroLineColor: "rgb(234, 236, 244)",
   drawBorder: false,
   borderDash: [2],
   zeroLineBorderDash: [2]
}
}],
},
legend: {
   display: false
},
tooltips: {
   titleMarginBottom: 10,
   titleFontColor: '#6e707e',
   titleFontSize: 18,
   backgroundColor: "rgb(255,255,255)",
   bodyFontColor: "#858796",
   borderColor: '#dddfeb',
   borderWidth: 1,
   xPadding: 15,
   yPadding: 15,
   displayColors: false,
   caretPadding: 10,
   callbacks: {
      label: function(tooltipItem, chart) {
         var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
         return datasetLabel + ': ' + number_format(tooltipItem.yLabel,2,',','.');
      }
   }
},
}
});
/*
var canvasP = document.getElementById("Estadisticas");
canvasP.onclick = function(e) {
var slice = myBarChart.getElementAtEvent(e);
//alert(slice[0]._index);
if (!slice.length) return; // return if not clicked on slice
var label = slice[0]._model.label;
switch (label) {
// add case for each label/slice
case 'Milagro Delgado':
// alert('clicked on slice 5');
//window.open('www.example.com/foo');
break;
case 'Sergio Yanez':
//alert('clicked on slice 6');
//window.open('www.example.com/bar');
break;
// add rests ...
}
}*/


}


// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  plugins: [ChartDataLabels],
  type: 'pie',
  data: {
    labels: <?=$nombre?>,
    datasets: [{
      data: <?=$cantProd?>,
      backgroundColor: ['#4EA0DF', '#1cc88a', '#CCC336', '#76CC36', '#CC3672'],
      hoverBackgroundColor: ['#2E7ED9', '#17a673', '#AF982C', '#67AF2C', '#AF2C5D'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
     plugins: {
       datalabels: {
         formatter: (value, ctx) => {
           let valor = (value * 1).toFixed(0);
           return valor;
         },
         color: '#fff',
         font: {
             size: 18,
           },
       }
     },
     layout: {
            padding: {
               top: 1,
               bottom: 1
            }
        },
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: true,
      caretPadding: 10,
    },
    legend: {
      display: true,
      position: 'left',
      align: 'start',
    },
    cutoutPercentage: 1,
  },
});



var ctx = document.getElementById("myPieChart3");
var myPieChart = new Chart(ctx, {
  plugins: [ChartDataLabels],
  type: 'pie',
  data: {
    labels: <?=$nombrev?>,
    datasets: [{
      data: <?=$cantProdv?>,
      backgroundColor: ['#4EA0DF', '#1cc88a', '#CCC336', '#76CC36', '#CC3672'],
      hoverBackgroundColor: ['#2E7ED9', '#17a673', '#AF982C', '#67AF2C', '#AF2C5D'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
     plugins: {
       datalabels: {
         formatter: (value, ctx) => {
           let valor = (value * 1).toFixed(0);
           return valor;
         },
         color: '#fff',
         font: {
             size: 18,
           },
       }
     },
     layout: {
            padding: {
               top: 1,
               bottom: 1
            }
        },
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: true,
      caretPadding: 10,
    },
    legend: {
      display: true,
      position: 'left',
      align: 'start',
    },
    cutoutPercentage: 1,
  },
});

var ctx = document.getElementById("myPieChart2");
var myPieChart = new Chart(ctx, {
  plugins: [ChartDataLabels],
  type: 'pie',
  data: {
    labels: <?=$nombreD?>,
    datasets: [{
      data: <?=$cantProdD?>,
      backgroundColor: ['#4EA0DF', '#1cc88a', '#CCC336', '#76CC36', '#CC3672'],
      hoverBackgroundColor: ['#2E7ED9', '#17a673', '#AF982C', '#67AF2C', '#AF2C5D'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
     plugins: {
       datalabels: {
         formatter: (value, ctx) => {
           let valor = (value * 1).toFixed(0);
           return valor;
         },
         color: '#fff',
         font: {
             size: 18,
           },
       }
     },
     layout: {
            padding: {
               top: 1,
               bottom: 1
            }
        },
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: true,
      caretPadding: 10,
    },
    legend: {
      display: true,
      position: 'left',
      align: 'start',
    },
    cutoutPercentage: 1,
  },
});
</script>        