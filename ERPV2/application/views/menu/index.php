<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?=$title?></h3>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="row">
        <ul class="nav nav-tabs bar_tabs nav-tabs-justified">
            <li class="active"><a href="/menu/">Listar Menú</a></li>
            <li><a href="/menu/agregar/">Agregar Menú</a></li>
            <li><a href="/menu/modificar/">Modificar Menú</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Menú</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th><strong>Pedido #</strong></th>
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
                                    <a href="/menu/modificar/<?=$m['idmenu']?>/">
                                        <button class="btn btn-xs btn-warning" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar">
                                            <i class="fa fa-edit"></i>
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