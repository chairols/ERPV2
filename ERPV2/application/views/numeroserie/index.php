<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div class="box-body">
                        <table id="datatable-desc" class="table table-striped table-bordered table-condensed">
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
    </section>
</div>