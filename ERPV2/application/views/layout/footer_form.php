<script src="/assets/flatdream/js/jquery.js"></script>
	<script src="/assets/flatdream/js/jquery.cookie/jquery.cookie.js"></script>
  <script src="/assets/flatdream/js/jquery.pushmenu/js/jPushMenu.js"></script>
	<script type="text/javascript" src="/assets/flatdream/js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
	<script type="text/javascript" src="/assets/flatdream/js/jquery.sparkline/jquery.sparkline.min.js"></script>
  <script type="text/javascript" src="/assets/flatdream/js/jquery.ui/jquery-ui.js" ></script>
	<script type="text/javascript" src="/assets/flatdream/js/jquery.gritter/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="/assets/flatdream/js/behaviour/core.js"></script>
    
  <script type="text/javascript" src="/assets/flatdream/js/bootstrap.switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="/assets/flatdream/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/assets/datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/assets/flatdream/js/jquery.select2/select2.min.js" ></script>
<script type="text/javascript" src="/assets/flatdream/js/bootstrap.slider/js/bootstrap-slider.js" ></script>
<script type="text/javascript" src="/assets/flatdream/js/jquery.icheck/icheck.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      
      /*Switch*/
      $('.switch').bootstrapSwitch();
      
      /*DateTime Picker*/
        $(".datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
      
      $("#necesidad").datepicker({
          format: 'yyyy-mm-dd'
      });
      
      $("#terminado").datepicker({
          format: 'yyyy-mm-dd'
      });
      
      /*Select2*/
        $(".select2").select2({
          width: '100%'
        });
      
       /*Tags*/
        $(".tags").select2({tags: 0,width: '100%'});
      
       /*Slider*/
        $('.bslider').slider();     
      
      /*Input & Radio Buttons*/
        $('.icheck').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });
        
        inicio();
    });
</script>
  
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
  <script src="/assets/flatdream/js/behaviour/voice-commands.js"></script>
  <script src="/assets/flatdream/js/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/flatdream/js/jquery.flot/jquery.flot.js"></script>
<script type="text/javascript" src="/assets/flatdream/js/jquery.flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="/assets/flatdream/js/jquery.flot/jquery.flot.resize.js"></script>
<script type="text/javascript" src="/assets/flatdream/js/jquery.flot/jquery.flot.labels.js"></script>
</body>
</html>
