<ul class="nav nav-tabs nav-tabs-justified">
    <li><a href="/articulos/">Listar artículos</a></li>
    <li><a href="/articulos/agregar/">Agregar artículos</a></li>
    <li><a href="/articulos/modificar/">Modificar artículo</a></li>
    <li class="active"><a href="/articulos/ver/">Ver artículo</a></li>
    <li><a href="/articulos/borrados/">Artículos borrados</a></li>
</ul>

<div class="block-flat">
    <form role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Artículo</label>
            <input type="text" maxlength="100" class="form-control" value="<?=$articulo['articulo']?>" name="articulo" readonly>
        </div>

        <div class="form-group">
            <label>Plano</label>
            <input type="text" maxlength="100" class="form-control" value="<?=$articulo['plano']?>" name="plano" readonly>
        </div>

        <div class="form-group">
            <label>Archivo del plano</label>
            <?php if($articulo['planofile'] != '') { ?>
            <p><a href="<?=$articulo['planofile']?>" target="_blank"><i class="fa fa-file fa-2x"></i></a></p>
            <?php } else { ?>
            <p><span class="label label-danger"><strong>NO TIENE</strong></span></p>
            <?php } ?>
        </div>

        <div >
            <label>Producto</label>
            <input type="text" maxlength="100" class="form-control" value="<?=$articulo['producto']['producto']?>" name="producto" readonly>
        </div>

        <div class="form-group">
            <label>Revisión</label>
            <input type="number" maxlength="11" class="form-control" value="<?=$articulo['revision']?>" name="revision" readonly>
        </div>

        <div class="form-group">
            <label>Posición</label>
            <input type="number" maxlength="11" class="form-control" value="<?=$articulo['posicion']?>" name="posicion" readonly>
        </div>

        <div class="form-group">
            <label>Observaciones</label>
            <p><?=$articulo['observaciones']?></p>
        </div>
        
        <div class="form-group">
            <label>Estado</label>
            <?php if($articulo['activo'] == '1') { ?>
            <p><span class="label label-success"><strong>ACTIVO</strong></span></p>
            <?php } else { ?>
            <p><span class="label label-danger"><strong>INACTIVO</strong></span></p>
            <?php } ?>
        </div>

    </form>
</div>
