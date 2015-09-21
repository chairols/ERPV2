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
                <li class="active"><a href="/marcas/">Listar Marcas</a></li>
                <li><a href="/marcas/agregar/">Agregar Marca</a></li>
            </ul>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Marcas</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-condensed table-hover table-bordered" id="sample_1">
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
                                        <a href="#" class="label label-default"><i class="icon-edit"></i></a> 
                                        <a href="#" class="label label-important"><i class="icon-remove"></i></a>
                                        <a href="/log/ver/marcas/<?=$marca['idmarca']?>/" class="label label-info"><i class="icon-time"></i></a>
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