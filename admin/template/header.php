<?php
	/**************************************************
		Sistema de administracion
		Desarrollador: Gilberth Monge
		Año de creación: 2020
		Última modificación del archivo: 21-04-2020
	**************************************************/
    /* Header / menu general para el sistema */
?>
        <header class=" fixed-top" id="header-main">
            <nav class="navbar navbar-main navbar-expand-lg navbar-dark bg-dark" id="navbar-main">
                <div class="container">
                    <a class="navbar-brand" href="index.php"> 
                        <img alt="Sistema administración" title="Sistema administración" class="rexy-logo" src="../img/logo-blanco.png" id="navbar-logo"> 
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse navbar-collapse-overlay" id="navbar-main-collapse">
                        <div class="position-relative">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item nav-item-spaced dropdown dropdown-animate" data-toggle="hover"><a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</a>
                                <div class="dropdown-menu dropdown-menu-md p-0">
                                    <div class="list-group list-group-flush px-lg-4">
                                        <a type="submit" class="list-group-item list-group-item-action" role="button" href="colaboradores.php">
                                            <div class="d-flex">
                                                <span class="h6">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </span>
                                                <div class="ml-3">
                                                    <h6 class="heading mb-0">Colaboradores</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="list-group list-group-flush px-lg-4">
                                        <a type="submit" class="list-group-item list-group-item-action" role="button" href="#">
                                            <div class="d-flex">
                                                <span class="h6">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </span>
                                                <div class="ml-3">
                                                    <h6 class="heading mb-0">Informes</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="list-group list-group-flush px-lg-4">
                                        <a type="submit" class="list-group-item list-group-item-action" role="button" href="mantenimientos.php">
                                            <div class="d-flex">
                                                <span class="h6">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </span>
                                                <div class="ml-3">
                                                    <h6 class="heading mb-0">Mantenimientos</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item nav-item-spaced dropdown dropdown-animate" data-toggle="hover"><a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Perfil</a>
                                <div class="dropdown-menu dropdown-menu-md p-0">
                                    <div class="list-group list-group-flush px-lg-4">
                                        <form action="../core/nologin-kernel.php" method="get">
                                            <button type="submit" class="list-group-item list-group-item-action" role="button">
                                                <div class="d-flex">
                                                    <span class="h6">
                                                        <i class="fas fa-door-open"></i>
                                                    </span>
                                                    <div class="ml-3">
                                                        <h6 class="heading mb-0">Cerrar sesión</h6>
                                                    </div>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <!--li class="nav-item nav-item-spaced dropdown dropdown-animate" data-toggle="hover"><a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
                                <div class="dropdown-menu dropdown-menu-md p-0">
                                    <div class="list-group list-group-flush px-lg-4">
                                        <a href="../../docs/index.html" class="list-group-item list-group-item-action" role="button">
                                            <div class="d-flex">
                                                <span class="h6">
                                                    <i class="fas fa-code"></i>
                                                </span>
                                                <div class="ml-3">
                                                    <h6 class="heading mb-0">Documentation</h6><small class="text-sm">Quick setup and build tools</small>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="py-3">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a href="../../docs/getting-started/quick-start.html" class="dropdown-item">Quick Start</a> 
                                                </div>
                                                <div class="col-sm-6">
                                                    <a href="../../docs/getting-started/build-tools.html" class="dropdown-item">Build Tools</a> 
                                                </div>
                                                <div class="col-sm-6">
                                                    <a href="../../docs/getting-started/customization.html" class="dropdown-item">Customization</a>
                                                </div>
                                                <div class="col-sm-6"> 
                                                    <a href="../../docs/getting-started/file-structure.html" class="dropdown-item">File Structure</a> 
                                                </div>
                                                <div class="col-sm-6">
                                                    <a href="../../docs/components/alerts.html" class="dropdown-item">Components</a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a href="../../docs/styleguide/icons.html" class="dropdown-item">Icons</a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a href="../../docs/styleguide/svg-icons.html" class="dropdown-item">SVG Icons</a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a href="../../docs/styleguide/illustrations.html" class="dropdown-item">Illustrations</a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a href="../../docs/plugins/animate.html" class="dropdown-item">Plugins</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush px-lg-4">
                                        <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                                            <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <div class="media d-flex">
                                                    <figure style="width:20px">
                                                        <i class="far fa-clipboard"></i>
                                                    </figure>
                                                    <div class="media-body ml-2">
                                                        <h6 class="heading mb-0">Boards</h6>
                                                        <p class="mb-0">Account management made cool.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="../../pages/boards/overview.html">Overview </a>
                                                <a class="dropdown-item" href="../../pages/boards/projects.html">Projects </a>
                                                <a class="dropdown-item" href="../../pages/boards/tasks.html">Tasks </a>
                                                <a class="dropdown-item" href="../../pages/boards/integrations.html">Integrations</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li-->
                            
                        </ul>
                        <ul class="navbar-nav align-items-lg-center d-none d-lg-flex ml-lg-auto"></ul>
                    </div>
                </div>
            </nav>
        </header>