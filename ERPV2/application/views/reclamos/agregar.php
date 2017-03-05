<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/reclamos/">Listar Reclamos</a></li>
                <li class="active"><a href="/reclamos/agregar/">Agregar Reclamo</a></li>
                <li><a href="/reclamos/modificar/">Modificar Reclamo</a></li>
                <li><a href="/reclamos/ver/">Ver Reclamo</a></li>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Proveedor</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="proveedor" id="proveedor" onchange="inicio()" class="select2 form-control" required>
                                        <?php foreach($proveedores as $proveedor) { ?>
                                        <option value="<?=$proveedor['idproveedor']?>"><?=$proveedor['proveedor']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Artículos</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div id="resultado"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Reclamo</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="reclamo" class="form-control" rows="10" required></textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Agregar</button>
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
        articulos();
    }
    
    function articulos() {
        $.ajax({
            type: 'GET',
            url: '/reclamos/articulos/'+$("#proveedor").val(),
            beforeSend: function() {
                $("#resultado").html('<img src="/assets/img/ajax-loader.gif">');
            },
            success: function(data) {
                $("#resultado").html(data);
                $("#articulos").select2();
            }    
        });
    }
</script>