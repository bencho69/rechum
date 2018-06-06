    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administración de Recursos H.</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU PRINCIPAL</li>
          @if( $active == 1)  
            <li class="treeview active">
          @else
            <li class="treeview">  
          @endif
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Administración</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if(Auth::user()->tipo == "ADMIN")
            @if( $active==1 and $subm == 1 and $subm2 == 0)  
            <li class="active">
            @else
            <li>
            @endif
            <a href="/users"><i class="fa fa-circle-o"></i>Usuarios</a></li>
            @endif
            @if( $active==1 and $subm == 2 and $subm2 == 0)  
            <li class="active">
            @else
            <li>
            @endif
            <a href="/users/perfil"><i class="fa fa-circle-o"></i> Perfil</a></li>
          </ul>
        </li>
          @if( $active == 2)  
            <li class="treeview active">
          @else
            <li class="treeview">  
          @endif
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Catálogos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
          @if(Auth::user()->tipo == "ADMIN")
          @if( $active == 2 and $subm == 1)  
            <li class="treeview active">
          @else
            <li class="treeview">  
          @endif

              <a href="#"><i class="fa fa-circle-o"></i>Años
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </ span>
              </a>
              <ul class="treeview-menu">

                @if( $active==2 and $subm == 1 and $subm2 == 1)  
                <li class="active">
                @else
                <li>  
                @endif
                  <a href="/annos/index"><i class="fa fa-circle-o"></i>Lista de años</a>
                </li>
                @if( $active==2 and $subm == 1 and $subm2 == 2)  
                <li class="active">
                @else
                <li>  
                @endif
                  <a href="/annos/create"><i class="fa fa-circle-o"></i>Crear nuevo año            
                  </a>
                </li>
              </ul>
            </li>
            @endif
            @if(Auth::user()->tipo == "ADMIN")
            @if( $active==2 and $subm == 3 )  
            <li class="treeview active">
            @else
            <li class="treeview">  
            @endif
              <a href="#"><i class="fa fa-circle-o"></i>Estados
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                @if( $active==2 and $subm == 3 and $subm2 == 1)  
                <li class="active">
                @else
                <li>  
                @endif
                  <a href="/estados"><i class="fa fa-circle-o"></i>Lista de Estados</a>
                </li>
                @if( $active==2 and $subm == 3 and $subm2 == 2)  
                <li class="active">
                @else
                <li>  
                @endif
                  <a href="/estados/create"><i class="fa fa-circle-o"></i>Crear Estado
                  </a>
                </li>
              </ul>
            </li>
            @endif
            @if(Auth::user()->tipo == "ADMIN")
            @if( $active==2 and $subm == 2)  
              <li class="treeview active">
            @else
              <li class="treeview">  
            @endif
              <a href="#"><i class="fa fa-circle-o"></i>Municipios
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                @if( $active==2 and $subm == 2 and $subm2 == 1)  
                <li class="active">
                @else
                <li>  
                @endif
                <a href="/mpos"><i class="fa fa-circle-o"></i>Lista de Municipios</a></li>
                @if( $active==2 and $subm == 2 and$subm2 == 2)  
                <li class="active">
                @else
                <li>  
                @endif
                  <a href="/mpos/create"><i class="fa fa-circle-o"></i>Crear Municipio
                  </a>
                </li>
              </ul>
            </li>      
            @endif     
          </ul>
          
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li class="treeview {$activo}">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Peticiones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li class="active"><a href="blank.html"><i class="fa fa-circle-o"></i> Actuales</a></li>
            <li><a href="pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li class="header">ACCIONES</li>
        <li><a href="logout"><i class="fa fa-circle-o text-red"></i> <span>Salir</span></a></li>
      </ul>
    </section>