<div class="right_col" role="main">
    <div class="row top_tiles">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-sx-12">
            <a href="/ots/pendientes/">
                <div class="tile-stats">
                    <div class="icon">
                        <i class="fa fa-cogs"></i>
                    </div>
                    <div class="count"><?=count($ots_pendientes)?></div>
                    <h3>Órdenes de Trabajo Pendientes</h3>
                </div>
            </a>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-sx-12">
            <a href="/ots/vencidas/">
                <div class="tile-stats">
                    <div class="icon">
                        <i class="fa fa-cogs"></i>
                    </div>
                    <div class="count"><?=count($ots_vencidas)?></div>
                    <h3>Órdenes de Trabajo Vencidas</h3>
                </div>
            </a>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-sx-12">
            <a href="#">
                <div class="tile-stats">
                    <div class="icon">
                        <i class="fa fa-cogs"></i>
                    </div>
                    <div class="count"><?=count($ots_cumplidas)?></div>
                    <h3>Órdenes de Trabajo Cumplidas</h3>
                </div>
            </a>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-sx-12">
            <a href="#">
                <div class="tile-stats">
                    <div class="icon">
                        <i class="fa fa-table"></i>
                    </div>
                    <div class="count"><?=count($contratos_vigentes)?></div>
                    <h3>Contratos Vigentes</h3>
                </div>
            </a>
        </div>
    </div>
</div>




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