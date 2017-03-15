<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/imagenes/">Listar Imágenes</a></li>
                <li class="active"><a href="/imagenes/agregar/">Agregar Imagen</a></li>
                <li><a href="/imagenes/modificar/">Modificar Imagen</a></li>
                <li><a href="/imagenes/ver/">Ver Imagen</a></li>
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
                        <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Imagen</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" maxlength="100" class="form-control" name="imagen" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Archivo</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" class="form-control" accept="image/*" name="archivo" required>
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
        </div>
    </section>
</div>