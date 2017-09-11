<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-border">
            <ul class="nav nav-tabs bar_tabs nav-tabs-justified">
                <li><a href="/ots/">Listar O.T.S.</a></li>
                <li><a href="/ots/agregar/">Agregar O.T.</a></li>
                <li><a href="/ots/modificar/">Modificar O.T.</a></li>
                <li><a href="/ots/ver/">Ver O.T.</a></li>
                <li><a href="/ots/borradas/">O.T.S. Borradas</a></li>
                <li class="active"><a href="/ots/sin_pedidos/">O.T.S. Sin Pedidos</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div id="gears">
                        <div class="overlay">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                    </div>
                    <div id="tabla" style="display: none;">
                        <div class="box-body">
                            <table id="datatable-desc" class="table table-striped table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th><strong>O.T.</strong></th>
                                        <th><strong>Fábrica</strong></th>
                                        <th><strong>Cantidad</strong></th>
                                        <th><strong>Artículo</strong></th>
                                        <th><strong>Plano</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($ots as $ot) { ?>
                                    <?php if($ot['idpedido_item'] == null) { ?>
                                    <tr>
                                        <td><?=$ot['numero_ot']?></td>
                                        <td><?=$ot['fabrica']?></td>
                                        <td><?=$ot['cantidad']?></td>
                                        <td>
                                            <a href="/articulos/ver/<?=$ot['idarticulo']?>">
                                                <?=$ot['producto']?> <?=$ot['articulo']?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/planos/ver/<?=$ot['idplano']?>">
                                                <?=$ot['plano']?>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
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

<script type="text/javascript">
    function inicio() {
        $("#gears").hide();
        $("#tabla").fadeIn(1000);
    }
</script>