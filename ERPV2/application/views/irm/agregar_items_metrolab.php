<div id="main-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">
                    <?=$title?>
                </h3>
            </div>
        </div>
        
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/irm/">Listar I.R.M.</a></li>
                <li class="active"><a href="/irm/agregar/">Agregar I.R.M.</a></li>
                <li><a href="/irm/pendientes/">Pendientes</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Agregar Items</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="text-center">
                                    <h1><strong>Informe de Recepción de Materiales # <?=$irm->getId()?></strong></h1>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="space20"></div>
                        <div class="row-fluid invoice-list">
                            <div class="span6">
                                <h4>PROVEEDOR</h4>
                                <p>
                                    <strong><?=$irm->getProveedor()->getProveedor()?></strong>
                                </p>
                            </div>
                            <div class="span6">
                                <h4>INFO</h4>
                                <p>
                                    Domicilio: <strong><?=$irm->getProveedor()->getDomicilio()?></strong><br>
                                    Teléfono: <strong><?=$irm->getProveedor()->getTelefono()?></strong><br>
                                    Localidad: <strong><?=$irm->getProveedor()->getLocalidad()?></strong>
                                </p>
                            </div>
                        </div>
                        <div class="space20"></div>
                        <div class="space20"></div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row-fluid">
                                <div class="span8">
                                    <div class="control-group">
                                        <label class="control-label">Artículo</label>
                                        <div class="controls controls-row">
                                            <select id="articulo" name="pendienteirm" onchange="cambiar();" class="select2 span12">
                                                <?php foreach($items as $item) { ?>
                                                <option value="<?=$item['idpendienteirm']?>"><?=$item['producto']?> <?=$item['articulo']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="span1">
                                    <div class="control-group">
                                        <label class="control-label">Cantidad</label>
                                        <div class="controls controls-row" id="cantidad">
                                            <input type="text" class="input-block-level span12" name="cantidad" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="span1">
                                    <div class="control-group">
                                        <label class="control-label">U.M.</label>
                                        <div class="controls controls-row" id="um">
                                        </div>
                                    </div>
                                </div>
                                <div class="span2">
                                    <div class="control-group">
                                        <label class="control-label">&nbsp;</label>
                                        <div class="controls controls-row">
                                            <button type="submit" class="btn btn-success">
                                                <i class="icon-plus"></i> Agregar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label"><strong>Certificado de Material</strong></label>
                                        <div class="controls">
                                            <div data-provides="fileupload" class="fileupload fileupload-new">
                                                <div class="input-append">
                                                    <div class="uneditable-input">
                                                        <i class="icon-file fileupload-exists"></i>
                                                        <span class="fileupload-preview"></span>
                                                    </div>
                                                   <span class="btn btn-file">
                                                   <span class="fileupload-new">Seleccionar Archivo</span>
                                                   <span class="fileupload-exists">Cambiar</span>
                                                   <input type="file" name="certificado" class="default">
                                                   </span>
                                                    <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Eliminar</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="span2">
                                    <div class="control-group">
                                        <label class="control-label"><strong>Controles</strong></label>
                                        <div class="controls">
                                            <?php foreach($controles as $control) { ?>
                                            <label class="checkbox line">
                                                <input type="checkbox" name="control-<?=$control['idcontrol']?>" value="<?=$control['idcontrol']?>" /> <?=$control['control']?>
                                            </label>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label"><strong>Órdenes de Trabajo</strong></label>
                                        <div class="controls controls-row" id="ots">
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Items</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-hover table-bordered table-condensed" id="sample_1">
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
                                            <button class="btn btn-small">
                                                <i class="icon-file"></i>
                                            </button>
                                        </a>
                                        <?php } ?>
                                    </td>
                                    <td><?=$item->getUsuario()->getNombre()?> <?=$item->getUsuario()->getApellido()?></td>
                                    <td><?=$item->getTimestamp()?></td>
                                    <td><?php
                                        foreach($item->getControles() as $control) { ?>
                                            <div class="label label-inverse"><?=$control->getControl()?></div>
                                        <?php } ?></td>
                                    <td><?php
                                        foreach($item->getOts() as $ot) { ?>
                                        <div class="label label-inverse"><?=$ot->getFabrica()->getFabrica()?> <?=$ot->getNumeroOrdenDeTrabajo()?></div>
                                        <?php } ?>
                                    </td>
                                    <td>&nbsp;</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                $("#cantidad").html('<img src="/assets/img/ajax-loader.gif">');
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
                $("#um").html('<img src="/assets/img/ajax-loader.gif">');
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
                $("#ots").html('<img src="/assets/img/ajax-loader.gif">');
            },
            success: function(data) {
                $("#ots").html(data);
            }    
        });
    }
</script>