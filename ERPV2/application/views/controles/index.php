<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/controles/">Listar Controles</a></li>
                <li><a href="/controles/agregar/">Agregar Control</a></li>
                <li><a href="/controles/modificar/">Modificar Control</a></li>
                <li><a href="/controles/ver/">Ver Control</a></li>
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
                            <table class="table table-hover table-bordered table-condensed" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Controles</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($controles as $control) { ?>
                                    <tr>
                                        <td><?=$control['control']?></td>
                                        <td>&nbsp;</td>
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