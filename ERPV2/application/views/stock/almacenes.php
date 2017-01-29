<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?=$title?></h3>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="row">
        <ul class="nav nav-tabs bar_tabs nav-tabs-justified">
            <li><a href="/stock/">Listar Stock</a></li>
            <li class="active"><a href="/stock/agregar">Agregar Stock</a></li>
            <li><a href="/stock/modificar/">Modificar Stock</a></li>
            <li><a href="/stock/ver/">Ver Stock</a></li>
            <li><a href="/stock/por_almacen/">Stock Por Almacén</a></li>
            <li><a href="/stock/con_stock/">Listar Con Stock</a></li>
            <li><a href="/stock/ingresar/">Ingresar Stock</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Artículo</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <dt>Artículo</dt>
                    <dd><?=$stock['producto']['producto']?> <?=$stock['articulo']['articulo']?></dd>
                    <dt>Marca</dt>
                    <dd><?=$stock['marca']['marca']?></dd>
                    <dt>Unidad de Medida</dt>
                    <dd><?=$stock['medida']['medida_larga']?></dd>
                    <dt>URL</dt>
                    <dd><a href="<?=$stock['url']?>" target="_blank"><?=$stock['url']?></a></dd>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Agregar Almacén al Stock</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="POST" class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-sx-12">Almacén</label>
                            <div class="col-md-9 col-sm-9 col-sx-12">
                                <select name="almacen" class="form-control sel2">
                                    <?php foreach($almacenes as $almacen) { ?>
                                    <option value="<?=$almacen['idalmacen']?>"><?=$almacen['almacen']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Almacenes Existentes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-hover table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Almacén</th>
                                <th>Ubicación</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($stock_almacenes as $sa) { ?>
                            <tr>
                                <td><?=$sa['cantidad']?></td>
                                <td><?=$sa['almacen']?></td>
                                <td><?=$sa['ubicacion']?></td>
                                <td>
                                    <a href="/stock/editar/<?=$sa['idstock_almacen']?>/"> 
                                        <button class="btn btn-xs btn-warning" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar">
                                            <i class="fa fa-edit"></i> 
                                        </button>
                                    </a>
                                    <a href="/log/ver/stock_almacenes/<?=$sa['idstock_almacen']?>/">
                                        <button class="btn btn-xs btn-info" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Log">
                                            <i class="fa fa-clock-o"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function inicio() {
        $(".sel2").select2();
    }
</script>