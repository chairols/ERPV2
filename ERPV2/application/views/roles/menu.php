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
                <li><a href="/roles/">Listar Roles</a></li>
                <li><a href="/roles/agregar/">Agregar Rol</a></li>
                <li class="active"><a href="/roles/menu/">Roles-Menú</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                <h4 class="page-title">
                    <?=$rol['rol']?>
                </h4>
            </div>
        </div>

        <div class="row-fluid">
            <br>    
                <?php foreach($menu as $m) { ?>
                        <div class="offset1 span11">
                            <div class="control-group">
                                <div class="controls checkbox">
                                    <?php if($m['idrol']) {
                                        $valor = 'desasociar';
                                    } else {
                                        $valor = 'asociar';
                                    } ?>
                                    <input type="checkbox" <?=($m['idrol'])?"checked":""?> disabled>
                                    <a href="/roles/<?=$valor?>/<?=$rol['idrol']?>/<?=$m['idmenu']?>/">
                                        <label class="control-label"><strong><i class="<?=$m['icono']?>"></i> <?=$m['menu']?></strong></label>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php 
                            foreach($m['submenu'] as $submenu) { ?>
                        <div class="offset2 span10">
                            <div class="control-group">
                                <div class="controls checkbox">
                                    <?php if($submenu['idrol']) {
                                        $valor = 'desasociar';
                                    } else {
                                        $valor = 'asociar';
                                    } ?>
                                    <input type="checkbox" <?=($submenu['idrol'])?"checked":""?> disabled>
                                    <a href="/roles/<?=$valor?>/<?=$rol['idrol']?>/<?=$submenu['idmenu']?>/">
                                        <label class="control-label"><?=$submenu['menu']?></label>
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