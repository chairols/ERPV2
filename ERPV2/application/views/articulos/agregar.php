<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?=$title?></h3>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="row">
        <ul class="nav nav-tabs bar_tabs nav-tabs-justified">
            <li><a href="/articulos/">Listar Artículos</a></li>
            <li class="active"><a href="/articulos/agregar/">Agregar Artículos</a></li>
            <li><a href="/articulos/modificar/">Modificar Artículo</a></li>
            <li><a href="/articulos/ver/">Ver Artículo</a></li>
            <li><a href="/articulos/borrados/">Artículos Borrados</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Agregar Artículo</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="POST" class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Artículo</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <input type="text" maxlength="100" class="form-control" name="articulo" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Plano</label>
                            <div class="col-md-1 col-sm-1 col-sx-12">
                                <input type="checkbox" id="checkbox">
                            </div>
                            <div class="col-md-5 col-sm-5 col-sx-12" id="selectplano">
                                <select class="sel2 form-control">
                                    <option>value</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Plano</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <select name="plano" class="sel2-allowclear form-control">
                                    <?php foreach($planos as $plano) { ?>
                                    <option value="<?=$plano['idplano']?>"><?=$plano['plano']?> Rev <?=$plano['revision']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Producto</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <select name="producto" class="sel2 form-control">
                                    <?php foreach($productos as $producto) { ?>
                                    <option value="<?=$producto['idproducto']?>"><?=$producto['producto']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="main-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                            
                            <div class="control-group">
                                <label class="control-label">Producto</label>
                                <div class="controls">
                                    <select name="producto" class="select2 span12">
                                        <?php foreach($productos as $producto) { ?>
                                        <option value="<?=$producto['idproducto']?>"><?=$producto['producto']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Posición</label>
                                <div class="controls">
                                    <input type="number" maxlength="11" class="span12" value="<?=set_value('posicion')?>" name="posicion" required>
                                    <span class="help-inline"><?=form_error('posicion', '<div class="alert alert-danger">', '</div>')?></span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Padres</label>
                                <div class="controls">
                                    <select name="padres[]" class="select2 span12" multiple="multiple">
                                        <?php foreach($articulos as $articulo) { ?>
                                        <option value="<?=$articulo['idarticulo']?>"><?=$articulo['producto']?> <?=$articulo['articulo']?> Rev <?=$articulo['revision']?> Pos <?=$articulo['posicion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Hijos</label>
                                <div class="controls">
                                    <select name="hijos[]" class="select2 span12" multiple="multiple">
                                        <?php foreach($articulos as $articulo) { ?>
                                        <option value="<?=$articulo['idarticulo']?>"><?=$articulo['producto']?> <?=$articulo['articulo']?> Rev <?=$articulo['revision']?> Pos <?=$articulo['posicion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Observaciones</label>
                                <div class="controls">
                                    <textarea name="observaciones" class="span12"><?=set_value('observaciones')?></textarea>
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
        $("#selectplano").hide();
        
        $("#checkbox").click(function() {
            var flag = $("#checkbox").is(':checked');
            if(flag == true) {
                $("#selectplano").fadeIn(500);
            } else {
                $("#selectplano").fadeOut(500);
            }
        });
        
        
        
        $(".sel2-allowclear").select2({
            placeholder: {
                id: "-1",
                text: "Seleccionar"
            },
            allowClear: true
        });
        $(".sel2-allowclear").val('val', '');
        
        $(".sel2").select2();
        
        
    };
    
    
</script>