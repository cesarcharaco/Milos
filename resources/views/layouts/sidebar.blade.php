<!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ route('home') }}"><i class="menu-icon fa fa-laptop"></i>Tablero </a>
                    </li>
                    <li class="menu-title">UI elements</li><!-- /.menu-title -->
                    <li>
                        <a href="{{ route('choferes.index') }}"> <i class="menu-icon ti-user"></i>Conductores </a>
                    </li>

                    <li class="menu-title">Icons</li><!-- /.menu-title -->
                    <li>
                        <a href="{{ route('camiones.index') }}"> <i class="menu-icon ti-truck"></i>Camiones </a>
                    </li>
                    <li class="menu-title">Extras</li><!-- /.menu-title -->
                    <li>
                        <a href="{{ route('users.index') }}"> <i class="menu-icon ti-user"></i>Usuarios </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->