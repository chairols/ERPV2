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
                        <div class="row-fluid">
                            <form method="POST">
                                <div class="span1">
                                    <div class="control-group">
                                        <label class="control-label">Cantidad</label>
                                        <div class="controls controls-row">
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
                                <div class="span8">
                                    <div class="control-group">
                                        <label class="control-label">Artículo</label>
                                        <div class="controls controls-row">
                                            <select name="articulo" class="select2 span12">
                                                
                                            </select>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>