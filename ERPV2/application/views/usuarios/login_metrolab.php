<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Login</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="/assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="/assets/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="/assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="/assets/css/style.css" rel="stylesheet" />
   <link href="/assets/css/style-responsive.css" rel="stylesheet" />
   <link href="/assets/css/style-default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="lock">
    <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="/usuarios/login">
            <img class="center" alt="logo" src="/assets/img/logo.png">
        </a>
        <!-- END LOGO -->
    </div>
    <div class="login-wrap">
        <form method="post">
            <div class="metro single-size red">
                <div class="locked">
                    <i class="icon-lock"></i>
                    <span>Login</span>
                </div>
            </div>
            <div class="metro double-size green">
                <div class="input-append lock-input">
                    <input type="text" name="usuario" class="" placeholder="Usuario" required autofocus>
                </div>
            </div>
            <div class="metro double-size yellow">
                <div class="input-append lock-input">
                    <input type="password" name="password" class="" placeholder="Contraseña" required>
                </div>
            </div>
            <div class="metro single-size terques login">
                <button type="submit" class="btn login-btn">
                    Ingresar
                    <i class=" icon-long-arrow-right"></i>
                </button>
            </div>
        </form>
        
        <div class="login-footer">
            <div class="forgot-hint pull-right">
                <a id="forget-password" class="" href="javascript:;">Olvidó su contraseña?</a>
            </div>
        </div>
    </div>
</body>
<!-- END BODY -->
</html>