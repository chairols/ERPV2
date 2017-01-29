<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?=$title?></h3>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="row">
        <ul class="nav nav-tabs bar_tabs nav-tabs-justified">
            <li class="active"><a href="/usuarios/">Listar Usuarios</a></li>
            <li><a href="/usuarios/agregar/">Agregar Usuario</a></li>
            <li><a href="/usuarios/modificar/">Modificar Usuario</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Listar Usuarios</h2>
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
                                <th><strong>Usuario</strong></th>
                                <th><strong>Nombre</strong></th>
                                <th><strong>Correo</strong></th>
                                <th><strong>Rol</strong></th>
                                <th><strong>Acción</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($usuarios as $usuario) { ?>
                            <tr>
                                <td><?=$usuario['usuario']?></td>
                                <td><?=$usuario['nombre']?> <?=$usuario['apellido']?></td>
                                <td><?=$usuario['correo']?></td>
                                <td><?=$usuario['rol']?></td>
                                <td>
                                    <a href="/usuarios/modificar/<?=$usuario['idusuario']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
                                        <button class="btn btn-xs btn-warning">
                                            <i class="fa fa-edit"></i>
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