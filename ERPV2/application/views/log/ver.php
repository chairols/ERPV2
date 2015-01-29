<ul class="cbp_tmtimeline">
    <?php foreach($logs as $log) { ?>
    <li>
        <time class="cbp_tmtime" datetime="<?=$log['fecha']?>">
            <span><?=strftime('%d/%m/%Y', strtotime($log['fecha']))?></span>
            <span><?=substr($log['fecha'], 11, 5)?></span>
        </time>
        <div class="cbp_tmicon"></div>
        <div class="cbp_tmlabel">
            <h2><?=$log['usuario']['nombre']?> <?=$log['usuario']['apellido']?></h2>
            <p><?=$log['texto']?></p>
        </div>
    </li>
    <?php } ?>
</ul>