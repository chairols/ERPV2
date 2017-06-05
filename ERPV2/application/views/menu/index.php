<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="/menu/">Listar Menú</a></li>
                <li><a href="/menu/agregar/">Agregar Menú</a></li>
                <li><a href="/menu/modificar/">Modificar Menú</a></li>
            </ul>
        </div>
        
        <br>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><?=$title?></h3>
                    </div>
                    <div id="gears">
                        <div class="overlay">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                    </div>
                    <div id="tabla" style="display: none;">
                        <div class="box-body">
                            <table id="datatable" class="table table-striped table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th><strong>Menú</strong></th>
                                        <th><strong>Href</strong></th>
                                        <th><strong>Orden</strong></th>
                                        <th><strong>Padre</strong></th>
                                        <th><strong>Visible</strong></th>
                                        <th><strong>Acción</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($mmenu as $m) { ?>
                                    <tr>
                                        <td><?=$m['menu']?></td>
                                        <td><?=$m['href']?></td>
                                        <td><?=$m['orden']?></td>
                                        <td><?=(count($m['padre']))?$m['padre']['menu']:"-- No tiene --"?></td>
                                        <td><?=($m['visible'])?"Si":"No"?></td>
                                        <td>
                                            <a href="/menu/modificar/<?=$m['idmenu']?>/">
                                                <button class="btn btn-xs btn-warning" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function inicio() {
        $("#gears").hide();
        $("#tabla").fadeIn(1000);
    }
</script>