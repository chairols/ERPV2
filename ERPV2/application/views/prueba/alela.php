<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Tablas dinámicas</h3>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <h2>Artículos</h2>
        </div>
        <div class="x_content">
            <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Artículo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($articulos as $articulo) { ?>
                    <tr>
                        <td><?=$articulo['producto']?></td>
                        <td><?=$articulo['articulo']?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> 
</div>