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
                <li class="active"><a href="/roles/">Listar Roles</a></li>
                <li><a href="/roles/agregar/">Agregar Rol</a></li>
                <li><a href="/roles/menu/">Roles-Menú</a></li>
            </ul>
            
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Roles</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <table class="table table-condensed table-bordered table-hover" id="sample_1">
                                <thead>
                                    <tr>
                                        <th><strong>Rol</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($roles as $rol) { ?>
                                    <tr>
                                        <td><?=$rol['rol']?></td>
                                        <td>
                                            <a href="/roles/menu/<?=$rol['idrol']?>/">
                                                <i class="icon-edit alert-info tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar"></i>
                                            </a>
                                            <a href="/log/ver/roles/<?=$rol['idrol']?>/">
                                                <i class="icon-time alert-info tooltips" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Historial"></i>
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
