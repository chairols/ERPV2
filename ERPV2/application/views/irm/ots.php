<table class="table table-condensed table-bordered">
    <tr>
        <th>O.T.</th>
        <th>Cantidad</th>
        <th>Artículo</th>
    </tr>
    <?php foreach($ots as $ot) { ?>
    <tr>
        <td><?=$ot['fabrica']?> <?=$ot['numero_ot']?></td>
        <td><?=$ot['cantidad']?></td>
        <td><?=$ot['producto']?> <?=$ot['articulo']?></td>
    </tr>
    <?php } ?>
</table>