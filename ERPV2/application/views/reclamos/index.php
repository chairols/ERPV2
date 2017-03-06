<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/reclamos/">Listar Reclamos</a></li>
                <li><a href="/reclamos/agregar/">Agregar Reclamo</a></li>
                <li><a href="/reclamos/modificar/">Modificar Reclamo</a></li>
                <li><a href="/reclamos/ver/">Ver Reclamo</a></li>
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
                            <table class="table table-bordered table-hover table-condensed" id="datatable-desc">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Artículo</th>
                                        <th>Proveedor</th>
                                        <th>Reclamo</th>
                                        <th>Usuario</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($reclamos as $reclamo) { ?>
                                    <tr>
                                        <td><?=date('Y-m-d', strtotime($reclamo['timestamp']))?></td>
                                        <td><?=$reclamo['producto']?> <?=$reclamo['articulo']?></td>
                                        <td><?=$reclamo['proveedor']?></td>
                                        <td><?=$reclamo['reclamo']?></td>
                                        <td><?=$reclamo['nombre']?> <?=$reclamo['apellido']?></td>
                                        <td>
                                            <a href="/reclamos/ver/<?=$reclamo['idreclamo_item']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver" class="tooltips">
                                                <button class="btn btn-xs btn-success">
                                                    <i class="fa fa-eye"></i>
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