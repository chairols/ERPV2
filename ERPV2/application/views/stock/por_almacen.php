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
            <li><a href="/stock/agregar">Agregar Stock</a></li>
            <li><a href="/stock/modificar/">Modificar Stock</a></li>
            <li><a href="/stock/ver/">Ver Stock</a></li>
            <li class="active"><a href="/stock/por_almacen/">Stock Por Almacén</a></li>
            <li><a href="/stock/con_stock/">Listar Con Stock</a></li>
            <li><a href="/stock/ingresar/">Ingresar Stock</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Listar Stock por Almacén</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="POST" class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-1 col-sm-1 col-sx-12">Almacén</label>
                            <div class="col-md-8 col-sm-8 col-sx-12">
                                <select name="almacen" class="form-control sel2">
                                    <?php foreach($almacenes as $almacen) { ?>
                                    <option value="<?=$almacen['idalmacen']?>"<?=($almacen['idalmacen']==$almacen_seleccionado)?" selected":""?>><?=$almacen['almacen']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" class="col-md-2 col-sm-2 col-sx-12 btn btn-success">
                                <i class="fa fa-search"></i> Buscar
                            </button>
                        </div>
                    </form>
                    <table id="datatable-responsive" class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th><strong>Artículo</strong></th>
                                <th><strong>Marca</strong></th>
                                <th><strong>Cantidad</strong></th>
                                <th><strong>Unidad de Medida</strong></th>
                                <th><strong>Almacén</strong></th>
                                <th><strong>Ubicación</strong></th>
                                <th><strong>Acción</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($stock as $s) { ?>
                            <tr>
                                <td><?=$s['producto']?> <?=$s['articulo']?></td>
                                <td><?=$s['marca']?></td>
                                <td><?=$s['cantidad']?></td>
                                <td><?=$s['medida_larga']?></td>
                                <td><?=$s['almacen']?></td>
                                <td><?=$s['ubicacion']?></td>
                                <td>
                                    <a href="/stock/almacenes/<?=$s['idstock']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
                                        <button class="btn btn-xs btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                    <a href="/log/ver/stock/<?=$s['idstock']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Log" class="tooltips">
                                        <button class="btn btn-xs btn-info">
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