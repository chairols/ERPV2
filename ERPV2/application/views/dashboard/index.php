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
