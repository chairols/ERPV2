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
                                        <th><strong>Descripción corta</strong></th>
                                        <th><strong>Descripción larga</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($medidas as $medida) { ?>
                                    <tr>
                                        <td><?=$medida['medida_corta']?></td>
                                        <td><?=$medida['medida_larga']?></td>
                                        <td>
                                            <a href="#" class="label label-default"><i class="fa fa-pencil"></i></a> 
                                            <a href="#" class="label label-danger"><i class="fa fa-times"></i></a>
                                            <a href="/log/ver/medidas/<?=$medida['idmedida']?>/" class="label label-info"><i class="fa fa-clock-o"></i></a>
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
