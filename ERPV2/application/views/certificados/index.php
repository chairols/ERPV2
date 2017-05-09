<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/certificados/">Listar Certificados</a></li>
                <li><a href="/certificados/agregar/">Agregar Certificado</a></li>
                <li><a href="/certificados/modificar/">Modificar Certificado</a></li>
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
                            <table id="datatable-desc" class="table table-striped table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th><strong>Certificado</strong></th>
                                        <th><strong>Artículo</strong></th>
                                        <th><strong>Cliente</strong></th>
                                        <th><strong>Fecha</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
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