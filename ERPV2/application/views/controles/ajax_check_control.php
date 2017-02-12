<?php 
if(!empty($resultado)) { ?>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-sx-12">&nbsp;</label>
    <div class="col-md-6 col-sm-6 col-sx-12" id="resultado">
        <div class="alert alert-danger alert-dismissible">
            El Control <?=$resultado['control']?> ya existe.
        </div>
    </div>
</div>
<script type="text/javascript">
    $(".btn-success").attr('disabled', true);
</script>    
<?php } elseif(empty($resultado) && $control == '') {?>
<script type="text/javascript">
    $(".btn-success").attr('disabled', true);
</script>    
<?php } else { ?>
<script type="text/javascript">
    $(".btn-success").attr('disabled', false);
</script>    
<?php } ?>
