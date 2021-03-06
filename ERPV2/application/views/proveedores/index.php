<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/proveedores/">Listar Proveedores</a></li>
                <li><a href="/proveedores/agregar/">Agregar Proveedor</a></li>
                <li><a href="/proveedores/modificar/">Modificar Proveedor</a></li>
                <li><a href="/proveedores/ver/">Ver Proveedor</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div id="gears">
                        <div class="overlay">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                    </div>
                    <div id="tabla" style="display: none;">
                        <div class="box-body">
                            <table class="table table-bordered table-hover table-condensed" id="datatable">
                                <thead>
                                    <tr>
                                        <th><strong>Proveedor</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($proveedores as $proveedor) { ?>
                                    <tr>
                                        <td><?=$proveedor['proveedor']?></td>
                                        <td>
                                            <a href="/proveedores/ver/<?=$proveedor['idproveedor']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver">
                                                <button class="btn btn-success btn-xs">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="/proveedores/modificar/<?=$proveedor['idproveedor']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar">
                                                <button class="btn btn-warning btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a> 
                                            <a href="#" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar">
                                                <button class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                            <a href="/log/ver/proveedores/<?=$proveedor['idproveedor']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Log">
                                                <button class="btn btn-info btn-xs">
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
    </section>
</div>

<script type="text/javascript">
    function inicio() {
        $("#gears").hide();
        $("#tabla").fadeIn(1000);
    }
</script>