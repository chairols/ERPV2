<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs bar_tabs nav-tabs-justified">
                <li class="active"><a href="/usuarios/">Listar Usuarios</a></li>
                <li><a href="/usuarios/agregar/">Agregar Usuario</a></li>
                <li><a href="/usuarios/modificar/">Modificar Usuario</a></li>
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
                        <table id="datatable" class="table table-condensed table-hover table-bordered">
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
                                        <a href="/log/ver/usuarios/<?=$usuario['idusuario']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Log" class="tooltips">
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