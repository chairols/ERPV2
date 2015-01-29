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
        
        <div class="container">
      
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/home/">Roller Service</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-collapse">
                        <span class="sr-only">Toogle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                
                <div class="collapse navbar-collapse" id="bs-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Maestros <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="/articulos/">Artículos</a></li>
                                <li><a href="/insumos/">Insumos</a></li>
                                <li><a href="/productos/">Productos</a></li>
                                <li><a href="/proveedores/">Proveedores</a></li>
                                <li><a href="/provincias/">Provincias</a></li>
                                <li><a href="/sucursales/">Sucursales</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Producción <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="/ots/">Órdenes de Trabajo</a></li>
                                <li><a href="/rfq/">RFQ</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$session['nombre']?> <?=$session['apellido']?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="/usuarios/logout/">Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            
          
          <br><br><br>