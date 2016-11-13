    <!-- BEGIN CONTAINER -->
    <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse">

         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
        <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
               <input type="text" class="search-query" placeholder="Search" />
            </form>
        </div>
        <!-- END RESPONSIVE QUICK SEARCH FORM -->
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="sidebar-menu">
            <?php switch ($session['tipo_usuario']) {
                    case '1':  // Administrador ?>
            <li class="sub-menu<?=($segmento=='dashboard')?" active":""?>">
                <a class="" href="/dashboard/">
                    <i class="icon-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu<?=($segmento=='almacenes'||$segmento=='stock')?" active":""?>">
                <a href="javascript:;" class="">
                    <i class="icon-archive"></i>
                    <span>Almacenes</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li<?=($segmento=='almacenes')?" class='active'":""?>><a class="" href="/almacenes/">Almacenes</a></li>
                    <li<?=($segmento=='stock')?" class='active'":""?>><a class="" href="/stock/">Stock</a></li>
                    
                </ul>
            </li>
            <li class="sub-menu<?=($segmento=='articulos'||$segmento=='marcas'||$segmento=='planos'||$segmento=='productos'||$segmento=='medidas')?" active":""?>">
                <a href="javascript:;" class="">
                    <i class="icon-book"></i>
                    <span>Artículos</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li<?=($segmento=='articulos')?" class='active'":""?>><a class="" href="/articulos/">Artículos</a></li>
                    <li<?=($segmento=='marcas')?" class='active'":""?>><a class="" href="/marcas/">Marcas</a></li>
                    <li<?=($segmento=='planos')?" class='active'":""?>><a class="" href="/planos/">Planos</a></li>
                    <li<?=($segmento=='productos')?" class='active'":""?>><a class="" href="/productos/">Productos</a></li>
                    <li<?=($segmento=='medidas')?" class='active'":""?>><a class="" href="/medidas/">Unidades de Medida</a></li>
                </ul>
            </li>
            <li class="sub-menu<?=($segmento=='ocs'||$segmento=='proveedores'||$segmento=='reqs'||$segmento=='retenciones')?" active":""?>">
                <a href="javascript:;" class="">
                    <i class="icon-dollar"></i>
                    <span>Compras</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li<?=($segmento=='ocs')?" class='active'":""?>><a class="" href="/ocs/">Órdenes de Compra</a></li>
                    <li<?=($segmento=='proveedores')?" class='active'":""?>><a class="" href="/proveedores/">Proveedores</a></li>
                    <li<?=($segmento=='reqs')?" class='active'":""?>><a class="" href="/reqs">REQ's</a></li>
                    <li<?=($segmento=='retenciones')?" class='active'":""?>><a class="" href="/retenciones/">Retenciones</a></li>
                </ul>
            </li>
            <li class="sub-menu<?=($segmento=='clientes'||$segmento=='fabricas'||$segmento=='insumos'||$segmento=='materiales'||$segmento=='menu'||$segmento=='monedas'||$segmento=='plantillas'||$segmento=='provincias'||$segmento=='roles')?" active":""?>">
                <a href="javascript:;" class="">
                    <i class="icon-file"></i>
                    <span>Maestros</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li<?=($segmento=='clientes')?" class='active'":""?>><a class="" href="/clientes/">Clientes</a></li>
                    <li<?=($segmento=='fabricas')?" class='active'":""?>><a class="" href="/fabricas/">Fábricas</a></li>
                    <li<?=($segmento=='insumos')?" class='active'":""?>><a class="" href="/insumos/">Insumos</a></li>
                    <li<?=($segmento=='materiales')?" class='active'":""?>><a class="" href="/materiales/">Materiales</a></li>
                    <li<?=($segmento=='menu')?" class='active'":""?>><a class="" href="/menu/">Menú</a></li>
                    <li<?=($segmento=='monedas')?" class='active'":""?>><a class="" href="/monedas/">Monedas</a></li>
                    <li<?=($segmento=='plantillas')?" class='active'":""?>><a class="" href="/plantillas/">Plantillas</a></li>
                    <li<?=($segmento=='provincias')?" class='active'":""?>><a class="" href="/provincias/">Provincias</a></li>
                    <li<?=($segmento=='roles')?" class='active'":""?>><a class="" href="/roles/">Roles</a></li>
                </ul>
            </li>
            <li class="sub-menu<?=($segmento=='contratos'||$segmento=='numeroserie'||$segmento=='ots'||$segmento=='pedidos')?" active":""?>">
                <a href="javascript:;" class="">
                    <i class="icon-gears"></i>
                    <span>Producción</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li<?=($segmento=='contratos')?" class='active'":""?>><a class="" href="/contratos/">Contratos</a></li>
                    <li<?=($segmento=='numeroserie')?" class='active'":""?>><a class="" href="/numeroserie/">Números de Serie</a></li>
                    <li<?=($segmento=='ots')?" class='active'":""?>><a class="" href="/ots/">Órdenes de Trabajo</a></li>
                    <li<?=($segmento=='pedidos')?" class='active'":""?>><a class="" href="/pedidos/">Pedidos</a></li>
                </ul>
            </li>
            
              <?php
                        break;

                    default:
                        show_404();
                        break;
                }?>
              
              <?php if($session['tipo_usuario'] == '2') { ?>
              <li class="sub-menu<?=($segmento=='dashboard')?" active":""?>">
                  <a class="" href="/dashboard/">
                      <i class="icon-dashboard"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="sub-menu<?=($segmento=='perfil'||$segmento=='especializaciones'||$segmento=='categorias')?" active":""?>">
                  <a href="javascript:;" class="">
                      <i class="icon-user-md"></i>
                      <span>Gestionar CV</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li<?=($segmento=='perfil')?" class='active'":""?>><a class="" href="/usuarios/perfil/">Perfil</a></li>
                      <li<?=($segmento=='especializaciones')?" class='active'":""?>><a class="" href="/especializaciones/mis_especializaciones/">Especializaciones</a></li>
                      <li<?=($segmento=='categorias')?" class='active'":""?>><a class="" href="#">Categorías</a></li>
                  </ul>
              </li>
              <li class="sub-menu<?=($segmento=='frecuencia')?" active":""?>">
                  <a class="" href="/consultas/frecuencia/">
                      <i class="icon-list"></i>
                      <span>Consultas</span>
                  </a>
              </li>
              <li class="sub-menu<?=($segmento=='agenda')?" active":""?>">
                  <a class="" href="/agenda/">
                      <i class="icon-calendar"></i>
                      <span>Agenda</span>
                  </a>
              </li>
              <li class="sub-menu<?=($segmento=='consultas')?" active":""?>">
                  <a class="" href="/consultas/">
                      <i class="icon-comments-alt"></i>
                      <span>Consultas</span>
                  </a>
              </li>
              <?php } ?>
              <?php if($session['tipo_usuario'] == '3') { ?>
              <li class="sub-menu<?=($segmento=='dashboard')?" active":""?>">
                  <a class="" href="/dashboard/">
                      <i class="icon-dashboard"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="sub-menu<?=($segmento=='cartilla')?" active":""?>">
                  <a class="" href="/profesionales/cartilla/">
                      <i class="icon-user-md"></i>
                      <span>Cartilla</span>
                  </a>
              </li>
              <li class="sub-menu<?=($segmento=='vinculos')?" active":""?>">
                  <a class="" href="/profesionales/vinculos/">
                      <i class="icon-resize-small"></i>
                      <span>Vínculos</span>
                  </a>
              </li>
              <?php } ?>
          </ul>
         <!-- END SIDEBAR MENU -->
      </div>
    </div>
    <!-- END SIDEBAR -->
    </div>