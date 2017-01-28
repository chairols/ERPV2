<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?=$title?></h3>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="row">
        <ul class="nav nav-tabs bar_tabs nav-tabs-justified">
            <li class="active"><a href="/prueba/pedidos/">Listar Pedidos</a></li>
            <li><a href="/pedidos/agregar/">Agregar Pedido</a></li>
            <li><a href="/pedidos/ver/">Ver Pedido</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pedidos</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Pedido #</th>
                            <th>Cliente</th>
                            <th>Orden de Compra</th>
                            <th>Adjunto</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pedidos as $pedido) { ?>
                        <tr>
                            <td><?=$pedido['idpedido']?></td>
                            <td><?=$pedido['cliente']?></td>
                            <td><?=$pedido['ordendecompra']?></td>
                            <td>
                                <a href="<?=$pedido['adjunto']?>" target="_blank">
                                    <?php if($pedido['adjunto']!= '') { ?>
                                    <button class="btn btn-xs btn-primary" type="button" data-pacement="top" data-toggle="tooltip" data-original-title="Ver Adjunto">
                                        <i class="fa fa-file"></i>
                                    </button>
                                    <?php } ?>
                                </a>
                            </td>
                            <td>
                                <a href="/pedidos/agregar_items/<?=$pedido['idpedido']?>">
                                    <button class="btn btn-xs btn-success" type="button" data-pacement="top" data-toggle="tooltip" data-original-title="Modificar">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                                <a href="#">
                                    <button class="btn btn-xs btn-danger" type="button" data-pacement="top" data-toggle="tooltip" data-original-title="Eliminar">
                                        <i class="fa fa-trash"></i>
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
    
    
    
    <div class="row calendar-exibit">
        <div class="col-md-3">
            <fieldset>
                <select name="asd" class="form-control" id="select2">
                    <option>asdf</option>
                    <option>ksafjlkj</option>
                </select>
            </fieldset>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal3" placeholder="First Name" aria-describedby="inputSuccess2Status4">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <input id="tags_1" type="text" class="tags form-control" value="pepe, le, pu" />
            
        </div>
    </div>
    
</div>


<script type="text/javascript">
    function inicio() {
        $("#select2").select2();
    }
</script>