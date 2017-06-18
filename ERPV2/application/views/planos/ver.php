<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/planos/">Listar Planos</a></li>
                <li><a href="/planos/agregar/">Agregar Plano</a></li>
                <li><a href="/planos/modificar">Modificar Plano</a></li>
                <li class="active"><a href="/planos/ver/">Ver Plano</a></li>
                <li><a href="/planos/borrados/">Planos Borrados</a></li>
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
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Plano</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="100" class="form-control" name="plano" value="<?=$plano->getPlano()?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Revisión</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="number" maxlength="11" class="form-control" name="revision" value="<?=$plano->getRevision()?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Cliente</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="100" class="form-control" value="<?=$plano->getCliente()->getCliente()?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Archivo del Plano</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <?php if($plano->getUrlDelPlano() != "") { ?>
                                    <a href="/planos/descargar/<?=$plano->getId()?>/" target="_blank" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Plano">
                                    <button class="btn btn-primary">
                                        <?php
                                        $extension = explode('.', $plano->getUrlDelPlano());
                                        $extension[1] = strtoupper($extension[1]);
                                        switch ($extension[1]) {
                                            case "PDF":
                                                echo '<i class="fa fa-file-pdf-o"></i>';
                                                break;

                                            case "JPG":
                                            case "JPEG":
                                            case "GIF":
                                            case "TIFF":
                                            case "TIF":
                                            case "BMP":
                                            case "XPS":
                                                echo '<i class="fa fa-file-image-o"></i>';
                                                break;

                                            case "ZIP":
                                            case "RAR":
                                                echo '<i class="fa fa-file-zip-o"></i>';
                                                break;

                                            default:
                                                echo '<i class="fa fa-file"></i>';
                                                break;
                                        }
                                        ?>
                                    </button>
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Observaciones</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <textarea name="observaciones" class="form-control" rows="6" disabled><?=$plano->getObservaciones()?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>