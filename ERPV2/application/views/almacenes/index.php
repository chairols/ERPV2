<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/almacenes/">Listar Almacenes</a></li>
                <li><a href="/almacenes/agregar/">Agregar Almacén</a></li>
                <li><a href="/almacenes/modificar/">Modificar Almacén</a></li>
                <li><a href="/almacenes/ver/">Ver Almacén</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div id="gears">
                        <div class="text-center">
                            <img src="/assets/AdminLTE-2.3.11/gears.gif">
                            <br><br>
                        </div>
                    </div>
                    <div id="tabla" style="display: none;">
                        <div class="box-body">
                            <table id="datatable" class="table table-condensed table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th><strong>Almacén</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($almacenes as $almacen) { ?>
                                    <tr>
                                        <td><?=$almacen['almacen']?></td>
                                        <td>
                                            <a href="/almacenes/ver/<?=$almacen['idalmacen']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver" class="tooltips">
                                                <button class="btn btn-xs btn-success">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="/almacenes/modificar/<?=$almacen['idalmacen']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
                                                <button class="btn btn-xs btn-warning">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a> 
                                            <a href="/log/ver/almacenes/<?=$almacen['idalmacen']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Historial" class="tooltips">
                                                <button class="btn btn-xs btn-info">
                                                    <i class="fa fa-clock-o"></i> 
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
    }
</script>