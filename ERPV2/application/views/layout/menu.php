<div id="container" class="row-fluid">
    <div class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse">
            <div class="navbar-inverse">
                <form class="navbar-search visible-phone">
                    <input type="text" class="search-query" placeholder="Search" />
                </form>
            </div>
            <ul class="sidebar-menu">
                
                
                
                <?php foreach($menu as $m) { ?>
                    <?php foreach($m as $mm) { ?>
                    <?php if($mm['visible'] == 1 && $mm['idrol']) { ?>
                    <?php $aux = false;
                        foreach($mm['submenu'] as $submenu) {
                            if('/'.$segmento.'/' == $submenu['href']) {
                                $mm['active'] = true;
                            }
                        }
                    ?>
                <li class="sub-menu<?=($mm['active'])?' active':''?>">
                    <a class="" href="<?=$mm['href']?>">
                        <i class="<?=$mm['icono']?>"></i>
                        <span><?=$mm['menu']?></span>
                    </a>
                    <ul class="sub">
                    <?php foreach($mm['submenu'] as $submenu) { ?>
                        <?php if($submenu['visible'] == 1 && $submenu['idrol']) { ?>
                        <?php $aux = '/'.$segmento.'/'; ?>
                        <li<?=($submenu['href']==$aux)?" class='active'":""?>><a href="<?=$submenu['href']?>"><?=$submenu['menu']?></a></li>
                        <?php } ?>
                    <?php } ?>
                    </ul>
                </li>        
                    <?php } ?>
                    <?php } ?>
                <?php } ?>
                
            </ul>
        </div>
    </div>
</div>