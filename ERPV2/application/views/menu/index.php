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
                <li class="active"><a href="/menu/">Listar Menú</a></li>
                <li><a href="/menu/agregar/">Agregar Menú</a></li>
                <li><a href="/menu/modificar/">Modificar Menú</a></li>
            </ul>
            
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Menú</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <table class="table table-bordered table-condensed table-hover" id="sample_1">
                                <thead>
                                    <tr>
                                        <th><strong>#</strong></th>
                                        <th><strong>Menú</strong></th>
                                        <th><strong>Href</strong></th>
                                        <th><strong>Orden</strong></th>
                                        <th><strong>Padre</strong></th>
                                        <th><strong>Visible</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($mmenu as $m) { ?>
                                    <tr>
                                        <td><?=$m['idmenu']?></td>
                                        <td><?=$m['menu']?></td>
                                        <td><?=$m['href']?></td>
                                        <td><?=$m['orden']?></td>
                                        <td><?=(count($m['padre']))?$m['padre']['menu']:"-- No tiene --"?></td>
                                        <td><?=($m['visible'])?"Si":"No"?></td>
                                        <td>
                                            <a href="/menu/modificar/<?=$m['idmenu']?>">
                                                <i class="icon-edit alert-info tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar"></i>
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
    </div>
</div>