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
                <li><a href="/monedas/">Listar Monedas</a></li>
                <li class="active"><a href="/monedas/agregar/">Agregar Moneda</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Agregar Insumo</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Moneda</label>
                                <div class="controls">
                                    <input type="text" maxlength="50" class="input-xlarge" value="<?=set_value('moneda')?>" name="moneda" autofocus required>
                                    <span class="help-inline">
                                        <?=form_error('moneda', '<div class="alert alert-danger">', '</div>')?>
                                        <?=$alerta?>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Símbolo</label>
                                <div class="controls">
                                    <input type="text" maxlength="10" class="input-xlarge" value="<?=set_value('simbolo')?>" name="simbolo" required>
                                    <span class="help-inline">
                                        <?=form_error('simbolo', '<div class="alert alert-danger">', '</div>')?>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Currency</label>
                                <div class="controls">
                                    <input type="text" maxlength="3" class="input-xlarge" value="<?=set_value('currency')?>" name="currency" required>
                                    <span class="help-inline">
                                        <?=form_error('currency', '<div class="alert alert-danger">', '</div>')?>
                                    </span>
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