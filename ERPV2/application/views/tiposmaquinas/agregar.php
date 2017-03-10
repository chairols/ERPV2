<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/tiposmaquinas/">Listar Tipos de Máquinas</a></li>
                <li class="active"><a href="/tiposmaquinas/agregar/">Agregar Tipo de Máquina</a></li>
                <li><a href="/tiposmaquinas/modificar/">Modificar Tipo de Máquina</a></li>
                <li><a href="/tiposmaquinas/ver/">Ver Tipo de Máquina</a></li>
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
                        <div class="form-horizontal">
                            <div class="form-group" id="form-tipo-maquina">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Máquina</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" maxlength="100" class="form-control" id="tipomaquina" name="tipomaquina" required autofocus>
                                </div>
                                <div id="tipomaquinaerror" class="col-md-3 col-sm-3 col-xs-12"></div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button id="ok" class="btn btn-success">Agregar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

