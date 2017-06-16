<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/irm/">Listar I.R.M.</a></li>
                <li class="active"><a href="/irm/agregar/">Agregar I.R.M.</a></li>
                <li><a href="/irm/pendientes/">Pendientes</a></li>
            </ul>
        </div>
        
        <br>
        
        <section class="invoice">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-header">
                        <div class="text-center">
                            <strong>Informe de Recepción de Materiales # <?=$irm->getId()?></strong>
                        </div>
                    </h1>
                </div>
            </div>
            <div class="row invoice-info">
                <div class="col-md-6 col-sm-6 col-xs-12 invoice-col">
                    PROVEEDOR
                    <address>
                        <strong><?=$irm->getProveedor()->getProveedor()?></strong>
                    </address>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 invoice-col">
                    INFO
                    <address>
                        Domicilio: <strong><?=$irm->getProveedor()->getDomicilio()?></strong><br>
                        Teléfono: <strong><?=$irm->getProveedor()->getTelefono()?></strong><br>
                        Localidad: <strong><?=$irm->getProveedor()->getLocalidad()?></strong>
                    </address>
                </div>
            </div>
            <div class="row">
                <form method="POST" class="form" enctype="multipart/form-data">
                    <div class="row-fluid">
                        <div class="col-sm-8 col-md-8 col-sx-12">
                            <div class="form-group">
                                <label class="control-label">Artículo</label>
                                <select id="articulo" name="pendienteirm" onchange="cambiar();" class="select2 form-control">
                                    <?php foreach($items as $item) { ?>
                                    <option value="<?=$item['idpendienteirm']?>"><?=$item['producto']?> <?=$item['articulo']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1 col-md-1 col-sx-12">
                            <div class="form-group">
                                <label class="control-label">Cantidad</label>
                                <div id="cantidad">
                                    <input type="text" class="form-control" name="cantidad" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-md-1 col-sx-12">
                            <div class="form-group">
                                <label class="control-label">U.M.</label>
                                <div id="um">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-sx-12">
                            <div class="form-group">
                                <label class="control-label">&nbsp;</label>
                                <button type="submit" class="form-control btn btn-success">
                                    <i class="fa fa-plus"></i> Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Certificado de Material</strong></label>
                                <input type="file" class="form-control" name="certificado">
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-sx-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Controles</strong></label>
                                <?php foreach($controles as $control) { ?>
                                <div class="checkbox">
                                    <input class="minimal" type="checkbox" name="control-<?=$control['idcontrol']?>" value="<?=$control['idcontrol']?>" /> <?=$control['control']?><br>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <div class="form-group">
                                <label class="control-label"><strong>Órdenes de Trabajo</strong></label>
                                <div id="ots">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-sx-12">
                    <table class="table table-hover table-bordered table-condensed" id="datatable">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Artículo</th>
                                <th>Certificado</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Controles</th>
                                <th>O.T.</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($irm->getItems() as $item) { ?>
                            <tr>
                                <td><?=$item->getCantidad()?></td>
                                <td><?=$item->getArticulo()->getProducto()->getProducto()?> <?=$item->getArticulo()->getArticulo()?></td>
                                <td>
                                    <?php if($item->getCertificado() != null) {?>
                                    <a href="<?=$item->getCertificado()?>" target="_blank" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Certificado" class="tooltips">
                                        <button class="btn btn-xs">
                                            <i class="fa fa-file"></i>
                                        </button>
                                    </a>
                                    <?php } ?>
                                </td>
                                <td><?=$item->getUsuario()->getNombre()?> <?=$item->getUsuario()->getApellido()?></td>
                                <td><?=date('d/m/Y', strtotime($item->getTimestamp()))?></td>
                                <td><?php
                                    foreach($item->getControles() as $control) { ?>
                                        <div class="badge bg-green"><?=$control->getControl()?></div>
                                    <?php } ?></td>
                                <td><?php
                                    foreach($item->getOts() as $ot) { ?>
                                    <div class="badge bg-black"><?=$ot->getFabrica()->getFabrica()?> <?=$ot->getNumeroOrdenDeTrabajo()?></div>
                                    <?php } ?>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        
        
    </section>
</div>

<script type="text/javascript">
    function inicio() {
        cambiar();
    }
    
    function cambiar() {
        cantidad();
        unidaddemedida();
        ots();
    }
    
    function cantidad() {
        $.ajax({
            type: 'GET',
            url: '/irm/cantidad/'+$("#articulo").val(),
            beforeSend: function() {
                $("#cantidad").html('<i class="fa fa-refresh fa-spin"></i>');
            },
            success: function(data) {
                $("#cantidad").html(data);
            }    
        });
    }
    
    function unidaddemedida() {
        $.ajax({
            type: 'GET',
            url: '/irm/unidaddemedida/'+$("#articulo").val(),
            beforeSend: function() {
                $("#um").html('<i class="fa fa-refresh fa-spin"></i>');
            },
            success: function(data) {
                $("#um").html(data);
            }    
        });
    }
    
    function ots() {
        $.ajax({
            type: 'GET',
            url: '/irm/ots/'+$("#articulo").val(),
            beforeSend: function() {
                $("#ots").html('<i class="fa fa-refresh fa-spin"></i>');
            },
            success: function(data) {
                $("#ots").html(data);
            }    
        });
    }
</script>