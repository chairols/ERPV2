<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/monedas/">Listar Monedas</a></li>
                <li class="active"><a href="/monedas/agregar/">Agregar Moneda</a></li>
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
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Moneda</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="50" class="form-control" value="<?=set_value('moneda')?>" name="moneda" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Símbolo</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="10" class="form-control" value="<?=set_value('simbolo')?>" name="simbolo" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Currency</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="3" class="form-control" value="<?=set_value('currency')?>" name="currency" required>
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
