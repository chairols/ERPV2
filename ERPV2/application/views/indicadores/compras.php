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
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
        <?php if(isset($monedas)) { 
            foreach($monedas as $key => $value) { ?>
        
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><strong><?=$value['moneda']?></strong> - Período <?=$desde?> - <?=$hasta?></h3>
                    </div>
                    <div class="gears">
                        <div class="text-center">
                            <img src="/assets/AdminLTE-2.3.11/gears.gif">
                            <br><br>
                        </div>
                    </div>
                    <div class="tabla" style="display: none;">
                        <canvas id="id-<?=$key?>"></canvas>
                        
                        <table class="table table-condensed table-hover table-bordered datatable-desc">
                            <thead>
                                <tr>
                                    <th><strong>Monto</strong></th>
                                    <th><strong>Proveedor</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($value['ocs'] as $oc) { ?>
                                <tr>
                                    <td><?=$value['simbolo']?> <?=$oc['valor']?></td>
                                    <td><?=$oc['proveedor']?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php }
        } ?>
        </div>
    </section>
</div>



<script type="text/javascript">
    function inicio() {
        $(".gears").hide();
        $(".tabla").fadeIn(1000);
        
        <?php foreach($monedas as $key => $value) { ?>
        var pieChartCanvas = $("#id-<?=$key?>").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
            <?php foreach($value['ocs'] as $oc) { ?>
            {
                value: <?=$oc['valor']?>,
                label: "<?=$oc['proveedor']?>"
            },
            <?php } ?>
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
    
    function limpiar_campo(campo) {
        $("#"+campo).val("");
    }
    
    
</script>