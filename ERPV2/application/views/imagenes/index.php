<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/imagenes/">Listar Imágenes</a></li>
                <li><a href="/imagenes/agregar/">Agregar Imagen</a></li>
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
                    <div id="gears">
                        <div class="text-center">
                            <img src="/assets/AdminLTE-2.3.11/gears.gif">
                            <br><br>
                        </div>
                    </div>
                    <div id="tabla" style="display: none;">
                        <div class="box-body">
                            <table class="table table-hover table-bordered table-condensed" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Imágenes</th>
                                        <th>Preview</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($imagenes as $imagen) { ?>
                                    <tr>
                                        <td><?=$imagen['imagen']?></td>
                                        <td>
                                            <a href="<?=$imagen['archivo']?>" target="_blank">
                                                <img src="<?=$imagen['archivo']?>" height="30px" width="30px">
                                            </a>
                                        </td>
                                        <td></td>
                                    </tr>
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

