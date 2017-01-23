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
                <li class="active"><a href="/planos/">Listar Planos</a></li>
                <li><a href="/planos/agregar/">Agregar Plano</a></li>
                <li><a href="/planos/modificar">Modificar Plano</a></li>
                <li><a href="/planos/ver/">Ver Plano</a></li>
                <li><a href="/planos/borrados/">Planos Borrados</a></li>
            </ul>
            
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Planos</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <table class="table table-bordered table-condensed table-hover" id="sample_1">
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
                                            <a href="<?=$plano['planofile']?>" target="_blank">
                                                <i class="icon-file"></i>
                                            </a>
                                        <?php } ?>
                                        </td>
                                        <td>
                                            <a href="/planos/ver/<?=$plano['idplano']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver" class="tooltips">
                                                <button class="btn btn-success">
                                                    <i class="icon-eye-open"></i>
                                                </button>
                                            </a>
                                            <a href="/planos/modificar/<?=$plano['idplano']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
                                                <button class="btn btn-warning">
                                                    <i class="icon-edit"></i>
                                                </button>
                                            </a>
                                            <a href="/planos/borrar/<?=$plano['idplano']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar" class="tooltips">
                                                <button class="btn btn-danger">
                                                    <i class="icon-trash"></i>
                                                </button>
                                            </a>
                                            <a href="/log/ver/planos/<?=$plano['idplano']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Historial" class="tooltips">
                                                <button class="btn btn-info">
                                                    <i class="icon-time"></i>
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
        </div>
    </div>
</div>