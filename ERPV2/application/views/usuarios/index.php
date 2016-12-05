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
                <li class="active"><a href="/usuarios/">Listar Usuarios</a></li>
                <li><a href="/usuarios/agregar/">Agregar Usuario</a></li>
                <li><a href="/usuarios/modificar/">Modificar Usuario</a></li>
            </ul>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Usuarios</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-condensed table-hover table-bordered" id="sample_1">
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
                                        <a href="/usuarios/modificar/<?=$usuario['idusuario']?>">
                                            <i class="icon-edit alert-info tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar"></i>
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