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
                <li><a href="/retenciones/">Listar Retenciones</a></li>
                <li class="active"><a href="/retenciones/agregar/">Agregar Retención</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Agregar Items</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="text-center">
                                    <h1><strong>Retención # <?=$retencion['idretencion']?></strong></h1>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="space20"></div>
                        <div class="row-fluid invoice-list">
                            <div class="span4">
                                <h4>PROVEEDOR</h4>
                                <p>
                                    <strong><?=$proveedor['proveedor']?></strong>
                                </p>
                            </div>
                            <div class="span4">
                                <h4>INFO</h4>
                                <p>
                                    Domicilio: <strong><?=$proveedor['domicilio']?></strong><br>
                                    Teléfono: <strong><?=$proveedor['telefono']?></strong><br>
                                    Localidad: <strong><?=$proveedor['localidad']?></strong><br>
                                    CUIT: <strong><?=$proveedor['cuit']?></strong>
                                </p>
                            </div>
                            <div class="span4">
                                <h4>RETENCION</h4>
                                <p>
                                    Moneda: <strong><?=$moneda['moneda']?></strong><br>
                                    Retención: <strong><?=$retencion['porcentaje']?>%</strong>
                                </p>
                            </div>
                        </div>
                        <div class="space20"></div>
                        <div class="space20"></div>
                        <div class="row-fluid">
                            <form method="POST">
                                <div class="span2">
                                    <div class="control-group">
                                        <label class="control-label">Punto de Venta</label>
                                        <div class="controls controls-row">
                                            <input type="text" maxlength="4" class="input-block-level span12" name="punto_de_venta" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="span2">
                                    <div class="control-group">
                                        <label class="control-label">Factura</label>
                                        <div class="controls controls-row">
                                            <input type="text" maxlength="8" class="input-block-level span12" name="factura" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="control-group">
                                        <label class="control-label">Fecha de Factura</label>
                                        <div class="controls controls-row">
                                            <input type="text" class="form-control" id="dp1" name="fecha_factura" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="control-group">
                                        <label class="control-label">Base Imponible</label>
                                        <div class="controls controls-row">
                                            <input type="text" class="form-control" name="base_imponible" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="span2">
                                    <div class="control-group">
                                        <label class="control-label">&nbsp;</label>
                                        <div class="controls controls-row">
                                            <button type="submit" class="btn btn-success">
                                                <i class="icon-plus"></i> Agregar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row-fluid">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><strong>Factura</strong></th>
                                        <th><strong>Fecha</strong></th>
                                        <th><strong>Base Imponible</strong></th>
                                        <th><strong>Monto Retenido</strong></th>
                                        <th><strong>Acciones</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0; ?>
                                    <?php foreach($items as $item) { ?>
                                    <tr>
                                        <td><?=$item['factura']?></td>
                                        <td><?=$item['fecha']?></td>
                                        <td><?=$item['base_imponible']?></td>
                                        <td><?=$item['retencion']?></td>
                                        <?php $total += $item['retencion']; ?>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><?=$total;?></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="space20"></div>
                        <div class="row-fluid text-center">
                            <a class="btn btn-success btn-large hidden-print" href="/retenciones/">
                                Finalizar <i class="icon-check"></i>
                            </a>
                            <a class="btn btn-inverse btn-large hidden-print" href="/retenciones/pdf/<?=$retencion['idretencion']?>/" target="_blank">
                                Generar PDF <i class="icon-file-text"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>