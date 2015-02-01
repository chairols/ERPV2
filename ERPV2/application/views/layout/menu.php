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
            <li class="sub-menu<?=($segmento=='articulos'||$segmento=='clientes'||$segmento=='fabricas'||$segmento=='insumos')?" active":""?>">
                <a href="javascript:;" class="">
                    <i class="icon-file"></i>
                    <span>Maestros</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li<?=($segmento=='articulos')?" class='active'":""?>><a class="" href="/articulos/">Artículos</a></li>
                    <li<?=($segmento=='clientes')?" class='active'":""?>><a class="" href="/clientes/">Clientes</a></li>
                    <li<?=($segmento=='fabricas')?" class='active'":""?>><a class="" href="/fabricas/">Fábricas</a></li>
                    <li<?=($segmento=='insumos')?" class='active'":""?>><a class="" href="/insumos/">Insumos</a></li>
                </ul>
            </li>
              <?php
                        break;

                    default:
                        show_404();
                        break;
                }?>
              <?php if($session['tipo_usuario'] == '1') { ?>
              
            <li class="sub-menu<?=($segmento=='categorias'||$segmento=='consultantes'||$segmento=='especializaciones'||$segmento=='profesionales'||$segmento=='profesiones')?" active":""?>">
                <a href="javascript:;" class="">
                    <i class="icon-gears"></i>
                    <span>Administrar</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li<?=($segmento=='categorias')?" class='active'":""?>><a class="" href="/categorias/">Categorías</a></li>
                    <li<?=($segmento=='consultantes')?" class='active'":""?>><a class="" href="/consultantes/">Consultantes</a></li>
                    <li<?=($segmento=='especializaciones')?" class='active'":""?>><a class="" href="/especializaciones/">Especializaciones</a></li>
                      <li<?=($segmento=='profesionales')?" class='active'":""?>><a class="" href="/profesionales/">Profesionales</a></li>
                      <li<?=($segmento=='profesiones')?" class='active'":""?>><a class="" href="/profesiones/">Profesiones</a></li>
                  </ul>
              </li>
              <?php } ?>
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
