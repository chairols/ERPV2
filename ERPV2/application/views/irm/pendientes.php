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
                <li><a href="/irm/">Listar I.R.M.</a></li>
                <li><a href="/irm/agregar/">Agregar I.R.M.</a></li>
                <li class="active"><a href="/irm/pendientes/">Pendientes</a></li>
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
                                    <th>Fecha de Compra</th>
                                    <th>Cantidad Pendiente</th>
                                    <th>Artículo</th>
                                    <th>Proveedor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($pendientes as $pendiente) { ?>
                                <tr>
                                    <td><?=strftime('%Y-%m-%d', strtotime($pendiente['fecha']))?></td>
                                    <td><?=$pendiente['cantidadpendiente']?></td>
                                    <td><?=$pendiente['articulo']?></td>
                                    <td><?=$pendiente['proveedor']?></td>
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