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
                            <h4><i class="icon-reorder"></i> Agregar Fábrica</h4>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="block-flat">
    <h4 class="page-header">
        <span class="pull-right">
            <a href="/log/ver/pedidos/<?=$pedido['idpedido']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Historial" class="label label-info">
                <i class="fa fa-clock-o"></i> 
            </a>
        </span>
        <span class="pull-right">
            <i class="fa fa-calendar"></i> <?=strftime('%d/%m/%Y', strtotime($pedido['timestamp']));?>&nbsp;
        </span>
        
        <i class="fa fa-file-text-o"></i> Pedido # <?=$pedido['idpedido']?>
    </h4>
    
    <div class="row-fluid">
        <div class="span6">
            <address>
                <strong><i class="fa fa-home"></i> <?=$cliente['cliente']?></strong>
                <br>
                <?=$cliente['domicilio']?>
                <br>
                <?=$cliente['localidad']?> / <?=$cliente['provincia']['provincia']?>
                <br>
                <?=$cliente['telefono']?>
                <br>
                <?=$pedido['ordendecompra']?>
                <br>
                <a href="<?=$pedido['adjunto']?>" target="_blank"><i class="fa fa-file-text-o"></i> Adjunto</a>
            </address>
        </div>
    </div>
    
    <form method="POST">
        <div class="row">
            <div class="col-lg-2 form-group">
                <div class="header">
                    Cantidad
                </div>
                <div class="content">
                    <input type="text" name="cantidad" class="form-control" maxlength="11" autofocus required>
                </div>
            </div>
            <div class="col-lg-6 form-group">
                <div class="header">
                    Artículo
                </div>
                <div class="content">
                    <select name="articulo" class="select2">
                        <?php foreach($articulos as $articulo) { ?>
                        <option value="<?=$articulo['idarticulo']?>"><?=$articulo['producto'].' '.$articulo['articulo'].' '.$articulo['plano']?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-2 form-group">
                <div class="header">
                    Precio
                </div>
                <div class="content">
                    <div class="input-group">
                        <span class="input-group-addon"><?=$pedido['moneda']['simbolo']?></span>
                        <input type="text" name="precio" class="form-control" maxlength="11" required>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 form-group">
                <div class="header">
                    &nbsp;
                </div>
                <div class="content">
                    <input type="submit" class="btn btn-primary" value="Agregar">
                </div>
            </div>
        </div>
    </form>
    
    <table class="table table-hover">
        <thead>
            <tr class="alert alert-info">
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
                <td><?=$item['producto'].' '.$item['articulo'].' '.$item['plano']?></td>
                <td class="text-right"><?=number_format($item['precio'], 2)?></td>
                <td class="text-right"><?=number_format($item['cantidad']*$item['precio'], 2)?></td>
                <td>
                    <a href="/pedidos/modificar_item/<?=$item['idpedido_item']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="label label-default"><i class="fa fa-pencil"></i></a>
                    <a href="/pedidos/borrar_item/<?=$item['idpedido_item']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar" class="label label-danger"><i class="fa fa-times"></i></a>
                </td>
                <?php $subtotal += ($item['cantidad'] * $item['precio']); ?>
            </tr>
            <?php } ?>
        </tbody>
        <thead>
            <tr class="alert alert-warning">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><strong>Subtotal</strong></td>
                <td class="text-right"><strong><?=number_format($subtotal, 2)?></strong></td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <thead>
            <tr class="alert alert-warning">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><strong>IVA 21%</strong></td>
                <td class="text-right"><strong><?=number_format($subtotal * 0.21, 2)?></strong></td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <thead>
            <tr class="alert alert-warning">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><strong>Total</strong></td>
                <td class="text-right"><strong><?=number_format($subtotal * 1.21, 2)?></strong></td>
                <td>&nbsp;</td>
            </tr>
        </thead>
    </table>
    <span>
        <a href="/pedidos/">
            <input type="button" class="btn btn-primary" value="Finalizar"> 
        </a>
    </span>
</div>