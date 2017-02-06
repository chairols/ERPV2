<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/planos/">Listar Planos</a></li>
                <li><a href="/planos/agregar/">Agregar Plano</a></li>
                <li><a href="/planos/modificar">Modificar Plano</a></li>
                <li><a href="/planos/ver/">Ver Plano</a></li>
                <li><a href="/planos/borrados/">Planos Borrados</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div class="box-body">
                        <table id="datatable" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th><strong>Plano</strong></th>
                                    <th><strong>ID</strong></th>
                                    <th><strong>Revisión</strong></th>
                                    <th><strong>Cliente</strong></th>
                                    <th><strong>Plano</strong></th>
                                    <th><strong>Acción</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($planos as $plano) { ?>
                                <tr>
                                    <td><?=$plano['plano']?></td>
                                    <td><?=$plano['idplano']?></td>
                                    <td><?=$plano['revision']?></td>
                                    <td>
                                        <a href="/clientes/ver/<?=$plano['idcliente']?>/">
                                            <?=$plano['cliente']?>
                                        </a>
                                    </td>
                                    <td>
                                    <?php if($plano['planofile'] != '') { ?>
                                        <a href="<?=$plano['planofile']?>" target="_blank" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Plano">
                                            <button class="btn btn-xs btn-primary">
                                                <i class="fa fa-file"></i>
                                            </button>
                                        </a>
                                    <?php } ?>
                                    </td>
                                    <td>
                                        <a href="/planos/ver/<?=$plano['idplano']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver" class="tooltips">
                                            <button class="btn btn-xs btn-success">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="/planos/modificar/<?=$plano['idplano']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
                                            <button class="btn btn-xs btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <a href="/planos/borrar/<?=$plano['idplano']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar" class="tooltips">
                                            <button class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                        <a href="/log/ver/planos/<?=$plano['idplano']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Historial" class="tooltips">
                                            <button class="btn btn-xs btn-info">
                                                <i class="fa fa-clock-o"></i>
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