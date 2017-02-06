<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/articulos/">Listar Artículos</a></li>
                <li><a href="/articulos/agregar/">Agregar Artículos</a></li>
                <li class="active"><a href="/articulos/modificar/">Modificar Artículo</a></li>
                <li><a href="/articulos/ver/">Ver Artículo</a></li>
                <li><a href="/articulos/borrados/">Artículos Borrados</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div class="box-body">
                        <form method="POST" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Artículo</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="100" class="form-control" value="<?=htmlentities($articulo['articulo'])?>" name="articulo" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Plano</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="checkbox" id="checkbox"<?=($articulo['idplano'])?" checked":""?>>
                                        </span>
                                        <div id="selectplano2">
                                            <input class="form-control" type="text" readonly>
                                        </div>
                                        <div id="selectplano">
                                            <select name="plano" class="select2 form-control">
                                                <?php foreach($planos as $plano) { ?>
                                                <option value="<?=$plano['idplano']?>"<?=($plano['idplano']==$articulo['idplano'])?" selected":""?>><?=$plano['plano']?> Rev <?=$plano['revision']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Producto</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <select name="producto" class="select2 form-control">
                                        <?php foreach($productos as $producto) { ?>
                                        <option value="<?=$producto['idproducto']?>"<?=($producto['idproducto']==$articulo['idproducto'])?" selected":""?>><?=$producto['producto']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Posición</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="number" maxlength="11" class="form-control" value="<?=$articulo['posicion']?>" name="posicion" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Padres</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <select name="padres[]" class="select2 form-control" multiple="multiple">
                                        <?php foreach($padres as $padre) { ?>
                                        <option value="<?=$padre['idarticulo']?>"<?=($padre['idarticulo_hijo']==$articulo['idarticulo'])?" selected":""?>><?=$padre['producto']?> <?=$padre['articulo']?> Rev <?=$padre['revision']?> Pos <?=$padre['posicion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Hijos</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <select name="hijos[]" class="select2 form-control" multiple="multiple">
                                        <?php foreach($hijos as $hijo) { ?>
                                        <option value="<?=$hijo['idarticulo']?>"<?=($hijo['idarticulo_padre']==$articulo['idarticulo'])?" selected":""?>><?=$hijo['producto']?> <?=$hijo['articulo']?> Rev <?=$hijo['revision']?> Pos <?=$hijo['posicion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Observaciones</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <textarea name="observaciones" class="form-control" rows="6"><?=$articulo['observaciones']?></textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Modificar</button>
                                    <button type="reset" class="btn btn-primary">Limpiar</button>
                                </div>
                            </div>
                        </form>
                        <pre>
                            <?php print_r($articulo); ?>
                            <?php print_r($planos); ?>
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function inicio() {
        if($("#checkbox").is(':checked')) {
            $("#selectplano").show();
            $("#selectplano2").hide();
        } else {
            $("#selectplano2").show();
            $("#selectplano").hide();
        }
        
        $("#checkbox").click(function() {
            var flag = $("#checkbox").is(':checked');
            if(flag == true) {
                $("#selectplano2").hide();
                $("#selectplano").fadeIn(500);
            } else {
                $("#selectplano").hide();
                $("#selectplano2").fadeIn(500);
            }
        });
        
        
    };  
</script>
