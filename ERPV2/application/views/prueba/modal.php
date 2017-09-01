<div class="content-wrapper">
    <section class="content">
        <input type="text" id="ot">
        <br>
        <button onclick="modal()">OK</button>
    </section>
</div>

<script type="text/javascript">
    
   
    function modal() {
       $.ajax({
            type: 'GET',
            url: '/ots/trazabilidad_ajax/'+$("#ot").val()+'/',
            success: function(data) {
                alertify.alert().set({'startMaximized':true, 'title':'Trazabilidad', 'message':data}).show(); 
            }
        });
    }
</script>