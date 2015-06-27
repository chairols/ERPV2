<div id="main-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">
                    <?=$title?>
                </h3>
            </div>
        </div>
        
        <ul class="nav nav-tabs nav-tabs-justified">
            <li><a href="/planos/">Listar Planos</a></li>
            <li><a href="/planos/agregar/">Agregar Plano</a></li>
            <li class="active"><a href="/planos/ver/">Ver Plano</a></li>
        </ul>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Ver Plano</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">Plano</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="input-xlarge" name="plano" value="<?=$plano['plano']?>" disabled>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Revisión</label>
                                <div class="controls">
                                    <input type="number" maxlength="11" class="input-xlarge" name="revision" value="<?=$plano['revision']?>" disabled>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Plano Propio</label>
                                <div class="controls">
                                    <input type="text" maxlength="100" class="input-xlarge" value="<?=($plano['propio']=='1')?"SI":"NO"?>" disabled>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Archivo del Plano</label>
                                <div class="controls">
                                    <div class="control-label"><?=($plano['planofile']=="")?"No tiene plano":"<a href='".$plano['planofile']."' target='_blank'>Ver Plano</a>"?></div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Observaciones</label>
                                <div class="controls">
                                    <textarea name="observaciones" class="input-xlarge" rows="6" disabled><?=$plano['observaciones']?></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>