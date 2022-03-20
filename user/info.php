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
    
	/** Verifica si esta logueado * /
        $eslogueado=$Quick_function->es_logueado();
		if($eslogueado!=true){ header('Location: ../'); }
	/** Verifica si esta logueado */

    /* Trae el listado de tipos identificacion */
        $TIPOS_IDENTIFICACION = array(
            array(
                "id" => "1",
                "num_hacienda" => "01",
                "nombre" => "Cédula Física"
            ),
            array(
                "id" => "2",
                "num_hacienda" => "02",
                "nombre" => "Cédula Jurídica"
            ),
            array(
                "id" => "3",
                "num_hacienda" => "03",
                "nombre" => "DIMEX"
            ),
            array(
                "id" => "4",
                "num_hacienda" => "04",
                "nombre" => "NITE"
            ),
        );
    /* Trae el listado de tipos identificacion */
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include_once("template/head.php") ?>
        <!-- Bootstrap date time picker -->
        <link rel="stylesheet" href="../assets/expediente/css/perfil.css" id="stylesheet">
    </head>

    <body>
        <?php include_once("template/header.php") ?>

        <section class="slice bg-section-secondary">
            <div class="container">
                <div class="row">
                    <div class="col-12 overflowX">
                        <div class="header pb-4 pt-lg-8 d-flex align-items-center" >
                            
                            <div class="row">
                                <div class="col-lg-12 px-2">
                                    <h2>Informaci&oacute;n General<h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-md-0 text-md-right"></div>
                            </div>
                        </div>
                            <!-- Page content -->
                        <div class="container-fluid mt--7">
                            <div class="row">
                                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                                    <div class="card card-profile shadow">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-3 order-lg-2">
                                                <div class="card-profile-image">
                                                    <a href="#">
                                                        <img src="../img/systemusers.png" class="rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                                            <div class="d-flex justify-content-between"></div>
                                        </div>

                                        <div class="card-body pt-0 pt-md-4">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <h3>
                                                    Jessica Jones<span class="font-weight-light">, 27</span>
                                                </h3>
                                                <div class="h5 font-weight-300">
                                                    <i class="ni location_pin mr-2"></i>Bucharest, Romania
                                                </div>
                                                <div class="h5 mt-4">
                                                    <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                                                </div>
                                                <div>
                                                    <i class="ni education_hat mr-2"></i>University of Computer Science
                                                </div>
                                                <hr class="my-4">
                                                <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 order-xl-1">
                                    <div class="card bg-secondary shadow">
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <div class="col-12">
                                                    <h3 class="mb-0">Informaci&oacute;n</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <h6 class="heading-small text-muted mb-4 text-dark">User information</h6>
                                                <div class="pl-lg-4">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-username">Username</label>
                                                                <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="lucky.jesse" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-control-label text-dark" for="input-email">Email address</label>
                                                                <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-first-name">First name</label>
                                                                <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="Lucky" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-last-name">Last name</label>
                                                                <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="Jesse" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="my-4">
                                                <!-- Address -->
                                                <h6 class="heading-small text-muted mb-4 text-dark">Contact information</h6>
                                                <div class="pl-lg-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-address">Address</label>
                                                                <input disabled id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-city">City</label>
                                                                <input disabled type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="New York">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-country">Country</label>
                                                                <input disabled type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United States">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label class="form-control-label text-dark" for="input-country">Postal code</label>
                                                                <input disabled type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="my-4">
                                                <!-- Description -->
                                                <h6 class="heading-small text-muted mb-4 text-dark">About me</h6>
                                                <div class="pl-lg-4">
                                                    <div class="form-group focused text-dark">
                                                        <label>About Me</label>
                                                        <textarea disabled rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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

        
        <script type="text/javascript">
            function establecer_agregar() {
                $("#formTercero")             .trigger("reset")
                $("#formaction_tercero")    .val("create_DB")
                $("#id_item_edit")          .val("")
                $("#texto_Modal_metodo")    .html("Nuevo item")
                refrescar_selectpicker()
            }
            
            function establecer_editar(informacion) {
                informacion = JSON.parse(informacion)
                $("#formTercero").trigger("reset")
                $("#formaction_tercero").val("edit_DB")
                
                $("#texto_Modal_metodo")    .html(`Modificar ${informacion.nombre}`)
                $("#id_tercero_edit")       .val(informacion.id)

                $("#tipo_identificacion")   .val(informacion.tipo_identificacion)
                $("#identificacion")        .val(informacion.identificacion)
                $("#nombre")                .val(informacion.nombre)
                $("#apellido")              .val(informacion.apellido)
                $("#correo")                .val(informacion.correo)
                $("#telefono")              .val(informacion.telefono)
                $("#direccion")             .val(informacion.direccion)
                $("#clasificacion")         .val(informacion.clasificacion)

                refrescar_selectpicker()
            }

            function activarInactivar(informacion) {
                informacion = JSON.parse(informacion)
                $("#texto_accion").html('Activar / Inactivar item')
                $("#formaction_tercero_accion").val('activate_DB')
                $("#id_tercero_accion").val(informacion.id)

                mensaje = (informacion.activo == 1)? `
                    Desea inactivar el cliente ${informacion.nombre}
                `: `
                    Desea activar el cliente ${informacion.nombre}
                `;
                
                $('#AI_Mensaje_confirmacion').html(mensaje)

                $('#acciones_tercero').modal('show')
            }

            function eliminar(informacion) {
                informacion = JSON.parse(informacion)
                $("#formaction_tercero_accion").val('deleted_DB')
                $("#id_tercero_accion").val(informacion.id)

                mensaje = (informacion.borrado == 1)? `
                    Desea recuperar el cliente ${informacion.nombre}
                `: `
                    Desea borrar el cliente ${informacion.nombre}
                `;

                texto = (informacion.borrado == 1)? `
                    Recuperar cliente
                `: `
                    Borrar el cliente
                `;
                
                $("#texto_accion").html(texto)
                $('#AI_Mensaje_confirmacion').html(mensaje)

                $('#acciones_tercero').modal('show')
            }

            function mostrar_informacion(informacion) {
                informacion = JSON.parse(informacion)
                $('#info_tipo_identificacion')  .html(informacion.tipo_identificacion)
                $('#info_identificacion')       .html(informacion.identificacion)
                $('#info_nombre')               .html(informacion.nombre)
                $('#info_correo')               .html(informacion.correo)
                $('#info_telefono')             .html(informacion.telefono)
                $('#info_direccion')            .html(informacion.direccion)
                $('#info_clasificacion')        .html(informacion.clasificacion)
                $('#info_estado')               .html(informacion.estado)
            }

            $(document).ready(function () {
                crear_dataTable("listado")
            })
        </script>
    </body>

</html>