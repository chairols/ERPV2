<?php 
if(!empty($resultado)) { ?>
<div class="alert alert-danger span12">El Control <?=$resultado['control']?> ya existe.</div>
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
