<link rel="stylesheet" type="text/css" href="/assets/flatdream/js/jquery.select2/select2.css" />
<script type="text/javascript" src="/assets/flatdream/js/jquery.select2/select2.min.js"></script>
<select name="pepe" class="select2" id="sel">
    <option value="1">Uno</option>
    <option value="2">Dos</option>
    <option value="3">Tres</option>
</select>
<script type="text/javascript">
    $(document).ready(function() {
        $("#sel").select2();
    });
</script>