<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?=$title?></h3>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Listar Números de Serie</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-responsive-desc" class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th><strong>Número de Serie</strong></th>
                                <th><strong>Fábrica</strong></th>
                                <th><strong>Orden de Trabajo</strong></th>
                                <th><strong>Artículo</strong></th>
                                <th><strong>Acción</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($numeroserie as $ns) { ?>
                            <tr>
                                <td><?=$ns['numero_serie']?></td>
                                <td><?=$ns['fabrica']?></td>
                                <td><a href="/ots/ver/<?=$ns['idot']?>/"><?=$ns['numero_ot']?></a></td>
                                <td><?=$ns['producto']?> <?=$ns['articulo']?></td>
                                <td>
                                    <a href="/numeroserie/trazabilidad/<?=$ns['numero_serie']?>/">
                                        <button class="btn btn-xs btn-success" data-pacement="top" data-toggle="tooltip" data-original-title="Trazabilidad">
                                            <i class="fa fa-exchange"></i>
                                        </button>
                                    </a>
                                    <a href="/numeroserie/trazabilidad/<?=$ns['numero_serie']?>/"><i class="icon-exchange alert-success tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Trazabilidad"></i></a>
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