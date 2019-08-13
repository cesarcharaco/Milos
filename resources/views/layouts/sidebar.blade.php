<!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ route('home') }}"><i class="menu-icon fa fa-laptop"></i>Menú </a>
                    </li>
                    <li class="menu-title">Conductores</li><!-- /.menu-title -->
                    <li>
                        <a href="{{ route('choferes.index') }}"> <i class="menu-icon ti-user"></i>Registros </a>
                    </li>

                    <li class="menu-title">Camiones</li><!-- /.menu-title -->
                    <li>
                        <a href="{{ route('camiones.index') }}"> <i class="menu-icon ti-truck"></i>Registros </a>
                    </li>
                    <li>
                        <a href="{{ route('despachos.index') }}"> <i class="menu-icon ti-shift-right"></i>Despachos de Camiones </a>
                    </li>
                    <li>
                        <a href="{{ route('recepciones.index') }}"> <i class="menu-icon ti-shift-left"></i>Llegada de Camiones </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart-o"></i>Reportes</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="#">Despachos y Recepciones</a></li>
                            <li><i class="fa fa-table"></i><a href="#">Estadísticas Generales</a></li>
                        </ul>
                    </li>
                    @if(\Auth::getUser()->user_type=="Admin")
                    <li class="menu-title">Configuraciones</li><!-- /.menu-title -->
                    <li>
                        <a href="{{ route('users.index') }}"> <i class="menu-icon ti-user"></i>Usuarios </a>
                    </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->