<ul class="nav nav-tabs nav-tabs-justified">
    <li><a href="/rfqs/">Listar RFQ's</a></li>
    <li class="active"><a href="/rfqs/agregar/">Agregar RFQ</a></li>
</ul>

<div class="block-flat">
    <form role="form" method="post">
        <div class="form-group">
            <label>Item</label>
            <input type="text" maxlength="11" class="form-control" value="<?=$rfq['item']?>" name="item" readonly="">
        </div>
        
        <div class="form-group">
            <label>Fecha</label>
            <input type="text" class="form-control" name="fecha" value="<?=$rfq['fecha']?>" readonly>
        </div>
        
        <div class="form-group">
            <label>Orden de Trabajo</label>
            <input type="text" class="form-control" name="ot" value="<?=$ot['numero_ot']?>" readonly>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
    
    <div class="header">
        <h3>Items</h3>
    </div>
    <div class="content">
        <div class="table-responsive">
            <table class="table no-border hover">
                <thead class="no-border">
                    <tr>
                        <th>Item</th>
                        <th>Fecha</th>
                        <th>Orden de Trabajo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    function inicio() {
        
    }

</script>