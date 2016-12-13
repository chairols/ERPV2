<!DOCTYPE html>
<html>
<head>
	<title>Prueba de Ajax</title>
	<script type="text/javascript" src="/assets/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".boton").click(function() {
				
				$.ajax({
		            type: 'GET',
		            url: '/prueba/',
		            beforeSend: function() {
		                $("#contenido").html('<img src="/assets/img/ajax-loader.gif">');
		            },
		            success: function(data) {
		                $("#contenido").html(data);
		            }
		        });


			});
		});
	</script>
</head>
<body>

<button class="boton">Pulsar</button>
<div id="contenido"></div>

</body>
</html>