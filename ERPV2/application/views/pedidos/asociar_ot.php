<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/pedidos/">Listar pedidos</a></li>
                <li class="active"><a href="/pedidos/agregar/">Agregar pedido</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row-fluid">
            <a href="/pedidos/agregar_items/<?=$item['idpedido']?>/">
                <button class="btn btn-success">
                    <i class="fa fa-chevron-left"></i> Volver al Pedido
                </button>
            </a>
        </div>
        
        <br>
        
        <div class="row-fluid">
            <blockquote>
                <dl>
                    <dt>Cantidad</dt>
                    <dd><?=$item['cantidad']?></dd>
                    <dt>Item</dt>
                    <dd><?=$item['producto']?> <?=$item['articulo']?></dd>
                </dl>
            </blockquote>
        </div>
        
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Asociar Orden de Trabajo</h3>
                    </div>
                    <div class="box-body">
                        <form method="POST" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Orden de Trabajo</label>
                                <div class="col-md-9 col-sm-9 col-sx-12">
                                    <select name="ot" class="select2 form-control" onchange="cambiar();" id="ot">
                                        <?php foreach($ots as $ot) { ?>
                                        <option value="<?=$ot['idot']?>"><?=$ot['fabrica']?> <?=$ot['numero_ot']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <div id="resultado"></div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Asociar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Órdenes de Trabajo Asociadas</h3>
                    </div>
                    <div class="box-body">
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
                                        <a href="/pedidos/desasociar_ot/<?=$ot['idpedido_item']?>/<?=$ot['idot']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Desasociar Orden de Trabajo">
                                            <button class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"></i>
                                            </button>
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
    </section>
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