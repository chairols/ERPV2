<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?=$title?></h3>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="row">
        <ul class="nav nav-tabs bar_tabs nav-tabs-justified">
            <li><a href="/menu/">Listar Menú</a></li>
            <li class="active"><a href="/menu/agregar/">Agregar Menú</a></li>
            <li><a href="/menu/modificar/">Modificar Menú</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Agregar Menú</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="POST" class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Ícono</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <input type="text" maxlength="50" class="form-control" value="<?=set_value('icono')?>" name="icono" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Menú</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <input type="text" maxlength="50" class="form-control" value="<?=set_value('menu')?>" name="menu" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Href</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <input type="text" maxlength="100" class="form-control" value="<?=set_value('href')?>" name="href" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Orden</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <input type="number" maxlength="11" class="form-control" value="<?=set_value('orden')?>" name="orden" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Padre</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <select name="padre" id="select2" class="form-control">
                                    <option value="0" selected>--- No tiene ---</option>
                                    <?php foreach($padres as $padre) { ?>
                                    <option value="<?=$padre['idmenu']?>"><?=$padre['menu']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Visible</label>
                            <div class="col-md-6 col-sm-6 col-sx-12">
                                <input type="checkbox" class="flat" name="visible">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="reset" class="btn btn-primary">Limpiar</button>
                                <button type="submit" class="btn btn-success">Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function inicio() {
        $("#select2").select2();
    }
</script>