 <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['nombre_usu'];?></h5>
              	  	
                  <li class="mt">
                      <a class="active" href="administracion.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Principal</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Area Trabajadores</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="administrartrabajador.php">Habilitar Trabajador</a></li>
                          <li><a  href="listartrabajadores.php">Listar Trabajadores</a></li>
                          <li><a  href="estadisticas.php">Estadisticas Trabajadores</a></li>  
                          <li><a  href="registrartrabajador.php">Nuevo Trabajador</a></li>  
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Area Logistica</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="agregarproducto.php">Agregar Productos</a></li>
                          <li><a  href="listadoproductos.php">Listar Productos</a></li>
                          <li><a  href="agregarcamiones.php">Agregar Camiones</a></li>
                          <li><a  href="listadocamiones.php">Listar Camiones</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Area Marketing</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="agregaroferta.php">Agregar Oferta</a></li>
                          <li><a  href="listarofertas.php">Listar Oferta</a></li>
                          <li><a  href="agregarpromocion.php">Agregar Promocion</a></li>
                          <li><a  href="listarpromociones.php">Listar Promocion</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Area Solicitudes</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="listadosolicitudes.php">Solicitudes Activas</a></li>
                          <li><a  href="listadosolicitudesfin.php">Solicitudes Finalizadas</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Administracion del Sistema</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="admusuytrab.php">ADM. Usuarios/Trabajadores</a></li>
                          <li><a  href="responsive_table.html">Responsive Table</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->