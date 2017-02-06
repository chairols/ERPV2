<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/ocs/">Listar O.C.S.</a></li>
                <li><a href="/ocs/agregar/">Agregar O.C.</a></li>
                <li class="active"><a href="/ocs/agregar_items/">Modificar O.C.</a></li>
            </ul>
        </div>
        
        <br>
        
        <section class="invoice">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-header">
                        <div class="text-center">
                            <strong>Orden de Compra # <?=$oc['idoc']?></strong>
                        </div>
                    </h1>
                </div>
            </div>
            <div class="row invoice-info">
                <div class="col-md-4 col-sm-4 col-xs-12 invoice-col">
                    PROVEEDOR
                    <address>
                        <strong><?=$proveedor['proveedor']?></strong>
                    </address>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 invoice-col">
                    INFO
                    <address>
                        Domicilio: <strong><?=$proveedor['domicilio']?></strong><br>
                        Teléfono: <strong><?=$proveedor['telefono']?></strong><br>
                        Localidad: <strong><?=$proveedor['localidad']?></strong>
                    </address>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 invoice-col">
                    ORDEN DE COMPRA
                    <address>
                        Moneda: <strong><?=$moneda['moneda']?></strong>
                    </address>
                </div>
            </div>
            <div class="row">
                <form method="POST" class="form">
                    <div class="row-fluid">
                        <div class="col-sm-1 col-md-1 col-sx-12">
                            <div class="form-group">
                                <label class="control-label">Cantidad</label>
                                <div class="controls controls-row">
                                    <input type="text" class="form-control" name="cantidad" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-md-1 col-sx-12">
                            <div class="form-group">
                                <label class="control-label">U.M.</label>
                                <select name="medida" class="select2 form-control">
                                    <?php foreach($medidas as $medida) { ?>
                                    <option value="<?=$medida['idmedida']?>"><?=$medida['medida_corta']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-5 col-md-5 col-sx-12">
                            <div class="form-group">
                                <label class="control-label">Artículo</label>
                                <select name="articulo" class="select2 form-control">
                                    <?php foreach($articulos as $articulo) { ?>
                                    <option value="<?=$articulo['idarticulo']?>"><?=$articulo['producto']?> <?=$articulo['articulo']?> <?=$articulo['plano']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-sx-12">
                            <div class="form-group">
                                <label class="control-label">Entrega</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control datepicker" name="fecha" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-sx-12">
                            <div class="form-group">
                                <label class="control-label">Precio</label>
                                <input type="text" name="precio" class="form-control" required>
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
                                <th><strong><div class="text-right">Cantidad</div></strong></th>
                                <th><strong>U.M.</strong></th>
                                <th><strong>Artículo</strong></th>
                                <th><strong>Fecha</strong></th>
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
                                <td><?=date('d/m/Y', strtotime($item['fecha']))?></td>
                                <td><div class="text-right"><?=$item['precio'];?></div></td>
                                <td><div class="text-right"><?=number_format($item['cantidad'] * $item['precio'], 2);?></div></td>
                                <td>
                                    <a href="/ocs/editar_item/<?=$item['idoc_item']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Editar">
                                        <button class="btn btn-warning btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                    <a href="/ocs/borrar_item/<?=$item['idoc_item']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar">
                                        <button class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </a>
                                    <a href="/ocs/asociar_ot/<?=$item['idoc_item']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Asociar Orden de Trabajo">
                                        <button class="btn btn-success btn-xs">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </a>
                                </td>
                                <?php $subtotal += $item['cantidad'] * $item['precio']; ?>
                            </tr>
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
            
            <div class="row">
                <div class="col-sm-12 col-md-12 col-sx-12">
                    <a class="btn btn-primary btn-large pull-right" href="/ocs/pdf/<?=$oc['idoc']?>/" target="_blank">
                        Generar PDF <i class="fa fa-file-text"></i>
                    </a>
                </div>
            </div>
        </section>
        
        
    </section>
</div>
