<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/maquinas/">Listar Máquinas</a></li>
                <li><a href="/maquinas/agregar/">Agregar Máquina</a></li>
                <li><a href="/maquinas/modificar/">Modificar Máquina</a></li>
                <li><a href="/maquinas/ver/">Ver Máquina</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div id="gears">
                        <div class="text-center">
                            <img src="/assets/AdminLTE-2.3.11/gears.gif">
                            <br><br>
                        </div>
                    </div>
                    <div id="tabla" style="display: none;">
                        <div class="box-body">
                            <table class="table table-condensed table-hover table-bordered" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Número de Máquina</th>
                                        <th>Máquina</th>
                                        <th>Tipo de Máquina</th>
                                        <th>Ubicación</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($maquinas as $maquina) { ?>
                                    <tr>
                                        <td><?=$maquina['idmaquina']?></td>
                                        <td><?=$maquina['marca']?> <?=$maquina['modelo']?></td>
                                        <td><?=$maquina['tipo_maquina']?></td>
                                        <td><?=$maquina['fabrica']?></td>
                                        <td>
                                            <?php if($maquina['estado'] == 'F') { ?>
                                            <div class="badge bg-green">Funcionando</div>
                                            <?php } elseif($maquina['estado'] == 'NF') { ?>
                                            <div class="badge bg-red">No funciona</div>
                                            <?php } ?>
                                        </td>
                                        <td></td>
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