<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>My First Grid</title>
 
<link rel="stylesheet" type="text/css" media="screen" href="/assets/jquery-ui-1.10.3.custom/css/blitzer/jquery-ui-1.10.3.custom.min.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/assets/jquery.jqGrid-4.6.0/css/ui.jqgrid.css" />


<script src="/assets/jquery.jqGrid-4.6.0/js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="/assets/jquery.jqGrid-4.6.0/js/i18n/grid.locale-es.js" type="text/javascript"></script>
<script src="/assets/jquery.jqGrid-4.6.0/js/jquery.jqGrid.min.js" type="text/javascript"></script>
<script src="/assets/datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<!--<script src="/assets/flatdream/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>-->
<!--<script src="/assets/jquery-ui-1.11.1.custom.datepicker/jquery-ui.min.js" type="text/javascript"></script>-->
<!--<script src="/assets/jquery.jqGrid-4.6.0/plugins/grid.addons.js"></script>-->


<style type="text/css">
html, body {
    margin: 0;
    padding: 0;
    font-size: 75%;
}
</style>
 
 
<script type="text/javascript">
    $(function () {

        var lastsel2
        jQuery("#rowed5").jqGrid({
            datatype: "local",
            height: 450,
            colNames:['ID', 'Fábrica', 'O.T.', 'Artículo', 'Fecha Necesidad'],
            colModel:[
                    {   
                        name: 'idot',
                        index: 'idot',
                        width: 70,
                        sortype:"int",
                        editable: false
                    },
                    {
                        name:'idfabrica',
                        index: 'idfabrica',
                        width: 70,
                        editable: false
                    },
                    {
                        name: 'numero_ot',
                        index: 'numero_ot',
                        width: 70,
                        sorttype: "int",
                        editable: false
                    },
                    {
                        name: 'idarticulo',
                        index: 'idarticulo',
                        width: 200,
                        editable: true,
                        edittype: "select",
                        editoptions:{
                            value:'<?=$articulosoptions?>'
                        }
                    },
                    {
                        name: 'sdate',
                        index: 'sdate',
                        width: 90,
                        editable: true,
                        sorttype: "date"
                    }
                    /*{name:'id',index:'id', width:90, sorttype:"int", editable: false},
                    {name:'name',index:'name', width:150,editable: true,editoptions:{size:"20",maxlength:"30"}},
                    {name:'stock',index:'stock', width:60, editable: true,edittype:"checkbox",editoptions: {value:"Yes:No"}},
                    {name:'ship',index:'ship', width:90, editable: true,edittype:"select",editoptions:{value:"FE:FedEx;IN:InTime;TN:TNT;AR:ARAMEX"}},		
                    {name:'note',index:'note', width:200, sortable:false,editable: true,edittype:"textarea", editoptions:{rows:"2",cols:"10"}},
                    */
                    
            ],
            onSelectRow: function(id){
                    if(id && id!==lastsel2){
                            jQuery('#rowed5').jqGrid('restoreRow',lastsel2);
                            jQuery('#rowed5').jqGrid('editRow',id,true,pickdates);
                            lastsel2=id;
                    }
            },
            editurl: "/ots/planilla",
            caption: "Órdenes de Trabajo"
        });
        var mydata2 = [
            <?php foreach($ots as $ot) { ?>
            {idot:"<?=$ot['idot']?>", idfabrica:"<?=$ot['fabrica']?>", numero_ot:"<?=$ot['numero_ot']?>", idarticulo: ""},
            <?php } ?>
        ];
        /*var mydata2 = [
                    {id:"12345",name:"Desktop Computer",note:"note",stock:"Yes",ship:"FedEx"},
                    {id:"23456",name:"Laptop",note:"Long text ",stock:"Yes",ship:"InTime"},
                    {id:"34567",name:"LCD Monitor",note:"note3",stock:"Yes",ship:"TNT"},
                    {id:"45678",name:"Speakers",note:"note",stock:"No",ship:"ARAMEX"},
                    {id:"56789",name:"Laser Printer",note:"note2",stock:"Yes",ship:"FedEx"},
                    {id:"67890",name:"Play Station",note:"note3",stock:"No", ship:"FedEx"},
                    {id:"76543",name:"Mobile Telephone",note:"note",stock:"Yes",ship:"ARAMEX"},
                    {id:"87654",name:"Server",note:"note2",stock:"Yes",ship:"TNT"},
                    {id:"98765",name:"Matrix Printer",note:"note3",stock:"No", ship:"FedEx"},
                    ];
                    */
        for(var i=0;i < mydata2.length;i++)
            jQuery("#rowed5").jqGrid('addRowData',mydata2[i].id,mydata2[i]);
        
        function pickdates(id) {
            jQuery("#"+id+"_sdate", "rowed5").datepicker({dateFormat:"yyyy-mm-dd"});
        }
    }); 
</script>
 
</head>
<body>
    <table id="rowed5"></table>
    <div class="content">
        <?php var_dump($articulos) ?>
        <?php var_dump($ots)?>
    </div>
</body>
</html>
