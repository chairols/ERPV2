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
                <li><a href="/ocs/">Listar O.C.S.</a></li>
                <li class="active"><a href="/ocs/agregar/">Agregar O.C.</a></li>
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
                                    <h1><strong>Orden de Compra # <?=$oc['idoc']?></strong></h1>
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
                                    Localidad: <strong><?=$proveedor['localidad']?></strong>
                                </p>
                            </div>
                            <div class="span4">
                                <h4>ORDEN DE COMPRA</h4>
                                <p>
                                    Moneda: <strong><?=$moneda['moneda']?></strong>
                                </p>
                            </div>
                        </div>
                        <div class="space20"></div>
                        <div class="space20"></div>
                        <div class="row-fluid">
                            <form method="POST">
                                <div class="span1">
                                    <div class="control-group">
                                        <label class="control-label">Cantidad</label>
                                        <div class="controls controls-row">
                                            <input type="text" class="input-block-level span12" name="cantidad" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="span1">
                                    <div class="control-group">
                                        <label class="control-label">U.M.</label>
                                        <div class="controls controls-row">
                                            <select name="medida" class="select2 span12">
                                                <?php foreach($medidas as $medida) { ?>
                                                <option value="<?=$medida['idmedida']?>"><?=$medida['medida_corta']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label">Artículo</label>
                                        <div class="controls controls-row">
                                            <select name="articulo" class="select2 span12">
                                                <?php foreach($articulos as $articulo) { ?>
                                                <option value="<?=$articulo['idarticulo']?>"><?=$articulo['producto']?> <?=$articulo['articulo']?> <?=$articulo['plano']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="span2">
                                    <div class="control-group">
                                        <label class="control-label">Precio</label>
                                        <div class="controls controls-row">
                                            <input type="text" name="precio" class="input-block-level span12" required>
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
                                        <th><strong><div class="text-right">Cantidad</div></strong></th>
                                        <th><strong>U.M.</strong></th>
                                        <th><strong>Artículo</strong></th>
                                        <th><strong><div class="text-right">Precio Unitario</div></strong></th>
                                        <th><strong><div class="text-right">Precio Total</div></strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $subtotal = 0; ?>
                                    <?php foreach($ocs_items as $item) { ?>
                                    <tr>
                                        <td><div class="text-right"><?=$item['cantidad']?></div></td>
                                        <td><?=$item['medida_corta']?></td>
                                        <td><?=$item['producto']?> <?=$item['articulo']?></td>
                                        <td><div class="text-right"><?=$item['precio'];?></div></td>
                                        <td><div class="text-right"><?=number_format($item['cantidad'] * $item['precio'], 2);?></div></td>
                                        <td>
                                            <a href="/ocs/editar_item/<?=$item['idoc_item']?>/">
                                                <i class="alert-info icon-edit tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Editar"></i>
                                            </a>
                                            <a href="/ocs/borrar_item/<?=$item['idoc_item']?>/">
                                                <i class="alert-danger icon-remove tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar"></i>
                                            </a>
                                        </td>
                                        <?php $subtotal += $item['cantidad'] * $item['precio']; ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="space20"></div>
                        <div class="row-fluid">
                            <div class="span4 invoice-block pull-right">
                                <ul class="unstyled amounts">
                                    <li>
                                        <strong>Subtotal : </strong> <?=number_format($subtotal, 2)?>
                                    </li>
                                    <li>
                                        <strong>IVA : </strong> <?=number_format($subtotal * 0.21, 2)?>
                                    </li>
                                    <li>
                                        <strong>Total : </strong> <?=number_format($subtotal * 1.21, 2)?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="space20"></div>
                        <div class="row-fluid text-center">
                            <a class="btn btn-success btn-large hidden-print" href="#">
                                Finalizar <i class="icon-check"></i>
                            </a>
                            <a class="btn btn-inverse btn-large hidden-print" href="/ocs/pdf/<?=$oc['idoc']?>/" target="_blank">
                                Generar PDF <i class="icon-file-text"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>