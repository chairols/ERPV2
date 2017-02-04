<div id="main-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">
                    <?=$title?>
                </h3>
            </div>
        </div>
        
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/irm/">Listar I.R.M.</a></li>
                <li><a href="/irm/agregar/">Agregar I.R.M.</a></li>
                <li><a href="/irm/pendientes/">Pendientes</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Informes de Recepción de Materiales</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-hover table-bordered table-condensed" id="sample_1_desc">
                            <thead>
                                <tr>
                                    <th>IRM</th>
                                    <th>Cantidad</th>
                                    <th>Artículo</th>
                                    <th>Proveedor</th>
                                    <th>Recepcionado</th>
                                    <th>Fecha</th>
                                    <th>Controles</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($irms as $irm) { ?>
                                <tr>
                                    <td><?=$irm['idirm']?></td>
                                    <td><?=$irm['cantidad']?></td>
                                    <td><?=$irm['producto']?> <?=$irm['articulo']?></td>
                                    <td><?=$irm['proveedor']?></td>
                                    <td><?=$irm['nombre']?> <?=$irm['apellido']?></td>
                                    <td><?=$irm['timestamp']?></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <pre><?php print_r($irms)?></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>