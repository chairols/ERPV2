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
                <li><a href="/reqs/">Listar REQ's</a></li>
                <li class="active"><a href="/reqs/agregar/">Agregar REQ</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Agregar REQ</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Órden de Trabajo</label>
                                <div class="controls checkbox">
                                    <input type="checkbox" name="checkbox" id="checkbox">
                                    <div id="selectot" style="display: none;">
                                        <select name="ot" class="span12 select2">
                                            <?php foreach($ots as $ot) { ?>
                                            <option value="<?=$ot['idot']?>"><?=$ot['numero_ot']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Cantidad</label>
                                <div class="controls">
                                    <input type="text" class="span12" value="<?=set_value('cantidad')?>" name="cantidad" required>
                                    <span class="help-inline"><?=form_error('cantidad', '<div class="alert alert-danger">', '</div>')?></span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Artículo</label>
                                <div class="controls">
                                    <select name="articulo" class="select2 span12">
                                        <?php foreach($articulos as $articulo) { ?>
                                        <option value="<?=$articulo['idarticulo']?>"><?=$articulo['producto']?> <?=$articulo['articulo']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Material</label>
                                <div class="controls">
                                    <select name="material" class="select2 span12">
                                        <?php foreach($materiales as $material) { ?>
                                        <option value="<?=$material['idmaterial']?>"><?=$material['material']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Destino</label>
                                <div class="controls">
                                    <select name="destino" class="select2 span12">
                                        <?php foreach($fabricas as $fabrica) { ?>
                                        <option value="<?=$fabrica['idfabrica']?>"><?=$fabrica['fabrica']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Observaciones</label>
                                <div class="controls">
                                    <textarea name="observaciones" class="span12"></textarea>
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
        $("#fecha").datepicker({
            format: 'yyyy-mm-dd'
        });
        
        $("#checkbox").click(function() {
            var flag = $("#checkbox").is(':checked');
            if(flag == true) {
                $("#selectot").fadeIn(500);
            } else {
                $("#selectot").fadeOut(500);
            }
        });
    }
</script>

