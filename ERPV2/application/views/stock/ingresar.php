<div id="main-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">
                    <?=$title?>
                </h3>
            </div>
        </div>
        
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/stock/">Listar Stock</a></li>
                <li><a href="/stock/modificar/">Modificar Stock</a></li>
                <li><a href="/stock/ver/">Ver Stock</a></li>
                <li><a href="/stock/con_stock/">Listar Con Stock</a></li>
                <li class="active"><a href="/stock/ingresar/">Ingresar Stock</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Stock</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Artículo</label>
                                <div class="controls">
                                    <select name="articulo" class="span12 select2" id="articulo">
                                        <?php foreach($articulos as $articulo) { ?>
                                        <option value="<?=$articulo['idarticulo']?>"><?=$articulo['producto']?> <?=$articulo['articulo']?> Pos <?=$articulo['posicion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Marca</label>
                                <div class="controls">
                                    <div id="marca">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Proveedor</label>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Orden de Compra</label>
                            </div>
                            <div class="control-group">
                                <label class="control-label"></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    
    function inicio() {
        $("#articulo").change(function() {
            idarticulo = $("#articulo").val();
            alert(idarticulo);
        });
    }
</script>