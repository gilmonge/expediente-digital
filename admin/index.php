<?php
	/**************************************************
		Sistema de administracion
		Desarrollador: Gilberth Monge
		Año de creación: 2020
		Última modificación del archivo: 21-04-2020
	**************************************************/
	/** Inicializaciones */
		@session_start();
		include_once('../core/variables_globales.php');
		include_once('../core/quick_function.php');
		$Quick_function = new Quick_function;
    /** Inicializaciones */
    
	/** Verifica si esta logueado */
        $eslogueado=$Quick_function->es_logueado();
		if($eslogueado!=true){ header('Location: ../'); }
	/** Verifica si esta logueado */
    
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include_once("template/head.php") ?>
    </head>

    <body>
        <?php include_once("template/header.php") ?>

        <section class="slice pt-5 margin-header bg-section-secondary" style="padding-bottom: 0rem;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 px-2">
                        <h2>Bienvenido usuario<h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="slice bg-section-secondary">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 px-2">
                        <div class="card">
                            <div class="card-body">
                                <a href="#" class="d-block h5 mt-3">Colaboradores</a>
                                <div class="row align-items-center mt-4">
                                    <div class="col-12">
                                        <a href="colaboradores.php" class="btn btn-sm btn-block btn-primary btn-primary-dashboard">Ir al módulo</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 px-2">
                        <div class="card">
                            <div class="card-body">
                                <a href="#" class="d-block h5 mt-3">Reportes</a>
                                <div class="row align-items-center mt-4">
                                    <div class="col-12">
                                        <a href="clientes.php" class="btn btn-sm btn-block btn-primary btn-primary-dashboard">Ir al módulo</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 px-2">
                        <div class="card">
                            <div class="card-body">
                                <a href="#" class="d-block h5 mt-3">Mantenimientos</a>
                                <div class="row align-items-center mt-4">
                                    <div class="col-12">
                                        <a href="mantenimientos.php" class="btn btn-sm btn-block btn-primary btn-primary-dashboard">Ir al módulo</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php include_once("template/libs.php") ?>
        <?php include_once("template/footer.php") ?>
    </body>

</html>