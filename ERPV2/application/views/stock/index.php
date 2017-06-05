<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/stock/">Listar Stock</a></li>
                <li><a href="/stock/agregar">Agregar Stock</a></li>
                <li><a href="/stock/modificar/">Modificar Stock</a></li>
                <li><a href="/stock/ver/">Ver Stock</a></li>
                <li><a href="/stock/por_almacen/">Stock Por Almacén</a></li>
                <li><a href="/stock/con_stock/">Listar Con Stock</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div id="gears">
                        <div class="overlay">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                    </div>
                    <div id="tabla" style="display: none;">
                        <div class="box-body">
                            <table id="datatable" class="table table-striped table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th><strong>Artículo</strong></th>
                                        <th><strong>Marca</strong></th>
                                        <th><strong>Cantidad</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($stock as $s) { ?>
                                    <?php if($s['cantidad'] > 0) { ?>
                                    <tr>
                                        <td><?=$s['producto']?> <?=$s['articulo']?></td>
                                        <td><?=$s['marca']?></td>
                                        <td><?=$s['cantidad']?> <?=$s['medida_corta']?></td>
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
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function inicio() {
        $("#gears").hide();
        $("#tabla").fadeIn(1000);
    }
</script>