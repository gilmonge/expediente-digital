<?php
	/**************************************************
		Sistema de expediente digital
		Desarrollador: Equipo UAM
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
                        <h2>Generación de reportes<h2>                      
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
                                <a href="#" class="d-block h5 mt-3">Reportes de empleados</a>
                                <div class="row align-items-center mt-4">
                                    <div class="col-12">
                                        <a href="procedures/reporte-emp.php" class="btn btn-sm btn-block btn-primary btn-primary-dashboard" target="_blank">Generar reporte todos colaboradores</a><br>
                                        <button type="button" class="btn btn-sm btn-block btn-primary btn-primary-dashboard" data-toggle="modal" data-target="#GenerarReporte" onclick="establecer_agregar()">Generar reporte por colaborador</button><br>
                                        <a href="procedures/reporte-cursos.php" class="btn btn-sm btn-block btn-primary btn-primary-dashboard" target="_blank">Generar reporte cursos actuales</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

       

    


        <div class="modal fade" id="GenerarReporte" tabindex="-1" role="dialog" aria-hidden="true">
            <form id="form_departamento" action="procedures/reporte-emp-colab.php" method="GET">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="texto_Modal_metodo">Ingrese la identificación del colaborador</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    
                                    <small  class="form-text text-dark"><span class="asteriscos">* </span>Cédula</small>
                                    <input type="text" class="form-control" placeholder="Cédula" name="cedula_empl" id="cedula" required>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <input type="submit" class="btn btn-dark" value="Generar reporte"/>                           
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <?php include_once("template/libs.php") ?>
        <?php include_once("template/footer.php") ?>

    </body>

</html>