<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        
        <title>Login</title>
        
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
        
        <script src="/assets/js/jquery-1.8.2.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
    </head>
    
    <body>


<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
</style>
    
<div class="container">
    <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Login</h2>
        <input name="usuario" id="usuario" type="text" class="input-block-level" placeholder="Usuario">
        <input name="password" type="password" class="input-block-level" placeholder="Password">
        <button class="btn btn-large btn-primary" type="submit">Ingresar</button>
    </form>
</div>

<script>
    $(document).ready(function(){
        $("#usuario").focus();
    });
</script>

    </body>
</html>