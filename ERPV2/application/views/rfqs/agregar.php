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
                <li><a href="/rfqs/">Listar RFQ's</a></li>
                <li class="active"><a href="/rfqs/agregar/">Agregar RFQ</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Agregar RFQ</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Órden de Trabajo</label>
                                <div id="ot" class="help-inline">
                                    <select class="select2 input-xlarge" name="ot">
                                        <?php foreach($ots as $ot) { ?>
                                        <option value="<?=$ot['idot']?>"><?=$ot['numero_ot']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                No Aplica <input type="checkbox" name="checkbox" id="checkbox" >
                            </div>
                            <div class="control-group">
                                <label class="control-label">Cantidad</label>
                                <input type="text" class="input-xlarge" value="<?=set_value('cantidad')?>" name="cantidad" required>
                                <span class="help-inline"><?=form_error('cantidad', '<div class="alert alert-danger">', '</div>')?></span>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Artículo</label>
                                <select name="articulo" class="select2 input-xlarge">
                                    <?php foreach($articulos as $articulo) { ?>
                                    <option value="<?=$articulo['idarticulo']?>"><?=$articulo['producto']?> <?=$articulo['articulo']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Material</label>
                                <select name="material" class="select2 input-xlarge">
                                    <?php foreach($materiales as $material) { ?>
                                    <option value="<?=$material['idmaterial']?>"><?=$material['material']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Destino</label>
                                <select name="destino" class="select2 input-xlarge">
                                    <?php foreach($fabricas as $fabrica) { ?>
                                    <option value="<?=$fabrica['idfabrica']?>"><?=$fabrica['fabrica']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Observaciones</label>
                                <textarea name="observaciones" class="input-xlarge"></textarea>
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



<div class="block-flat">
    <form role="form" method="post">
        <div class="form-group">
            <label>Item</label>
            <input type="text" maxlength="11" class="form-control" value="<?=set_value('item')?>" name="item" >
            <?=form_error('item', '<div class="alert alert-danger">', '</div>')?>
        </div>
        
        <div class="form-group">
            <label>Fecha</label>
            <input type="text" class="form-control" id="fecha" name="fecha" readonly>
            <?=form_error('fecha', '<div class="alert alert-danger">', '</div>')?>
        </div>
        
        <div class="form-group">
            <label>Orden de Trabajo</label>
            <select class="select2" name="ot">
                <option value="null">NO</option>
                <?php foreach($ots as $ot) { ?>
                <option value="<?=$ot['idot']?>"><?=$ot['numero_ot']?></option>
                <?php } ?>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>

<script type="text/javascript">
    function inicio() {
        $("#fecha").datepicker({
            format: 'yyyy-mm-dd'
        });
        
        $("#checkbox").click(function() {
            ot();
        });
    }

    function ot() {
        if($("#checkbox").is(':checked')) {
            $("#ot").fadeOut(500);
        } else {
            $("#ot").fadeIn(500);
        }
    }
</script>