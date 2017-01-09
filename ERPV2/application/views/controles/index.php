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
                <li class="active"><a href="/controles/">Listar Controles</a></li>
                <li><a href="/controles/agregar/">Agregar Control</a></li>
                <li><a href="/controles/modificar/">Modificar Control</a></li>
                <li><a href="/controles/ver/">Ver Control</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Controles</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-hover table-bordered table-condensed" id="sample_1">
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
</div>