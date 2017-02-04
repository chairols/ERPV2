<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/stock/">Listar Stock</a></li>
                <li class="active"><a href="/stock/agregar">Agregar Stock</a></li>
                <li><a href="/stock/modificar/">Modificar Stock</a></li>
                <li><a href="/stock/ver/">Ver Stock</a></li>
                <li><a href="/stock/por_almacen/">Stock Por Almacén</a></li>
                <li><a href="/stock/con_stock/">Listar Con Stock</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Artículo</h3>
                    </div>
                    <div class="box-body">
                        <dl class="dl-horizontal">
                            <dt>Artículo</dt>
                            <dd><?=$stock['producto']['producto']?> <?=$stock['articulo']['articulo']?></dd>
                            <dt>Marca</dt>
                            <dd><?=$stock['marca']['marca']?></dd>
                            <dt>Unidad de Medida</dt>
                            <dd><?=$stock['medida']['medida_larga']?></dd>
                            <dt>URL</dt>
                            <dd><a href="<?=$stock['url']?>" target="_blank"><?=$stock['url']?></a></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Agregar Almacén al Stock</h3>
                    </div>
                    <div class="box-body">
                        <form method="POST" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Almacén</label>
                                <div class="col-md-9 col-sm-9 col-sx-12">
                                    <select name="almacen" class="form-control select2">
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
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Almacenes Existentes</h3>
                    </div>
                    <div class="box-body">
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
                                        <a href="/stock/modificar/<?=$sa['idstock_almacen']?>/"> 
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
    </section>
</div>