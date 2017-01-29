<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?=$title?></h3>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="row">
        <ul class="nav nav-tabs bar_tabs nav-tabs-justified">
            <li><a href="/roles/">Listar Roles</a></li>
            <li><a href="/roles/agregar/">Agregar Rol</a></li>
            <li class="active"><a href="/roles/menu/">Roles-Menú</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Roles-Menú</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="x_content">
                                <?php foreach($mmenu as $m) { ?>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-4">
                                <div class="control-group">
                                    <div class="controls checkbox">
                                        <?php if($m['idrol']) {
                                            $valor = 'desasociar';
                                        } else {
                                            $valor = 'asociar';
                                        } ?>
                                        <input type="checkbox" <?=($m['idrol'])?"checked":""?> disabled>
                                        <a href="/roles/<?=$valor?>/<?=$rol['idrol']?>/<?=$m['idmenu']?>/">
                                            <label class="control-label"><strong><i class="<?=$m['icono']?>"></i> <?=$m['menu']?> <i class="icon-eye-<?=($m['visible']==1)?"open":"close"?>"></i></strong></label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            foreach($m['submenu'] as $submenu) { ?>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5 col-sm-offset-5">
                            <div class="control-group">
                                <div class="controls checkbox">
                                    <?php if($submenu['idrol']) {
                                        $valor = 'desasociar';
                                    } else {
                                        $valor = 'asociar';
                                    } ?>
                                    <input type="checkbox" <?=($submenu['idrol'])?"checked":""?> disabled>
                                    <a href="/roles/<?=$valor?>/<?=$rol['idrol']?>/<?=$submenu['idmenu']?>/">
                                        <label class="control-label"><?=$submenu['menu']?> <i class="icon-eye-<?=($submenu['visible']==1)?"open":"close"?>"></i></label>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>