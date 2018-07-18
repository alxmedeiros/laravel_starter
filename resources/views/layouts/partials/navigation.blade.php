<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-expand-md" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
                data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
            {{--<img class="navbar-brand-logo" src="/images/admin/logo.png" title="Remark">--}}
            <span class="navbar-brand-text hidden-xs-down"> Konjac</span>
        </div>
    </div>
    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <ul class="nav navbar-toolbar">
                <li class="nav-item hidden-float" id="toggleMenubar">
                    <a class="nav-link" data-toggle="menubar" href="#" role="button">
                        <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
            </ul>
            <!-- End Navbar Toolbar -->
            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sair
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
            <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
    </div>
</nav>

<div class="site-menubar site-menubar-light">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu" data-plugin="menu">
                    <li class="site-menu-item">
                        <a href="{{ route('customer.home') }}">
                            <i class="site-menu-icon fa-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Início</span>
                        </a>
                    </li>

                    <li class="site-menu-item">
                        <a href="{{ route('customer.edit') }}">
                            <i class="site-menu-icon fa-user" aria-hidden="true"></i>
                            <span class="site-menu-title">Meus dados</span>
                        </a>
                    </li>

                    <li class="site-menu-item">
                        <a href="{{ route('customer.address') }}">
                            <i class="site-menu-icon fa-map-marker" aria-hidden="true"></i>
                            <span class="site-menu-title">Endereços</span>
                        </a>
                    </li>

                    <li class="site-menu-item">
                        <a href="{{ route('customer.orders') }}">
                            <i class="site-menu-icon fa-list" aria-hidden="true"></i>
                            <span class="site-menu-title">Pedidos</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>