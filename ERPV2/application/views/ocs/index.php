<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/ocs/">Listar O.C.S.</a></li>
                <li><a href="/ocs/agregar/">Agregar O.C.</a></li>
                <li><a href="/ocs/agregar_items/">Modificar O.C.</a></li>
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
                                        <th>O.C.</th>
                                        <th>Fecha</th>
                                        <th>Proveedor</th>
                                        <th>Cantidad</th>
                                        <th>Artículo</th>
                                        <th>O.T.</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($ocs as $oc) { ?>
                                    <tr>
                                        <td><?=$oc['idoc']?></td>
                                        <td><?=date('d/m/Y' , strtotime($oc['timestamp']))?></td>
                                        <td>
                                            <a href="/proveedores/ver/<?=$oc['idproveedor']?>/">
                                                <?=$oc['proveedor']?>
                                            </a>
                                        </td>
                                        <td><?=$oc['cantidad']?> <?=$oc['medida_corta']?></td>
                                        <td>
                                            <a href="/articulos/ver/<?=$oc['idarticulo']?>/">
                                                <?=$oc['producto']?> <?=$oc['articulo']?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php foreach($oc['ots'] as $ot) { ?>
                                            <a href="/ots/ver/<?=$ot['idot']?>/">
                                                <span class="badge bg-green"><?=$ot['fabrica']?> <?=$ot['numero_ot']?></span>
                                            </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="/ocs/agregar_items/<?=$oc['idoc']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
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