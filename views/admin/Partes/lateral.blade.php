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
      <!-- search form
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
       /.search form -->
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
              <a href="/usuarios/lista"><i class="fa fa-circle-o"></i>Usuarios</a></li>   
            @endif
             @if( $active==1 and $subm == 3 and $subm2 == 0)  
                <li class="active">
              @else
                <li>
              @endif    
            <a href="/perfil"><i class="fa fa-circle-o"></i> Perfil</a></li>
          </ul>
        </li>
          @if( $active == 2)  
            <li class="treeview active">
          @else
            <li class="treeview">  
          @endif
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Empleados</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
              <ul class="treeview-menu">  
                @if(Auth::user()->RECHUM == "S")
                <li>  <a href="/empleados/lista"><i class="fa fa-circle-o"></i>Lista Empleados</a>  </li>
                @endif
                <li>  <a href="/empleados/personal"><i class="fa fa-circle-o"></i>Datos Personales</a>  </li>
                @if(Auth::user()->RECHUM == "S")
                <li>  <a href="/empleados/create"><i class="fa fa-circle-o"></i>Crear nuevo    </a>  </li>
                @endif
              </ul>        
        </li>      
        @if(Auth::user()->RECHUM == "S" or Auth::user()->PASAJES == "S")
          @if( $active == 3)  
              <li class="treeview active">
            @else
              <li class="treeview">  
            @endif
            <a href="#">
              <i class="fa fa-folder"></i> <span>Catálogo</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/maos/show"><i class="fa fa-circle-o"></i> MAOS</a></li>
              @if(Auth::user()->PASAJES == "S")
                <li><a href="/clues/show"><i class="fa fa-circle-o"></i> CLUES</a></li>
                <li><a href="/estados/show"><i class="fa fa-circle-o"></i> Estados</a></li>
                <li><a href="/municipios/show"><i class="fa fa-circle-o"></i> Municipios</a></li>
                <li><a href="/tarifas/show"><i class="fa fa-circle-o"></i> Tarifas</a></li>
              @endif
            </ul>
          </li>
        @endif
        @if(Auth::user()->PASAJES == "S")
          @if( $active == 4)  
              <li class="treeview active">
            @else
              <li class="treeview">  
            @endif
            <a href="#">
              <i class="fa fa-folder"></i> <span>Comisiones</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/comision"><i class="fa fa-circle-o"></i> Acuerdo</a></li>
              <li><a href="/comision/solicitud"><i class="fa fa-circle-o"></i> Solicitud</a></li>
              <li><a href="/comision/solicitud"><i class="fa fa-circle-o"></i> Comprobaciones</a></li>
            </ul>
          </li>
        @endif        
        <li class="treeview {$activo}">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Expediente</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/empleados/expediente"><i class="fa fa-circle-o"></i> Personal</a></li>
            <li><a href="/empleados/comprobantes"><i class="fa fa-circle-o"></i> Comprobantes</a></li>
          </ul>
        </li>
        <li class="header">ACCIONES</li>
        <li><a href="/logout"><i class="fa fa-circle-o text-red"></i> <span>Salir</span></a></li>
      </ul>
    </section>