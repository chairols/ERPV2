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
                <li class="active"><a href="/reqs/">Listar REQ's</a></li>
                <li><a href="/reqs/agregar/">Agregar REQ</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> REQ's</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-hover table-bordered table-condensed" id="sample_1">
                            <thead>
                                <tr>
                                    <td><strong>O.T.</strong></td>
                                    <td><strong>Cantidad</strong></td>
                                    <td><strong>Artículo</strong></td>
                                    <td><strong>Material</strong></td>
                                    <td><strong>Destino</strong></td>
                                    <td><strong>Acción</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($reqs as $req) { ?>
                                <tr>
                                    <td><?=($req['numero_ot']==null)?"Sin OT":$req['numero_ot']?></td>
                                    <td><?=$req['cantidad']?></td>
                                    <td><?=$req['producto']?> <?=$req['articulo']?></td>
                                    <td><?=$req['material']?></td>
                                    <td><?=$req['fabrica']?></td>
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