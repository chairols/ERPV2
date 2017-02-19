<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <div class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/irm/">Listar I.R.M.</a></li>
                <li><a href="/irm/agregar/">Agregar I.R.M.</a></li>
                <li class="active"><a href="/irm/pendientes/">Pendientes</a></li>
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
                            <table class="table table-hover table-bordered table-condensed" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Fecha Prometida</th>
                                        <th>Fecha de Compra</th>
                                        <th>Cantidad Pendiente</th>
                                        <th>U.M.</th>
                                        <th>Artículo</th>
                                        <th>Proveedor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($pendientes as $pendiente) { ?>
                                    <tr>
                                        <td><?=date('Y-m-d', strtotime($pendiente['prometida']))?></td>
                                        <td><?=strftime('%Y-%m-%d', strtotime($pendiente['fecha']))?></td>
                                        <td><?=$pendiente['cantidadpendiente']?></td>
                                        <td><?=$pendiente['medida_larga']?></td>
                                        <td>
                                            <a href="/articulos/ver/<?=$pendiente['idarticulo']?>/">
                                                <?=$pendiente['producto']?> <?=$pendiente['articulo']?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/proveedores/ver/<?=$pendiente['idproveedor']?>/">
                                                <?=$pendiente['proveedor']?>
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
    </div>
</div>

<script type="text/javascript">
    function inicio() {
        $("#gears").hide();
        $("#tabla").fadeIn(1000);
    }
</script>