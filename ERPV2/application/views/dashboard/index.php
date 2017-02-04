<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua-gradient">
                    <div class="inner">
                        <h3><?=count($ots_pendientes)?></h3>
                        <p>Órdenes de Trabajo Pendientes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cogs"></i>
                    </div>
                    <a href="/ots/pendientes/" class="small-box-footer">
                        Más información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red-gradient">
                    <div class="inner">
                        <h3><?=count($ots_vencidas)?></h3>
                        <p>Órdenes de Trabajo Vencidas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-thumbs-o-down"></i>
                    </div>
                    <a href="/ots/vencidas/" class="small-box-footer">
                        Más información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green-gradient">
                    <div class="inner">
                        <h3><?=count($ots_cumplidas)?></h3>
                        <p>Órdenes de Trabajo Cumplidas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-thumbs-o-up"></i>
                    </div>
                    <a href="/ots/vencidas/" class="small-box-footer">
                        Más información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow-gradient">
                    <div class="inner">
                        <h3><?=count($contratos_vigentes)?></h3>
                        <p>Contratos Vigentes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-table"></i>
                    </div>
                    <a href="/ots/vencidas/" class="small-box-footer">
                        Más información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>