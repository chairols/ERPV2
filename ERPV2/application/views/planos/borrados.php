<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/planos/">Listar Planos</a></li>
                <li><a href="/planos/agregar/">Agregar Plano</a></li>
                <li><a href="/planos/modificar">Modificar Plano</a></li>
                <li><a href="/planos/ver/">Ver Plano</a></li>
                <li class="active"><a href="/planos/borrados/">Planos Borrados</a></li>
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
                        <div id="gears">
                            <div class="text-center">
                                <img src="/assets/AdminLTE-2.3.11/gears.gif">
                                <br><br>
                            </div>
                        </div>
                        <div id="tabla" style="display: none">
                            <table class="table table-bordered table-condensed table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th><strong>Plano</strong></th>
                                        <th><strong>Revisión</strong></th>
                                        <th><strong>Cliente</strong></th>
                                        <th><strong>Plano</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($planos as $plano) { ?>
                                    <tr>
                                        <td><?=$plano['plano']?></td>
                                        <td><?=$plano['revision']?></td>
                                        <td>
                                            <a href="/clientes/ver/<?=$plano['idcliente']?>/">
                                                <?=$plano['cliente']?>
                                            </a>
                                        </td>
                                        <td>
                                        <?php if($plano['planofile'] != '') { ?>
                                            <a href="<?=$plano['planofile']?>" target="_blank">
                                                <i class="icon-file"></i>
                                            </a>
                                        <?php } ?>
                                        </td>
                                        <td>
                                            <a href="/planos/ver/<?=$plano['idplano']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Ver" class="tooltips">
                                                <button class="btn btn-success btn-xs">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="/planos/modificar/<?=$plano['idplano']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar" class="tooltips">
                                                <button class="btn btn-warning btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="/log/ver/planos/<?=$plano['idplano']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Log" class="tooltips">
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