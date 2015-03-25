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
                <li><a href="/menu/">Listar Menú</a></li>
                <li class="active"><a href="/menu/agregar/">Agregar Menú</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Agregar Menú</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Menú</label>
                                <div class="controls">
                                    <input type="text" maxlength="50" class="input-xlarge" value="<?=set_value('menu')?>" name="menu" autofocus required>
                                    <span class="help-inline">
                                        <?=form_error('menu', '<div class="alert alert-danger">', '</div>')?>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Href</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="input-xlarge" value="<?=set_value('href')?>" name="href" required>
                                    <span class="help-inline">
                                        <?=form_error('href', '<div class="alert alert-danger">', '</div>')?>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Orden</label>
                                <div class="controls">
                                    <input type="number" maxlength="11" class="input-xlarge" value="<?=set_value('orden')?>" name="orden" required>
                                    <span class="help-inline">
                                        <?=form_error('href', '<div class="alert alert-danger">', '</div>')?>
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Padre</label>
                                <div class="controls">
                                    <select name="padre" class="select2 input-xlarge">
                                        <option value="0" selected>--- No tiene ---</option>
                                        <?php foreach($padres as $padre) { ?>
                                        <option value="<?=$padre['idmenu']?>"><?=$padre['menu']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Visible</label>
                                <div class="controls">
                                    <div class="checker">
                                        <input type="checkbox" name="visible"> 
                                    </div>
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