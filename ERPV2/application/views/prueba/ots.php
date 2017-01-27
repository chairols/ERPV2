<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?=$title?></h3>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="row">
        <ul class="nav nav-tabs bar_tabs nav-tabs-justified">
            <li class="active"><a href="/prueba/ots/">Listar O.T.S.</a></li>
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
                <table id="datatable-buttons-desc" class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>O.T.</th>
                            <th>Fábrica</th>
                            <th>Cantidad</th>
                            <th>Material</th>
                            <th>Necesidad</th>
                            <th>Terminado</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($ots as $ot) { ?>
                        <tr>
                            <td><?=$ot['numero_ot']?></td>
                            <td><?=$ot['fabrica']?></td>
                            <td><?=$ot['cantidad']?></td>
                            <td>
                                <a href="/articulos/ver/<?=$ot['idarticulo']?>/">
                                <?=$ot['producto']?> <?=$ot['articulo']?>
                                </a>
                            </td>
                            <td><?=$ot['fecha_necesidad']?></td>
                            <td><?=$ot['fecha_terminado']?></td>
                            <td>
                                <?php if($ot['fecha_terminado'] == null) { ?>
                                <div class="btn btn-danger btn-xs">PENDIENTE</div>
                                <?php } else { ?>
                                <div class="btn btn-success btn-xs">CUMPLIDA</div>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="/ots/ver/<?=$ot['idot']?>/" data-toggle="tooltip" data-pacement="top" data-original-title="Ver OT">
                                    <button class="btn btn-success btn-xs">
                                        <i class="fa fa-eye"></i>
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
    
</div>


<script type="text/javascript">
    function inicio() {
        $("#select2").select2();
    }
</script>