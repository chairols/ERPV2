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
                <li><a href="/marcas/">Listar Marcas</a></li>
                <li class="active"><a href="/marcas/agregar/">Agregar Marca</a></li>
                <li><a href="/marcas/modificar/">Modificar Marca</a></li>
                <li><a href="/marcas/ver/">Ver Marca</a></li>
                <li><a href="/marcas/borradas/">Marcas Borradas</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Agregar Marca</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Marca</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="input-xlarge" value="<?=set_value('marca')?>" name="marca" required autofocus>
                                    <?=form_error('marca', '<div class="alert alert-danger">', '</div>')?>
                                    <?=$alerta?>
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

