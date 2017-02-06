<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/planos/">Listar Planos</a></li>
                <li><a href="/planos/agregar/">Agregar Plano</a></li>
                <li class="active"><a href="/planos/modificar">Modificar Plano</a></li>
                <li><a href="/planos/ver/">Ver Plano</a></li>
                <li><a href="/planos/borrados/">Planos Borrados</a></li>
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
                        <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Plano</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="100" class="form-control" name="plano" value="<?=$plano['plano']?>" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Revisión</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="number" maxlength="11" class="form-control" name="revision" value="<?=$plano['revision']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Cliente</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="checkbox" <?=($plano['idcliente']>'0')?"checked":""?> id="checkbox">
                                        </span>
                                        <div id="selectcliente2">
                                            <input class="form-control" type="text" readonly>
                                        </div>
                                        <div id="selectcliente">
                                            <select name="cliente" class="select2 form-control">
                                                <?php foreach($clientes as $cliente) { ?>
                                                <option value="<?=$cliente['idcliente']?>"<?=($cliente['idcliente']==$plano['idcliente'])?" selected":""?>><?=$cliente['cliente']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Archivo del Plano</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <?php if($plano['planofile'] != '') { ?>
                                    <div class="input-group">
                                    <?php } ?>
                                    <input type="file" class="form-control" name="planofile">
                                    <?php if($plano['planofile'] != '') { ?>
                                        <span class="input-group-addon">
                                            <a href="<?=$plano['planofile']?>" target="_blank" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Plano" class="tooltips">
                                                <button class="btn btn-xs btn-success">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                        </span>
                                        <span class="input-group-addon">
                                            <a href="/planos/borrararchivo/<?=$plano['idplano']?>" data-pacement="top" data-toggle="tooltip" data-original-title="Borrar Archivo" class="tooltips">
                                                <button class="btn btn-xs btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                        </span>
                                    </div>
                                    <?php } ?>    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Observaciones</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <textarea name="observaciones" class="form-control" rows="6"><?=$plano['observaciones']?></textarea>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function inicio() {
        
        var flag = $("#checkbox").is(':checked');
        if(flag == true) {
            $("#selectcliente2").hide();
            $("#selectcliente").fadeIn(500);
        } else {
            $("#selectcliente").hide();
            $("#selectcliente2").fadeIn(500);
        }
        
        $("#checkbox").click(function() {
            var flag = $("#checkbox").is(':checked');
            if(flag == true) {
                $("#selectcliente2").hide();
                $("#selectcliente").fadeIn(500);
            } else {
                $("#selectcliente").hide();
                $("#selectcliente2").fadeIn(500);
            }
        });
    };
    
    
</script>