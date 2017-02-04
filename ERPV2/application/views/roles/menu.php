<div class="content-wrapper">
    <section class="content-header">
        <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs bar_tabs nav-tabs-justified">
                <li><a href="/roles/">Listar Roles</a></li>
                <li><a href="/roles/agregar/">Agregar Rol</a></li>
                <li class="active"><a href="/roles/menu/">Roles-Menú</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div class="box-body">
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
                                        <input type="checkbox" <?=($m['idrol'])?"checked":""?> class="minimal" disabled>
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
                                    <input type="checkbox" <?=($submenu['idrol'])?"checked":""?> class="minimal" disabled>
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
    </section>
</div>