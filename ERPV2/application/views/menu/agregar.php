<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>
    
    <section class="content">
        <div class="row-fluid">
            <ul class="nav nav-tabs nav-tabs-justified">
                <li><a href="/menu/">Listar Menú</a></li>
                <li class="active"><a href="/menu/agregar/">Agregar Menú</a></li>
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
                    <div class="box-body">
                        <form method="POST" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Ícono</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="50" class="form-control" value="<?=set_value('icono')?>" name="icono" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Menú</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="50" class="form-control" value="<?=set_value('menu')?>" name="menu" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Href</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="text" maxlength="100" class="form-control" value="<?=set_value('href')?>" name="href" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Orden</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="number" maxlength="11" class="form-control" value="<?=set_value('orden')?>" name="orden" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Padre</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <select name="padre" class="form-control chosen">
                                        <option value="0" selected>--- No tiene ---</option>
                                        <?php foreach($padres as $padre) { ?>
                                        <option value="<?=$padre['idmenu']?>"><?=$padre['menu']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-sx-12">Visible</label>
                                <div class="col-md-6 col-sm-6 col-sx-12">
                                    <input type="checkbox" class="minimal" name="visible">
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