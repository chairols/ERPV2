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
            <ul class="metro_tmtimeline">
                <?php foreach($logs as $log) { ?>
                <li class="blue">
                    <div class="metro_tmtime" datetime="<?=$log['fecha']?>">
                        <span class="date"><?=strftime('%d/%m/%Y', strtotime($log['fecha']))?></span>
                        <span class="time"><?=strftime('%H:%M:%S', strtotime($log['fecha']))?></span>
                    </div>
                    <div class="metro_tmicon">
                        <?php switch ($log['tipo']) {
                            case 'add': ?>
                                <i class="icon-plus"></i>
                        <?php
                                break;
                            case 'edit': ?>
                                <i class="icon-edit"></i>
                        <?php
                                break;
                            case 'del': ?>
                                <i class="icon-remove"></i>
                        <?php
                            default:
                                break;
                        }?>
                    </div>
                    <div class="metro_tmlabel">
                        <h2><?=$log['usuario']['nombre']?> <?=$log['usuario']['apellido']?></h2>
                        <p><?=$log['texto']?></p>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>