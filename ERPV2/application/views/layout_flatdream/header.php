<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
        
        <title></title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>
        
        <link href="/assets/flatdream/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/assets/flatdream/js/jquery.gritter/css/jquery.gritter.css" />
        <link rel="stylesheet" href="/assets/flatdream/fonts/font-awesome-4/css/font-awesome.min.css">
        
        <link rel="stylesheet" type="text/css" href="/assets/flatdream/js/jquery.nanoscroller/nanoscroller.css" />

        <link rel="stylesheet" type="text/css" href="/assets/flatdream/js/jquery.codemirror/lib/codemirror.css">
        <link rel="stylesheet" type="text/css" href="/assets/flatdream/js/jquery.codemirror/theme/ambiance.css">
        <link rel="stylesheet" href="/assets/flatdream/js/jquery.vectormaps/jquery-jvectormap-1.2.2.css" type="text/css" media="screen"/>  
        
        <link href="/assets/flatdream/css/style.css" rel="stylesheet" />	
    </head>
    
    <body>
        <div class="cl-wrapper">
            <div class="cl-sidebar">
                <div class="cl-toggle">
                    <i class="fa fa-bars"></i>
                </div>
                <div class="cl-navblock">
                    <div class="menu-space">
                        <div class="content">
                            <div class="sidebar-logo">
                                <div class="logo">
                                    
                                </div>
                            </div>
                        </div>
                        <ul class="cl-vnavigation">
                            <li><a href="/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                            <li><a href="#"><i class="fa fa-file-o"></i> Maestros</a>
                                <ul class="sub-menu">
                                    <li><a href="/articulos/">Artículos</a></li>
                                    <li><a href="/fabricas/">Fábricas</a></li>
                                    <li><a href="/insumos/">Insumos</a></li>
                                    <li><a href="/productos/">Productos</a></li>
                                    <li><a href="/proveedores/">Proveedores</a></li>
                                    <li><a href="/provincias/">Provincias</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-gears"></i> Producción</a>
                                <ul class="sub-menu">
                                    <li><a href="#">RFQ's</a></li>
                                    <li><a href="/ots/">Órdenes de Trabajo</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid" id="pcont" style="width: 80%">
                <div id="head-nav" class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-collapse">
                            <ul class="nav navbar-nav navbar-right user-nav">
                                <li class="dropdown profile_menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$session['nombre']?> <?=$session['apellido']?></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Perfil</a></li>
                                        <li><a href="/usuarios/logout/">Salir</a></li>
                                    </ul>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
                
                <div class="cl-mcont">
                    
                    