<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/hojasdeproceso/">Listar Hojas de Proceso</a></li>
                <li class="active"><a href="/hojasdeproceso/agregar/">Agregar Hoja de Proceso</a></li>
                <li><a href="/hojasdeproceso/modificar/">Modificar Hoja de Proceso</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div class="box-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Hoja de Proceso N°</label>
                                <div class="col-md-6 col-sm-6 col-sx-12" id="resultado">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" maxlength="100" class="form-control" id="hojadeproceso" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button id="agregar" class="btn btn-success">Agregar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
