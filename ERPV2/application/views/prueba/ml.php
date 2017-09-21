<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div class="box-body">
                        <form method="POST" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Alerta</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <?php var_dump($alerta); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Fábrica</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="11" class="form-control" id="articulo" required autofocus>
                                    <input type="hidden" name="articulo" id="idarticulo">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Agregar</button>
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
        
        var options = {
            url: "/prueba/ml_ajax/",
            getValue: "completo",
            list: {
                maxNumberOfElements: 8,
                match: {
                    enabled: true
                },
                sort: {
                    enabled: true
                },
                onSelectItemEvent: function() {
                    var value = $("#articulo").getSelectedItemData().idarticulo;

                    $("#idarticulo").val(value);
		}
                
            }
        };

        $("#articulo").easyAutocomplete(options);
    }
</script>