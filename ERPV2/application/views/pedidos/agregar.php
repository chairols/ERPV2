<ul class="nav nav-tabs nav-tabs-justified">
    <li><a href="/pedidos/">Listar pedidos</a></li>
    <li class="active"><a href="/pedidos/agregar/">Agregar pedido</a></li>
</ul>

<div class="block-flat">
    <form role="form" method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <label>Cliente</label>
            <select name="cliente" class="select2">
                <?php foreach($clientes as $cliente) { ?>
                <option value="<?=$cliente['idcliente']?>"><?=$cliente['cliente']?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="form-group">
            <label>Moneda</label>
            <select name="moneda" class="select2">
                <?php foreach($monedas as $moneda) { ?>
                <option value="<?=$moneda['idmoneda']?>"><?=$moneda['moneda']?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="form-group">
            <label>Orden de Compra</label>
            <input type="text" maxlength="100" class="form-control" value="<?=set_value('ordendecompra')?>" name="ordendecompra">
        </div>
        
        <div class="form-group">
            <label>Adjunto</label>
            <input type="file" class="form-control" name="adjunto">
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
        
    </form>
</div>