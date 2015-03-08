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
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Agregar Pedido</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">Cliente</label>
                                <div class="controls">
                                    <select name="cliente" class="select2 input-xlarge">
                                        <?php foreach($clientes as $cliente) { ?>
                                        <option value="<?=$cliente['idcliente']?>"><?=$cliente['cliente']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Moneda</label>
                                <div class="controls">
                                    <select name="moneda" class="select2 input-xlarge">
                                        <?php foreach($monedas as $moneda) { ?>
                                        <option value="<?=$moneda['idmoneda']?>"><?=$moneda['moneda']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Órden de Compra</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="input-xlarge" value="<?=set_value('ordendecompra')?>" name="ordendecompra">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Adjunto</label>
                                <div class="controls">
                                    <input type="file" class="input-xlarge" name="adjunto">
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">
                                    <i class="icon-save"></i> Guardar
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    <i class="icon-remove"></i> Limpiar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>