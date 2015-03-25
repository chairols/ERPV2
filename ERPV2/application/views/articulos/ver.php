<div id="main-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">
                    <?=$title?>
                </h3>
            </div>
        </div>
        
        <ul class="nav nav-tabs nav-tabs-justified">
            <li><a href="/articulos/">Listar artículos</a></li>
            <li><a href="/articulos/agregar/">Agregar artículos</a></li>
            <li><a href="/articulos/modificar/">Modificar artículo</a></li>
            <li class="active"><a href="/articulos/ver/">Ver artículo</a></li>
            <li><a href="/articulos/borrados/">Artículos borrados</a></li>
        </ul>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Ver Artículo</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Artículo</label>
                                <input type="text" maxlength="100" class="form-control" value="<?=$articulo['articulo']?>" readonly>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Posición</label>
                                <input type="text" maxlength="100" class="form-control" value="<?=$articulo['posicion']?>" readonly>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Plano</label>
                                <input type="text" maxlength="100" class="form-control" value="<?=(!empty($articulo['plano']))?$articulo['plano']['plano']:""?>" readonly>
                                <?=(!empty($articulo['plano']))?"<a href='".$articulo['plano']['planofile']."' target='_blank'>Ver plano</a>":""?>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Revisión</label>
                                <input type="text" maxlength="100" class="form-control" value="<?=(!empty($articulo['plano']))?$articulo['plano']['revision']:""?>" readonly>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Producto</label>
                                <input type="text" maxlength="100" class="form-control" value="<?=$articulo['producto']['producto']?>" readonly>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Observaciones</label>
                                <textarea class="form-control" rows="5" readonly><?=$articulo['observaciones']?></textarea>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Estado</label>
                                <?php if($articulo['activo'] == '1') { ?>
                                <p><span class="label label-success">ACTIVO</span></p>
                                <?php } else { ?>
                                <p><span class="label label-important">INACTIVO</span></p>
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



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
