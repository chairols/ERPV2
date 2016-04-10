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
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Editar Item</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Cantidad</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="span12" name="cantidad" value="<?=$item['cantidad']?>" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Unidad de Medida</label>
                                <div class="controls">
                                    <select name="medida" class="select2 span12">
                                        <?php foreach($medidas as $medida) { ?>
                                        <option value="<?=$medida['idmedida']?>"<?=($medida['idmedida']==$item['idmedida'])?" selected":""?>><?=$medida['medida_corta']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Artículo</label>
                                <div class="controls">
                                    <select name="articulo" class="select2 span12">
                                        <?php foreach($articulos as $articulo) { ?>
                                        <option value="<?=$articulo['idarticulo']?>"<?=($articulo['idarticulo']==$item['idarticulo'])?" selected":""?>><?=$articulo['producto']?> <?=$articulo['articulo']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Precio Unitario</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="span12" name="precio" value="<?=$item['precio']?>" required>
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