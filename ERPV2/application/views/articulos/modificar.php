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
            <li><a href="/articulos/">Listar Artículos</a></li>
            <li><a href="/articulos/agregar/">Agregar Artículos</a></li>
            <li class="active"><a href="/articulos/modificar/">Modificar Artículo</a></li>
            <li><a href="/articulos/ver/">Ver Artículo</a></li>
            <li><a href="/articulos/borrados/">Artículos Borrados</a></li>
        </ul>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Modificar Artículo</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">Artículo</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="input-xlarge" value="<?=htmlentities($articulo['articulo'])?>" name="articulo" required autofocus>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Plano</label>
                                <div class="controls checkbox">
                                    <input type="checkbox" name="checkbox" id="checkbox"<?=($articulo['idplano'])?" checked":""?>>
                                    <div id="selectplano" style="display: none;">
                                        <select name="plano" class="input-xlarge select2">
                                            <?php foreach($planos as $plano) { ?>
                                            <option value="<?=$plano['idplano']?>"<?=($plano['idplano']==$articulo['idplano'])?" selected":""?>><?=$plano['plano']?> Rev <?=$plano['revision']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <span class="help-inline"><?=form_error('plano', '<div class="alert alert-danger">', '</div>')?></span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Producto</label>
                                <div class="controls">
                                    <select name="producto" class="select2 input-xlarge">
                                        <?php foreach($productos as $producto) { ?>
                                        <option value="<?=$producto['idproducto']?>"<?=($producto['idproducto']==$articulo['idproducto'])?" selected":""?>><?=$producto['producto']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Posición</label>
                                <div class="controls">
                                    <input type="number" maxlength="11" class="input-xlarge" value="<?=$articulo['posicion']?>" name="posicion" required>
                                    <span class="help-inline"><?=form_error('posicion', '<div class="alert alert-danger">', '</div>')?></span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Padres</label>
                                <div class="controls">
                                    <select name="padres[]" class="select2 span12" multiple="multiple">
                                        <?php foreach($padres as $padre) { ?>
                                        <option value="<?=$padre['idarticulo']?>"<?=($padre['idarticulo_hijo']==$articulo['idarticulo'])?" selected":""?>><?=$padre['producto']?> <?=$padre['articulo']?> Rev <?=$padre['revision']?> Pos <?=$padre['posicion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Hijos</label>
                                <div class="controls">
                                    <select name="hijos[]" class="select2 span12" multiple="multiple">
                                        <?php foreach($hijos as $hijo) { ?>
                                        <option value="<?=$hijo['idarticulo']?>"<?=($hijo['idarticulo_padre']==$articulo['idarticulo'])?" selected":""?>><?=$hijo['producto']?> <?=$hijo['articulo']?> Rev <?=$hijo['revision']?> Pos <?=$hijo['posicion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Observaciones</label>
                                <div class="controls">
                                    <textarea name="observaciones" class="input-xlarge"><?=$articulo['observaciones']?></textarea>
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

<script type="text/javascript">
    function inicio() {
        //$("#selectplano").hide();
        
        $("#checkbox").click(function() {
            var flag = $("#checkbox").is(':checked');
            if(flag == true) {
                $("#selectplano").fadeIn(500);
            } else {
                $("#selectplano").fadeOut(500);
            }
        });
        
        if($("#checkbox").is(':checked')) {
            $("#selectplano").fadeIn(500);
        }
    };  
</script>
