<div id="main-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">
                    <?=$title?>
                </h3>
            </div>
        </div>
        
        <ul class="nav nav-tabs nav-tabs-justified">
            <li><a href="/stock/">Listar Stock</a></li>
            <li><a href="/stock/modificar/">Modificar Stock</a></li>
            <li class="active"><a href="/stock/ver/">Ver Stock</a></li>
        </ul>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Ver Stock</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Artículo</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" value="<?=$articulo['articulo']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Producto</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" value="<?=$producto['producto']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Posición</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" value="<?=$articulo['posicion']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Cantidad</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" value="<?=$articulo['cantidad']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Unidad de Medida</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" value="<?=$medida['medida_larga']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Ubicación</label>
                                <div class="controls">
                                    <input type="text" maxlength="255" value="<?=$articulo['ubicacion']?>" class="input-xlarge" readonly>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>