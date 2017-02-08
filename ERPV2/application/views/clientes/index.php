<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/clientes/">Listar Clientes</a></li>
                <li><a href="/clientes/agregar/">Agregar Cliente</a></li>
                <li><a href="/clientes/modificar/">Modificar Clientes</a></li>
                <li><a href="/clientes/borrados/">Clientes Borrados</a></li>
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
                        <table class="table table-condensed table-bordered table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th><strong>ID</strong></th>
                                        <th><strong>Cliente</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($clientes as $cliente) { ?>
                                    <tr>
                                        <td><?=$cliente['idcliente']?></td>
                                        <td><?=$cliente['cliente']?></td>
                                        <td>
                                            <a href="/clientes/modificar/<?=$cliente['idcliente']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
                                                <button class="btn btn-warning btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a> 
                                            <a href="/log/ver/clientes/<?=$cliente['idcliente']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
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
    </section>
</div>