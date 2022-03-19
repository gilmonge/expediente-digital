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
    
	/*** Verifica si esta logueado * /
        $eslogueado=$Quick_function->es_logueado();
		if($eslogueado!=true){ header('Location: ../'); }
	/** Verifica si esta logueado ***/

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
                                                    Nombre Apellido<span class="font-weight-light">, 27</span>
                                                </h3>
                                                <div class="h5 font-weight-300">
                                                    <i class="ni location_pin mr-2"></i>Puesto Colaborador
                                                </div>                                
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
                                                <h6 class="heading-small text-muted mb-4 text-dark">Informaci&oacute;n de ingreso:</h6>
                                                <div class="pl-lg-4">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-username">Usuario</label>
                                                                <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Usuario" value="nombreapellido@carnescastillo.com" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-control-label text-dark" for="input-email">Correo electr&oacute;nico</label>
                                                                <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="nombreapellido@carnescastillo.com" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
    

                                                </div>
                                                <hr class="my-4">

                                                <h6 class="heading-small text-muted mb-4 text-dark">Informaci&oacute;n General</h6>
                                                <div class="pl-lg-4">

                                                <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-first-name">Nombre:</label>
                                                                <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="Nombre" value="Nombre" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-last-name">Apellido</label>
                                                                <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Apellido" value="Apellido" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-sexo">Genero:</label>
                                                                <input type="text" id="input-sexo" class="form-control form-control-alternative" placeholder="" value="Masculino" disabled>
                                                            </div>
                                                        </div>
                                                      
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-first-name">Fecha Nacimiento:</label>
                                                                <input type="text" id="input-fecha_nacimiento" class="form-control form-control-alternative" placeholder="22-2-1990" value="22-2-1990" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-last-name">Identificación:</label>
                                                                <input type="text" id="input-cedula" class="form-control form-control-alternative" placeholder="11111111" value="11111111" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-first-name">Licencia Conduccion:</label>
                                                                <input type="text" id="input-licencia_conduccion" class="form-control form-control-alternative" placeholder="Si/No" value="Si" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-last-name">Tipo Licencia:</label>
                                                                <input type="text" id="input-tipo_licencia" class="form-control form-control-alternative" placeholder="" value="B1" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-last-name">Teléfono:</label>
                                                                <input type="text" id="input-telefono" class="form-control form-control-alternative" placeholder="" value="8888-8888" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-first-name">Correo electrónico:</label>
                                                                <input type="text" id="input-correo" class="form-control form-control-alternative" placeholder="" value="nombre@gmail.com" disabled>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-last-name">Estado Civil:</label>
                                                                <input type="text" id="input-estado_civil" class="form-control form-control-alternative" placeholder="" value="Soltero" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-first-name">Cantidad de hijos:</label>
                                                                <input type="text" id="input-hijos" class="form-control form-control-alternative" placeholder="" value="0" disabled>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-address">Residencia</label>
                                                                <input disabled id="input-residencia" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
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
                                                <h6 class="heading-small text-muted mb-4 text-dark">Información Laboral</h6>
                                                <div class="pl-lg-4">

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-last-name">Fecha Contratación:</label>
                                                                <input type="text" id="input-fecha_contratacion" class="form-control form-control-alternative" placeholder="" value="01-01-2022" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-first-name">Salario:</label>
                                                                <input type="text" id="input-salario_actual" class="form-control form-control-alternative" placeholder="" value="$1000" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-last-name">Puesto:</label>
                                                                <input type="text" id="input-id_puesto" class="form-control form-control-alternative" placeholder="" value="Carnicero" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-id_sucursal">Sucursal:</label>
                                                                <input type="text" id="input-id_sucursal" class="form-control form-control-alternative" placeholder="" value="San José" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-id_talla_uniforme">Talla de Uniforme:</label>
                                                                <input type="text" id="input-id_talla_uniforme" class="form-control form-control-alternative" placeholder="" value="M" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-last-name">Banco:</label>
                                                                <input type="text" id="input-banco" class="form-control form-control-alternative" placeholder="" value="BAC" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-cuenta_iban">Cuenta IBAN:</label>
                                                                <input type="text" id="input-cuenta_iban" class="form-control form-control-alternative" placeholder="" value="CR0017765437998" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-cuenta_cliente">Cuenta Cliente:</label>
                                                                <input type="text" id="input-cuenta_cliente" class="form-control form-control-alternative" placeholder="" value="0972569982175" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-numero_sinpe">Numero SINPE:</label>
                                                                <input type="text" id="input-numero_sinpe" class="form-control form-control-alternative" placeholder="" value="8888-8888" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group focused">
                                                                <label class="form-control-label text-dark" for="input-id_grado_academico">Grado Academico:</label>
                                                                <input type="text" id="input-id_grado_academico" class="form-control form-control-alternative" placeholder="" value="Técnico" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--div class="form-group focused text-dark">
                                                        <label>About Me</label>
                                                        <textarea disabled rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                                                    </div-->
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