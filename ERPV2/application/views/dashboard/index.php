<div class="col-md-4 col-sm-6">
    <div class="fd-tile detail tile-purple">
        <div class="content">
            <h1 class="text-left"><?=count($ots_pendientes)?></h1>
            <p>Órdenes de Trabajo Pendientes</p>
        </div>
        <div class="icon">
            <i class="fa fa-cogs"></i>
        </div>
        <a class="details" href="/ots/pendientes/">
            DETALLES
            <span>
                <i class="fa fa-arrow-circle-right pull-right"></i>
            </span>
        </a>
    </div>
</div>


<div class="col-md-4 col-sm-6">
    <div class="fd-tile detail tile-red">
        <div class="content">
            <h1 class="text-left"><?=count($ots_vencidas)?></h1>
            <p>Órdenes de trabajo Vencidas</p>
        </div>
        <div class="icon">
            <i class="fa fa-cogs"></i>
        </div>
        <a class="details" href="/ots/vencidas/">
            DETALLES
            <span>
                <i class="fa fa-arrow-circle-right pull-right"></i>
            </span>
        </a>
    </div>
</div>

<div class="col-md-4 col-sm-6">
    <div class="fd-tile detail tile-lemon">
        <div class="content">
            <h1 class="text-left"><?=count($ots_cumplidas);?></h1>
            <p>Órdenes de Trabajo Cumplidas</p>
        </div>
        <div class="icon">
            <i class="fa fa-cogs"></i>
        </div>
        <a class="details" href="#">
            DETALLES
            <span>
                <i class="fa fa-arrow-circle-right pull-right"></i>
            </span>
        </a>
    </div>
</div>