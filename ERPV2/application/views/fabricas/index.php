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
                <li class="active"><a href="/fabricas/">Listar Fábricas</a></li>
                <li><a href="/fabricas/agregar/">Agregar Fábrica</a></li>
                <li><a href="/fabricas/modificar/">Modificar Fábrica</a></li>
            </ul>
            
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Fábricas</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <table class="table table-condensed table-hover table-bordered" id="sample_1">
                                <thead>
                                    <tr>
                                        <th><strong>ID</strong></th>
                                        <th><strong>Sucursal</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($fabricas as $fabrica) { ?>
                                    <tr>
                                        <td><?=$fabrica['idfabrica']?></td>
                                        <td><?=$fabrica['fabrica']?></td>
                                        <td>
                                            <a href="/fabricas/modificar/<?=$fabrica['idfabrica']?>/">
                                                <i class="alert-info icon-edit tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Editar"></i>
                                            </a> 
                                            <a href="/log/ver/fabricas/<?=$fabrica['idfabrica']?>/">
                                                <i class="alert-block icon-time tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Log"></i> 
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