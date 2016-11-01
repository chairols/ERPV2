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
                <li><a href="/plantillas/">Listar Plantillas</a></li>
                <li class="active"><a href="/plantillas/agregar/">Agregar Plantilla</a></li>
                <li><a href="/plantillas/modificar/">Modificar Plantilla</a></li>
                <li><a href="/plantillas/ver/">Ver Plantilla</a></li>
            </ul>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Plantillas</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Título</label>
                                <input type="text" maxlength="200" class="form-control span8" name="titulo" required autofocus>
                            </div>
                            <div class="control-group">
                                <textarea class="span12" id="plantilla" name="plantilla"></textarea>
                            </div>
                            <hr>
                            <div class="form-control">
                                <button type="submit" class="btn btn-success">
                                    <i class="icon-save"></i> Guardar
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    <i class="icon-remove"></i> Limpiar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    
    
    <textarea class="span8" id="ck"></textarea>
</div>

<script type="text/javascript" src="/assets/assets/ckeditor_4.5.11_full/ckeditor.js"></script>
<script type="text/javascript">
    function inicio() {
        CKEDITOR.replace('plantilla');
    }
</script>