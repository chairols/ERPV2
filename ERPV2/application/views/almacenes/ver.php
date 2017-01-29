<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?=$title?></h3>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="row">
        <ul class="nav nav-tabs bar_tabs nav-tabs-justified">
            <li><a href="/almacenes/">Listar Almacenes</a></li>
            <li><a href="/almacenes/agregar/">Agregar Almacén</a></li>
            <li><a href="/almacenes/modificar/">Modificar Almacén</a></li>
            <li class="active"><a href="/almacenes/ver/">Ver Almacén</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ver Almacén</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-sx-12">Almacén</label>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <input type="text" maxlength="100" class="form-control" value="<?=$almacen['almacen']?>" disabled>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>