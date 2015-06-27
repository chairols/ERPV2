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
                <li><a href="/planos/">Listar Planos</a></li>
                <li><a href="/planos/agregar/">Agregar Plano</a></li>
                <li><a href="/planos/ver/">Ver Plano</a></li>
                <li class="active"><a href="/planos/borrados/">Planos Borrados</a></li>
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
                                        <th><strong>Documento</strong></th>
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
                                        <td><?=($plano['propio'])?"INTERNO":"EXTERNO"?></td>
                                        <td>
                                        <?php if($plano['planofile'] != '') { ?>
                                            <a href="<?=$plano['planofile']?>" target="_blank">
                                                <i class="icon-file"></i>
                                            </a>
                                        <?php } ?>
                                        </td>
                                        <td>
                                            <a href="/planos/ver/<?=$plano['idplano']?>" class="label label-success">
                                                <i class="icon-eye-open"></i>
                                            </a>
                                            <a href="/planos/modificar/<?=$plano['idplano']?>" class="label label-default">
                                                <i class="icon-edit"></i>
                                            </a>
                                            <a href="/log/ver/planos/<?=$plano['idplano']?>" class="label label-info">
                                                <i class="icon-time"></i>
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