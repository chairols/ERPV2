<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/medidas/">Listar medidas</a></li>
                <li><a href="/medidas/agregar/">Agregar medida</a></li>
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
                                        <th><strong>Descripción larga</strong></th>
                                        <th><strong>Descripción corta</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($medidas as $medida) { ?>
                                    <tr>
                                        <td><?=$medida['medida_larga']?></td>
                                        <td><?=$medida['medida_corta']?></td>
                                        <td>
                                            <a href="#" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar">
                                                <button class="btn btn-warning btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a> 
                                            <a href="#" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar">
                                                <button class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                            <a href="/log/ver/medidas/<?=$medida['idmedida']?>/" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Log">
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



<div id="main-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">
                    <?=$title?>
                </h3>
            </div>
        </div>
        
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/medidas/">Listar medidas</a></li>
                <li><a href="/medidas/agregar/">Agregar medida</a></li>
            </ul>
            
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Unidades de Medida</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <table class="table table-condensed table-hover table-bordered" id="sample_1">
                                <thead>
                                    <tr>
                                        <th><strong>Descripción larga</strong></th>
                                        <th><strong>Descripción corta</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($medidas as $medida) { ?>
                                    <tr>
                                        <td><?=$medida['medida_larga']?></td>
                                        <td><?=$medida['medida_corta']?></td>
                                        <td>
                                            <a href="#" class="label label-default"><i class="icon-edit"></i></a> 
                                            <a href="#" class="label label-important"><i class="icon-remove"></i></a>
                                            <a href="/log/ver/medidas/<?=$medida['idmedida']?>/" class="label label-info"><i class="icon-time"></i></a>
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
        
        
    </div>
</div>


<script type="text/javascript">
    function inicio() {
        $("#gears").hide();
        $("#tabla").fadeIn(1000);
    }
</script>