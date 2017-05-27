<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/irm/">Listar I.R.M.</a></li>
                <li><a href="/irm/agregar/">Agregar I.R.M.</a></li>
                <li><a href="/irm/pendientes/">Pendientes</a></li>
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
                            <table class="table table-hover table-bordered table-condensed" id="datatable-desc">
                                <thead>
                                    <tr>
                                        <th>IRM</th>
                                        <th>Cantidad</th>
                                        <th>Artículo</th>
                                        <th>Proveedor</th>
                                        <th>Recepcionado</th>
                                        <th>Fecha</th>
                                        <th>Controles</th>
                                        <th>O.T.</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($irms as $irm) { ?>
                                    <tr>
                                        <td><?=$irm['idirm']?></td>
                                        <td><?=$irm['cantidad']?> <?=$irm['medida_corta']?></td>
                                        <td>
                                            <a href="/articulos/ver/<?=$irm['idarticulo']?>/">
                                                <?=$irm['producto']?> <?=$irm['articulo']?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/proveedores/ver/<?=$irm['idproveedor']?>/">
                                                <?=$irm['proveedor']?>
                                            </a>
                                        </td>
                                        <td><?=$irm['nombre']?> <?=$irm['apellido']?></td>
                                        <td><?=date('d/m/Y', strtotime($irm['timestamp']))?></td>
                                        <td>
                                            <?php foreach($irm['controles'] as $control) { ?>
                                            <span class="badge bg-green"><?=$control['control']?></span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php foreach($irm['ots'] as $ot) { ?>
                                            <a href="/ots/ver/<?=$ot['idot']?>/">
                                                <span class="badge bg-green"><?=$ot['fabrica']?> <?=$ot['numero_ot']?></span>
                                            </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="/irm/agregar_items/<?=$irm['idirm']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
                                                <button class="btn btn-warning btn-xs">
                                                    <i class="fa fa-edit"></i>
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