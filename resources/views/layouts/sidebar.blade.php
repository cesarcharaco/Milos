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