<div class="content-wrapper">
    <section class="content-header">
        <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-sx-12">
                <ul class="timeline">
                    <?php foreach($logs as $log) { ?>
                    <?php 
                        $tipo = null;
                        $icono = null;
                        switch ($log['tipo']) {
                            case 'add':
                                $tipo = 'bg-green';
                                $icono = 'fa fa-plus bg-green';
                                break;
                            case 'edit';
                                $tipo = 'bg-yellow';
                                $icono = 'fa fa-edit bg-yellow';
                                break;
                            case 'del':
                                $tipo = 'bg-red';
                                $icono = 'fa fa-remove bg-red';
                                break;
                    }?>
                    <li class="time-label">
                        <span class="<?=$tipo?>">
                            <?=date('d-m-Y', strtotime($log['fecha']))?>
                        </span>
                    </li>
                    <li>
                        <i class="<?=$icono?>"></i>
                        <div class="timeline-item">
                            <span class="time">
                                <i class="fa fa-clock-o"></i> <?=date('H:i:s', strtotime($log['fecha']))?>
                            </span>
                            <h3 class="timeline-header">Tabla <?=$log['tabla']?> - ID <?=$log['idtabla']?></h3>
                            <div class="timeline-body">
                                <?=$log['texto']?>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </section>
</div>