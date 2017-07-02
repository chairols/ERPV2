<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div class="box-body">
                        <form method="POST" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Año</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="anio" class="form-control chosen">
                                        <?php foreach($anios as $anio) { ?>
                                        <option value="<?=$anio['anio']?>"><?=$anio['anio']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Moneda</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="moneda" class="form-control chosen">
                                        <?php foreach($monedas as $moneda) { ?>
                                        <option value="<?=$moneda['idmoneda']?>"><?=$moneda['moneda']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Buscar</button>
                                </div>
                            </div>
                            <?php if(isset($ano)) { ?>
                            <h3 class="text-center">Año: <?=$ano?> - Moneda: <?=$mon['moneda']?></h3>
                            <?php
                            $ocs_total = 0;
                            foreach($ocs as $oc) {
                                $ocs_total += $oc['subtotal'];
                            }
                            $pedidos_total = 0;
                            foreach($pedidos as $pedido) {
                                $pedidos_total += $pedido['subtotal'];
                            }
                            ?>
                            <h3 class="text-center">Órdenes de Compra: <?=$ocs_total?> - Pedidos: <?=$pedidos_total?></h3>
                            <?php } ?>
                            <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function inicio() {
        var areaChartData = {
            labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            datasets: [
              {
                label: "Órdenes de Compra",
                fillColor: "rgba(255,0,0,0.9)",
                strokeColor: "rgba(255,0,0,0.8)",
                pointColor: "#3b8bba",
                pointStrokeColor: "rgba(255,0,0,1)",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(255,0,0,1)",
                //data: [65, 59, 80, 81, 56, 55, 40]
                data: [
                    <?php for($i = 1; $i < 13; $i++) { ?>
                    <?=(!isset($ocs[$i]))?"0":$ocs[$i]['subtotal']?>,
                    <?php } ?>
                ]
              },
              {
                label: "Pedidos",
                fillColor: "rgba(60,141,188,0.9)",
                strokeColor: "rgba(60,141,188,0.8)",
                pointColor: "#3b8bba",
                pointStrokeColor: "rgba(60,141,188,1)",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(60,141,188,1)",
                //data: [28, 48, 40, 19, 86, 27, 90]
                data: [
                    <?php for($i = 1; $i < 13; $i++) { ?>
                    <?=(!isset($pedidos[$i]))?"0":$pedidos[$i]['subtotal']?>,
                    <?php } ?>
                ]
              }
            ]
          };
        
        
        
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData;
        barChartData.datasets[1].fillColor = "#00a65a";
        barChartData.datasets[1].strokeColor = "#00a65a";
        barChartData.datasets[1].pointColor = "#00a65a";
        var barChartOptions = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            //Boolean - whether to make the chart responsive
            responsive: true,
            maintainAspectRatio: true
        };
        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);
        
        
    }
</script>