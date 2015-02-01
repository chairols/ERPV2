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
                <li class="active"><a href="/insumos/">Listar Insumos</a></li>
                <li><a href="/insumos/agregar/">Agregar Insumo</a></li>
            </ul>
            
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Insumos</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <table class="table table-striped table-bordered" id="sample_1">
                                <thead>
                                    <tr>
                                        <th><strong>ID</strong></th>
                                        <th><strong>Insumo</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($insumos as $insumo) { ?>
                                    <tr>
                                        <td><?=$insumo['idinsumo']?></td>
                                        <td><?=$insumo['insumo']?></td>
                                        <td>
                                            <a href="#" class="label label-default"><i class="icon-edit"></i></a> 
                                            <a href="#" class="label label-important"><i class="icon-remove"></i></a>
                                            <a href="/log/ver/insumos/<?=$insumo['idinsumo']?>/" class="label label-info"><i class="icon-time"></i></a>
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

<ul class="nav nav-tabs nav-tabs-justified">
    <li class="active"><a href="/insumos/">Listar insumos</a></li>
    <li><a href="/insumos/agregar/">Agregar insumo</a></li>
</ul>

<div class="table-responsive block-flat">
    <table id="datatable">
        <thead>
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>Insumo</strong></th>
                <th><strong>Acción</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($insumos as $insumo) { ?>
            <tr>
                <td><?=$insumo['idinsumo']?></td>
                <td><?=$insumo['insumo']?></td>
                <td>
                    <a href="#" class="label label-default"><i class="fa fa-pencil"></i></a> 
                    <a href="#" class="label label-danger"><i class="fa fa-times"></i></a>
                    <a href="/log/ver/insumos/<?=$insumo['idinsumo']?>/" class="label label-info"><i class="fa fa-clock-o"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>