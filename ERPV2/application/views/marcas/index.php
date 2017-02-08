<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/marcas/">Listar Marcas</a></li>
                <li><a href="/marcas/agregar/">Agregar Marca</a></li>
                <li><a href="/marcas/modificar/">Modificar Marca</a></li>
                <li><a href="/marcas/ver/">Ver Marca</a></li>
                <li><a href="/marcas/borradas/">Marcas Borradas</a></li>
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
                        <table class="table table-condensed table-hover table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th><strong>Marca</strong></th>
                                    <th><strong>Acción</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($marcas as $marca) { ?>
                                <tr>
                                    <td><?=$marca['marca']?></td>
                                    <td>
                                        <a href="/marcas/ver/<?=$marca['idmarca']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Ver">
                                            <button class="btn btn-success btn-xs">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="/marcas/modificar/<?=$marca['idmarca']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar">
                                            <button class="btn btn-warning btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a> 
                                        <a href="/marcas/borrar/<?=$marca['idmarca']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar">
                                            <button class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                        <a href="/log/ver/marcas/<?=$marca['idmarca']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Log">
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