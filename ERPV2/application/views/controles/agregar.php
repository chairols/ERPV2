<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/controles/">Listar Controles</a></li>
                <li class="active"><a href="/controles/agregar/">Agregar Control</a></li>
                <li><a href="/controles/modificar/">Modificar Control</a></li>
                <li><a href="/controles/ver/">Ver Control</a></li>
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
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Control</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="100" onkeyup="checkcontrol();" class="form-control" id="control" name="control" autofocus required>
                                </div>
                            </div>
                            <div id="resultado">
                                
                            </div>
                            <div class="ln_solid"></div>
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
        
    }
    
    function checkcontrol() {
        $.ajax({
            type: 'GET',
            url: '/controles/ajax_check_control/'+$("#control").val(),
            beforeSend: function() {
                $("#resultado").html('<img src="/assets/img/ajax-loader.gif">');
            },
            success: function(data) {
                $("#resultado").html(data);
            }
        });
        
    }
</script>