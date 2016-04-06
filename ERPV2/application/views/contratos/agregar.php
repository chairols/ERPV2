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
                <li><a href="/contratos/">Listar Contratos</a></li>
                <li class="active"><a href="/contratos/agregar/">Agregar Contrato</a></li>
                <li><a href="/contratos/modificar/">Modificar Contrato</a></li>
                <li><a href="/contratos/ver/">Ver Contrato</a></li>
                <li><a href="/contratos/vigentes/">Contratos Vigentes</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Agregar Contrato</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">Cliente</label>
                                <div class="controls">
                                    <select name="cliente" class="select2 span12">
                                        <?php foreach($clientes as $cliente) { ?>
                                        <option value="<?=$cliente['idcliente']?>"><?=$cliente['cliente']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Número de Contrato</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="span12" name="numero_contrato" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Descripción</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="span12" name="descripcion" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Vigencia Desde</label>
                                <div class="controls">
                                    <input type="text" class="form-control input-large" id="dp1" name="vigencia_desde" readonly>
                                    <a onclick="limpiar_campo('dp1');" href="#" class="label label-important"><i class="icon-time"></i> Borrar fecha</a>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Vigencia Hasta</label>
                                <div class="controls">
                                    <input type="text" class="form-control input-large" id="dp2" name="vigencia_hasta" readonly>
                                    <a onclick="limpiar_campo('dp2')" href="#" class="label label-important"><i class="icon-time"></i> Borrar fecha</a>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Adjunto</label>
                                <div class="controls">
                                    <input type="file" class="span12" name="adjunto">
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">
                                    <i class="icon-save"></i> Guardar
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    <i class="icon-remove"></i> Limpiar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function limpiar_campo(campo) {
        $("#"+campo).val("");
    }
</script>