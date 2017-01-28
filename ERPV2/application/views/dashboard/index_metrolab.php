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
            <div class="metro-nav metro-fix-view">
                <div class="metro-nav-block nav-block-purple double">
                    <a data-original-title="" href="/ots/pendientes/">
                        <span class="value">
                            <i class="icon-cogs"></i>
                            <div class="info"><?=count($ots_pendientes)?></div>
                            <div class="status">Órdenes de Trabajo Pendientes</div>
                        </span>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-red double">
                    <a data-original-title="" href="/ots/vencidas/">
                        <span class="value">
                            <i class="icon-cogs"></i>
                            <div class="info"><?=count($ots_vencidas)?></div>
                            <div class="status">Órdenes de Trabajo Vencidas</div>
                        </span>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-green double">
                    <a data-original-title="" href="#">
                        <span class="value">
                            <i class="icon-cogs"></i>
                            <div class="info"><?=count($ots_cumplidas)?></div>
                            <div class="status">Órdenes de Trabajo Cumplidas</div>
                        </span>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-yellow double">
                    <a data-original-title="" href="#">
                        <span class="value">
                            <i class="icon-table"></i>
                            <div class="info"><?=count($contratos_vigentes)?></div>
                            <div class="status">Contratos Vigentes</div>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>