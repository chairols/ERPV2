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
                <li><a href="/ocs/">Listar O.C.S.</a></li>
                <li class="active"><a href="/ocs/agregar/">Agregar O.C.</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <a href="/ocs/agregar_items/<?=$item['idoc']?>/">
                <button class="btn btn-success">
                    <i class="icon-chevron-left"></i> Volver a la Orden de Compra
                </button>
            </a>
        </div>
        
        <div class="row-fluid">
            <blockquote>
                <dl>
                    <dt>Cantidad</dt>
                    <dd><?=$item['cantidad']?></dd>
                    <dt>Artículo</dt>
                    <dd><?=$producto['producto']?> <?=$articulo['articulo']?></dd>
                </dl>
            </blockquote>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Asociar Orden de Trabajo</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Orden de Trabajo</label>
                                <div class="controls">
                                    <select name="ot" class="select2 span12" onchange="cambiar();" id="ot">
                                        <?php foreach($ots as $ot) { ?>
                                        <option value="<?=$ot['idot']?>"><?=$ot['fabrica']?> <?=$ot['numero_ot']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="control-group">
                                <div id="resultado"></div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">
                                    <i class="icon-save"></i> Asociar OT
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Órdenes de Trabajo Asociadas</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-hover table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>Orden de Trabajo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($ots_asociadas as $ot) { ?>
                                <tr>
                                    <td>
                                        <strong><?=$ot['fabrica']?> <?=$ot['numero_ot']?></strong>
                                        <br>
                                        <?=$ot['cantidad']?> - <?=$ot['producto']?> <?=$ot['articulo']?>
                                    </td>
                                    <td>
                                        <a href="/ocs/desasociar_ot/<?=$ot['idoc_item']?>/<?=$ot['idot']?>">
                                            <i class="alert-danger icon-remove tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Desasociar Orden de Trabajo"></i>
                                        </a>
                                    </td>
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
    
    function limpiar_campo(campo) {
        $("#"+campo).val("");
    }
    
    function cambiar() {
        $.ajax({
            type: 'GET',
            url: '/ots/get_ot_ajax/'+$("#ot").val(),
            beforeSend: function() {
                $("#resultado").html('<img src="/assets/img/ajax-loader.gif">');
            },
            success: function(data) {
                $("#resultado").html(data);
            }
        });
    }
</script>