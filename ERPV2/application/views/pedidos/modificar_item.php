<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/pedidos/">Listar pedidos</a></li>
                <li><a href="/pedidos/agregar/">Agregar pedido</a></li>
                <li class="active"><a href="/pedidos/agregar_items">Modificar Pedido</a></li>
            </ul>
        </div>
        
        <br>
        
        <a href="/pedidos/agregar_items/<?=$item_pedido['idpedido']?>/">
            <button class="btn btn-success">
                <i class="fa fa-chevron-left"></i> Volver al Pedido
            </button>
        </a>
        
        <br>
        
        <section class="invoice">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-header">
                        <div class="text-center">
                            <strong>Pedido # <?=$item_pedido['idpedido']?></strong>
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
                                    <input type="text" class="form-control" name="cantidad" value="<?=$item_pedido['cantidad']?>" autofocus required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-sx-12">
                            <div class="form-group">
                                <label class="control-label">Artículo</label>
                                <div class="controls controls-row">
                                    <select name="articulo" class="chosen form-control">
                                        <?php foreach($articulos as $articulo) { ?>
                                        <option value="<?=$articulo['idarticulo']?>"<?=($articulo['idarticulo']==$item_pedido['idarticulo'])?" selected":""?>><?=$articulo['producto']?> <?=$articulo['articulo']?> <?=$articulo['plano']?> Pos <?=$articulo['posicion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-sx-12">
                            <label class="control-label">Precio</label>
                            <div class="controls controls-row">
                                <input type="text" class="form-control" name="precio" value="<?=$item_pedido['precio']?>" required>
                            </div>
                        </div>
                        <div class="col-sm-1 col-md-1 col-sx-12">
                            <div class="form-group">
                                <label class="control-label">&nbsp;</label>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus"></i> Modificar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </section>
</div>