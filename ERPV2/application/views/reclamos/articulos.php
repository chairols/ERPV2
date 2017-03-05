<select name="articulos[]" class="form-control" id="articulos" multiple="" required>
    <?php foreach($items as $item) { ?>
    <option value="<?=$item['idpendienteirm']?>"><?=$item['producto']?> <?=$item['articulo']?></option>
    <?php } ?>
</select>