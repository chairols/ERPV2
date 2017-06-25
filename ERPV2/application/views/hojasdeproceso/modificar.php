<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/hojasdeproceso/">Listar Hojas de Proceso</a></li>
                <li><a href="/hojasdeproceso/agregar/">Agregar Hoja de Proceso</a></li>
                <li class="active"><a href="/hojasdeproceso/modificar/">Modificar Hoja de Proceso</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="box box-primary">
                    
                </div>
            </div>
            
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Artículos</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Artículo</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select id="articulo" class="form-control select2">
                                        <?php foreach($articulos as $articulo) { ?>
                                        <option value="<?=$articulo['idarticulo']?>"><?=$articulo['producto']?> <?=$articulo['articulo']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <input type="hidden" id="hojadeproceso" value="<?=$idhojadeproceso?>">
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button id="asociar_articulo" class="btn btn-success">Asociar</button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="hojasdeproceso_articulos"></div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>