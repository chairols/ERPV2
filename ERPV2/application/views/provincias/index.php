<ul class="nav nav-tabs nav-tabs-justified">
    <li class="active"><a href="/provincias/">Listar provincias</a></li>
    <li><a href="/provincias/agregar/">Agregar provincia</a></li>
    <li><a href="/provincias/modificar/">Modificar provincia</a></li>
    <li><a href="/provincias/borradas/">Provincias borradas</a></li>
</ul>
<div class="block-flat">

    <table id="datatable" class="display table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>Provincias</strong></th>
                <th><strong>Acción</strong></th>
            </tr>
        </thead>
 
        
        
        <tbody>
        <?php foreach($provincias as $provincia) { ?>
            <tr>
                <td><?=$provincia['idprovincia']?></td>
                <td><?=$provincia['provincia']?></td>
                <td>
                    <a href="#" class="label label-default"><i class="fa fa-pencil"></i></a> 
                    <a href="#" class="label label-danger"><i class="fa fa-times"></i></a>
                    <a href="/log/ver/provincias/<?=$provincia['idprovincia']?>/" class="label label-info"><i class="fa fa-clock-o"></i></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
        
        
    </table>

</div>