<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?=$title?></h3>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="row">
        <ul class="nav nav-tabs bar_tabs nav-tabs-justified">
            <li class="active"><a href="/almacenes/">Listar Almacenes</a></li>
            <li><a href="/almacenes/agregar/">Agregar Almacén</a></li>
            <li><a href="/almacenes/modificar/">Modificar Almacén</a></li>
            <li><a href="/almacenes/ver/">Ver Almacén</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Listar Almacenes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-responsive" class="table table-condensed table-hover table-bordered">
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
                                        <button class="btn btn-xs btn-success">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="/almacenes/modificar/<?=$almacen['idalmacen']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
                                        <button class="btn btn-xs btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a> 
                                    <a href="/log/ver/almacenes/<?=$almacen['idalmacen']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Historial" class="tooltips">
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
</div>