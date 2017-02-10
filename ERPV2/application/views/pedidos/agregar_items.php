<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/pedidos/">Listar pedidos</a></li>
                <li class="active"><a href="/pedidos/agregar/">Agregar pedido</a></li>
            </ul>
        </div>
        
        <br>
        
        <section class="invoice">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-header">
                        <div class="text-center">
                            <strong>Pedido # <?=$pedido['idpedido']?></strong>
                        </div>
                    </h1>
                </div>
            </div>
            <div class="row invoice-info">
                <div class="col-md-4 col-sm-4 col-xs-12 invoice-col">
                    CLIENTE
                    <address>
                        <strong><?=$cliente['cliente']?></strong>
                    </address>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 invoice-col">
                    INFO
                    <address>
                        Domicilio: <strong><?=$cliente['domicilio']?></strong><br>
                        Teléfono: <strong><?=$cliente['telefono']?></strong><br>
                        Localidad: <strong><?=$cliente['localidad']?></strong>
                    </address>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 invoice-col">
                    PEDIDO
                    <address>
                        Número de Pedido: <strong><?=$pedido['idpedido']?></strong><br>
                        Moneda: <strong><?=$pedido['moneda']['moneda']?></strong><br>
                        Orden de Compra: <strong><?=$pedido['ordendecompra']?></strong><br>
                        Adjunto: <?php if($pedido['adjunto'] != "") { ?>
                        <a href="<?=$pedido['adjunto']?>" target="_blank">
                            <button class="btn btn-info btn-xs">
                                <i class="fa fa-file-text"></i>
                            </button>
                        </a>
                        <?php } ?>
                    </address>
                </div>
            </div>
            <div class="row">
                <form method="POST" class="form">
                    <div class="row-fluid">
                        <div class="col-sm-2 col-md-2 col-sx-12">
                            <div class="form-group">
                                <label class="control-label">Cantidad</label>
                                <div class="controls controls-row">
                                    <input type="text" class="form-control" name="cantidad" autofocus required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-sx-12">
                            <div class="form-group">
                                <label class="control-label">Artículo</label>
                                <div class="controls controls-row">
                                    <select name="articulo" class="select2 form-control">
                                        <?php foreach($articulos as $articulo) { ?>
                                        <option value="<?=$articulo['idarticulo']?>"><?=$articulo['producto']?> <?=$articulo['articulo']?> <?=$articulo['plano']?> Pos <?=$articulo['posicion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-sx-12">
                            <label class="control-label">Precio</label>
                            <div class="controls controls-row">
                                <input type="text" class="form-control" name="precio" required>
                            </div>
                        </div>
                        <div class="col-sm-1 col-md-1 col-sx-12">
                            <div class="form-group">
                                <label class="control-label">&nbsp;</label>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus"></i> Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-sx-12">
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
                                    <a href="/pedidos/modificar_item/<?=$item['idpedido_item']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar">
                                        <button class="btn btn-warning btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                    <a href="/pedidos/borrar_item/<?=$item['idpedido_item']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar">
                                        <button class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </a>
                                    <a href="/pedidos/asociar_ot/<?=$item['idpedido_item']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Asociar Orden de Trabajo">
                                        <button class="btn btn-success btn-xs">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php $subtotal += ($item['cantidad'] * $item['precio']); ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4 col-sx-12 pull-right">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal :</th>
                                <td><?=number_format($subtotal, 2)?></td>
                            </tr>
                            <tr>
                                <th style="width:50%">IVA :</th>
                                <td><?=number_format($subtotal * 0.21, 2)?></td>
                            </tr>
                            <tr>
                                <th style="width:50%">Total : </th>
                                <td><?=number_format($subtotal * 1.21, 2)?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div>