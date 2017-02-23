<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div class="box-body">
                        <form method="POST" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Proveedor</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <select name="proveedor" class="select2 form-control">
                                        <?php foreach($proveedores as $proveedor) { ?>
                                        <option value="<?=$proveedor['idproveedor']?>"><?=$proveedor['proveedor']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Desde</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" id="dp1" name="desde" class="form-control pull-right datepicker">
                                        <div class="input-group-addon">
                                            <a onclick="limpiar_campo('dp1');" href="#" class="label label-danger">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Hasta</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" id="dp2" name="hasta" class="form-control pull-right datepicker">
                                        <div class="input-group-addon">
                                            <a onclick="limpiar_campo('dp2');" href="#" class="label label-danger">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Buscar</button>
                                </div>
                            </div>
                        </form>
                        <div id="gears">
                            <div class="text-center">
                                <img src="/assets/AdminLTE-2.3.11/gears.gif">
                                <br><br>
                            </div>
                        </div>
                        <div id="tabla" style="display: none;">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <?php if(isset($ocs)) { ?>
                                <canvas id="pieChart" style="height:250px"></canvas>
                                <h4 class="box-title">
                                    Período <?=date('d/m/Y', strtotime($desde))?> - <?=date('d/m/Y', strtotime($hasta))?> <br>
                                    <strong><?=$p->getProveedor()?></strong>
                                </h4>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function inicio() {
        $("#gears").hide();
        $("#tabla").fadeIn(1000);
        
        crearChart();
    }
    
    function limpiar_campo(campo) {
        $("#"+campo).val("");
    }
    
    function crearChart() {
        <?php if(isset($ocs)) { ?>
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
            {
                value: <?=$cumplidas?>,
                color: "#00a65a",
                highlight: "#00a65a",
                label: "Cumplidas"
            },
            {
                value: <?=$cumplidas_vencidas?>,
                color: "#00c0ef",
                highlight: "#00c0ef",
                label: "Cumplidas Vencidas"
            },
            {
                value: <?=$pendientes?>,
                color: "#f39c12",
                highlight: "#f39c12",
                label: "Pendientes"
            },
            {
                value: <?=$pendientes_vencidas?>,
                color: "#f56954",
                highlight: "#f56954",
                label: "Pendientes Vencidas"
            }
        ];
        var pieOptions = {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke: true,
          //String - The colour of each segment stroke
          segmentStrokeColor: "#fff",
          //Number - The width of each segment stroke
          segmentStrokeWidth: 2,
          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout: 50, // This is 0 for Pie charts
          //Number - Amount of animation steps
          animationSteps: 100,
          //String - Animation easing effect
          animationEasing: "easeOutBounce",
          //Boolean - Whether we animate the rotation of the Doughnut
          animateRotate: true,
          //Boolean - Whether we animate scaling the Doughnut from the centre
          animateScale: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true,
          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);
        <?php } ?>
    }
</script>