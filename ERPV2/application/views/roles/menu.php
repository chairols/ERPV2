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
                                    <input type="checkbox" name="checkbox-<?=$m['idmenu']?>">
                                    <label class="control-label"><strong><?=$m['menu']?></strong></label>
                                </div>
                            </div>
                        </div>
                        <?php 
                            foreach($m['submenu'] as $submenu) { ?>
                        <div class="offset2 span10">
                            <div class="control-group">
                                <div class="controls checkbox">
                                    <input type="checkbox" name="checkbox-<?=$submenu['idmenu']?>">
                                    <label class="control-label"><?=$submenu['menu']?></label>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        } ?>
        </div>
    </div>
</div>