<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/tiposmaquinas/">Listar Tipos de Máquinas</a></li>
                <li><a href="/tiposmaquinas/agregar/">Agregar Tipo de Máquina</a></li>
                <li><a href="/tiposmaquinas/modificar/">Modificar Tipo de Máquina</a></li>
                <li><a href="/tiposmaquinas/ver/">Ver Tipo de Máquina</a></li>
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
                            <table class="table table-bordered table-hover table-condensed" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Tipo de Máquina</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tiposmaquinas as $tipomaquina) { ?>
                                    <tr>
                                        <td><?=$tipomaquina['tipo_maquina']?></td>
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