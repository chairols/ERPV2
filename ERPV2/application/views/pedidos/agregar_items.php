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
                <li><a href="/pedidos/">Listar pedidos</a></li>
                <li class="active"><a href="/pedidos/agregar/">Agregar pedido</a></li>
            </ul>
            
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
                                        <h1><strong>Pedido # <?=$pedido['idpedido']?></strong></h1>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="space20"></div>
                            <div class="row-fluid invoice-list">
                                <div class="span4">
                                    <h4>CLIENTE</h4>
                                    <p>
                                        <strong><?=$cliente['cliente']?></strong>
                                    </p>
                                </div>
                                <div class="span4">
                                    <h4>INFO</h4>
                                    <p>
                                        Domicilio: <strong><?=$cliente['domicilio']?></strong><br>
                                        Teléfono: <strong><?=$cliente['telefono']?></strong><br>
                                        Localidad: <strong><?=$cliente['localidad']?></strong>
                                    </p>
                                </div>
                                <div class="span4">
                                    <h4>PEDIDO</h4>
                                    <p>
                                        Número de Pedido: <strong><?=$pedido['idpedido']?></strong><br>
                                        Moneda: <strong><?=$pedido['moneda']['moneda']?></strong><br>
                                        Orden de Compra: <strong><?=$pedido['ordendecompra']?></strong><br>
                                        Adjunto: <?php if($pedido['adjunto'] != "") { ?>
                                        <a href="<?=$pedido['adjunto']?>" target="_blank"><i class="icon-file-text"></i></a>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>
                            <div class="space20"></div>
                            <div class="space20"></div>
                            <div class="row-fluid">
                                <form method="post">
                                    <div class="span2">
                                        <div class="control-group">
                                            <label class="control-label"><strong>Cantidad</strong></label>
                                            <div class="controls controls-row">
                                                <input type="text" class="input-block-level" name="cantidad" autofocus required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <div class="control-group">
                                            <label class="control-label"><strong>Artículo</strong></label>
                                            <div class="controls controls-row">
                                                <select name="articulo" class="select2 input-xxlarge">
                                                    <?php foreach($articulos as $articulo) { ?>
                                                    <option value="<?=$articulo['idarticulo']?>"><?=$articulo['producto']?> <?=$articulo['articulo']?> <?=$articulo['plano']?> Pos <?=$articulo['posicion']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span2">
                                        <div class="control-group">
                                            <label class="control-label"><strong>Precio</strong></label>
                                            <div class="controls controls-row">
                                                <input type="text" class="input-block-level" name="precio" required>
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
                                            <th><strong>Cantidad</strong></th>
                                            <th><strong>Artículo</strong></th>
                                            <th><strong>Precio Unitario</strong></th>
                                            <th><strong>Precio Total</strong></th>
                                            <th><strong>Acción</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $subtotal = 0; ?>
                                        <?php foreach($pedido_items as $item) { ?>
                                        <tr>
                                            <td><?=$item['cantidad']?></td>
                                            <td><?=$item['producto']?> <?=$item['articulo']?></td>
                                            <td><?=$pedido['moneda']['simbolo']?> <?=number_format($item['precio'], 2)?></td>
                                            <td><?=$pedido['moneda']['simbolo']?> <?=number_format($item['cantidad'] * $item['precio'], 2)?></td>
                                            <td>
                                                <a href="/pedidos/modificar_item/<?=$item['idpedido_item']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="label label-info tooltips"><i class="icon-edit"></i></a>
                                                <a href="/pedidos/borrar_item/<?=$item['idpedido_item']?>"><i class="alert-danger icon-remove tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar"></i></a>
                                                <a href="/pedidos/asociar_ot/<?=$item['idpedido_item']?>/"><i class="alert-success icon-plus tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Asociar Orden de Trabajo"></i></a>
                                            </td>
                                        </tr>
                                        <?php $subtotal += ($item['cantidad'] * $item['precio']); ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="space20"></div>
                            <div class="row-fluid">
                                <div class="span4 invoice-block pull-right">
                                    <ul class="unstyled amounts">
                                        <li>
                                            <strong>SUBTOTAL : </strong><?=$pedido['moneda']['simbolo']?> <?=number_format($subtotal, 2)?>
                                        </li>
                                        <li>
                                            <strong>IVA : </strong><?=$pedido['moneda']['simbolo']?> <?=number_format($subtotal*0.21, 2)?>
                                        </li>
                                        <li>
                                            <strong>TOTAL : </strong><?=$pedido['moneda']['simbolo']?> <?=number_format($subtotal*1.21, 2)?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

