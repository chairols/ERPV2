<table class="table table-bordered table-condensed table-striped">
    <thead>
        <tr>
            <th>Artículo</th>
            <th>Plano</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($articulos as $articulo) { ?>
        <tr>
            <td><?=$articulo['producto']?> <?=$articulo['articulo']?></td>
            <td><?=($articulo['idplano']!=NULL)?$articulo['plano']:""?></td>
            <td>
                <a href="#" onclick="desasociar_articulo(<?=$articulo['idhojadeproceso']?>, <?=$articulo['idarticulo']?>);">
                    <button class="btn btn-danger btn-xs">
                        <i class="fa fa-trash"></i>
                    </button>
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>