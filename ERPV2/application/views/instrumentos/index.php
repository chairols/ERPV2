<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/instrumentos/">Listar Instrumentos</a></li>
                <li><a href="/instrumentos/agregar/">Agregar Instrumento</a></li>
                <li><a href="/instrumentos/modificar/">Modificar Instrumento</a></li>
                <li><a href="/instrumentos/ver/">Ver Instrumento</a></li>
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
                            <table class="table table-condensed table-hover table-bordered" id="datatable">
                                <thead>
                                    <tr>
                                        <th><strong>N° Instrumento</strong></th>
                                        <th><strong>Instrumento</strong></th>
                                        <th><strong>Marca</strong></th>
                                        <th><strong>Modelo</strong></th>
                                        <th><strong>N° Serie</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($instrumentos as $instrumento) { ?>
                                    <tr>
                                        <td><?=$instrumento['idinstrumento']?></td>
                                        <td><?=$instrumento['instrumento']?></td>
                                        <td><?=$instrumento['marca']?></td>
                                        <td><?=$instrumento['modelo']?></td>
                                        <td><?=$instrumento['numero_serie']?></td>
                                        <td>
                                            <a href="/instrumentos/modificar/<?=$instrumento['idinstrumento']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar">
                                                <button class="btn btn-warning btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="/log/ver/instrumentos/<?=$instrumento['idinstrumento']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Log">
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