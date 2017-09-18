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
                    <a href="#" class="small-box-footer">
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
                    <a href="/contratos/" class="small-box-footer">
                        Más información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow-gradient">
                    <div class="inner">
                        <h3><?=count($irm_pendientes)?></h3>
                        <p>Materiales Pendientes de Recepción</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-car"></i>
                    </div>
                    <a href="/irm/pendientes/" class="small-box-footer">
                        Más información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!--
        <div class="row">
            <?php
            $appservercolor = null;
            $appservericono = null;
            if($FEParamHomo['FEDummyResult']->AppServer == 'OK') {
                $appservercolor = 'bg-green-gradient';
                $appservericono = 'fa-thumbs-o-up';
            } else {
                $appservercolor = 'bg-red-gradient';
                $appservericono = 'fa-thumbs-o-down';
            }
            ?>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box <?=$appservercolor?>">
                    <div class="inner">
                        <h3><?=$FEParamHomo['FEDummyResult']->AppServer?></h3>
                        <p>AppServer AFIP Homologación</p>
                    </div>
                    <div class="icon">
                        <i class="fa <?=$appservericono?>"></i>
                    </div>
                </div>
            </div>
            <?php
            $dbservercolor = null;
            $dbservericono = null;
            if($FEParamHomo['FEDummyResult']->DbServer == 'OK') {
                $dbservercolor = 'bg-green-gradient';
                $dbservericono = 'fa-thumbs-o-up';
            } else {
                $dbservercolor = 'bg-red-gradient';
                $dbservericono = 'fa-thumbs-o-down';
            }
            ?>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box <?=$dbservercolor?>">
                    <div class="inner">
                        <h3><?=$FEParamHomo['FEDummyResult']->DbServer?></h3>
                        <p>DbServer AFIP Homologación</p>
                    </div>
                    <div class="icon">
                        <i class="fa <?=$dbservericono?>"></i>
                    </div>
                </div>
            </div>
            <?php
            $authservercolor = null;
            $authservericono = null;
            if($FEParamHomo['FEDummyResult']->AuthServer == 'OK') {
                $dbservercolor = 'bg-green-gradient';
                $dbservericono = 'fa-thumbs-o-up';
            } else {
                $dbservercolor = 'bg-red-gradient';
                $dbservericono = 'fa-thumbs-o-down';
            }
            ?>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green-gradient">
                    <div class="inner">
                        <h3><?=$FEParamHomo['FEDummyResult']->AuthServer?></h3>
                        <p>AuthServer AFIP Homologación</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-thumbs-o-up"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <?php
            $appservercolor = null;
            $appservericono = null;
            if($FEParam['FEDummyResult']->AppServer == 'OK') {
                $appservercolor = 'bg-green-gradient';
                $appservericono = 'fa-thumbs-o-up';
            } else {
                $appservercolor = 'bg-red-gradient';
                $appservericono = 'fa-thumbs-o-down';
            }
            ?>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box <?=$appservercolor?>">
                    <div class="inner">
                        <h3><?=$FEParam['FEDummyResult']->AppServer?></h3>
                        <p>AppServer AFIP Producción</p>
                    </div>
                    <div class="icon">
                        <i class="fa <?=$appservericono?>"></i>
                    </div>
                </div>
            </div>
            <?php
            $dbservercolor = null;
            $dbservericono = null;
            if($FEParam['FEDummyResult']->DbServer == 'OK') {
                $dbservercolor = 'bg-green-gradient';
                $dbservericono = 'fa-thumbs-o-up';
            } else {
                $dbservercolor = 'bg-red-gradient';
                $dbservericono = 'fa-thumbs-o-down';
            }
            ?>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box <?=$dbservercolor?>">
                    <div class="inner">
                        <h3><?=$FEParam['FEDummyResult']->DbServer?></h3>
                        <p>DbServer AFIP Producción</p>
                    </div>
                    <div class="icon">
                        <i class="fa <?=$dbservericono?>"></i>
                    </div>
                </div>
            </div>
            <?php
            $authservercolor = null;
            $authservericono = null;
            if($FEParam['FEDummyResult']->AuthServer == 'OK') {
                $dbservercolor = 'bg-green-gradient';
                $dbservericono = 'fa-thumbs-o-up';
            } else {
                $dbservercolor = 'bg-red-gradient';
                $dbservericono = 'fa-thumbs-o-down';
            }
            ?>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green-gradient">
                    <div class="inner">
                        <h3><?=$FEParam['FEDummyResult']->AuthServer?></h3>
                        <p>AuthServer AFIP Producción</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-thumbs-o-up"></i>
                    </div>
                </div>
            </div>
        </div>
        -->
    </section>
</div>