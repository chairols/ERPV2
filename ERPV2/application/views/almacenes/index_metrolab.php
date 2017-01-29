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
                <li class="active"><a href="/almacenes/">Listar Almacenes</a></li>
                <li><a href="/almacenes/agregar/">Agregar Almacén</a></li>
                <li><a href="/almacenes/modificar/">Modificar Almacén</a></li>
                <li><a href="/almacenes/ver/">Ver Almacén</a></li>
            </ul>
            
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Almacenes</h4>
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
                                        <th><strong>Almacén</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($almacenes as $almacen) { ?>
                                    <tr>
                                        <td><?=$almacen['idalmacen']?></td>
                                        <td><?=$almacen['almacen']?></td>
                                        <td>
                                            <a href="/almacenes/ver/<?=$almacen['idalmacen']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver" class="tooltips">
                                                <button class="btn btn-success">
                                                    <i class="icon-eye-open"></i>
                                                </button>
                                            </a>
                                            <a href="/almacenes/modificar/<?=$almacen['idalmacen']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
                                                <button class="btn btn-warning">
                                                    <i class="icon-edit"></i>
                                                </button>
                                            </a> 
                                            <a href="/log/ver/almacenes/<?=$almacen['idalmacen']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Log" class="tooltips">
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