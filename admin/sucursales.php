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
    </head>

    <body>
        <?php include_once("template/header.php") ?>
        <section class="slice pt-5 margin-header bg-section-secondary" style="padding-bottom: 0rem;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 px-2">
                        <h2>Listado<h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-md-0 text-md-right">
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#AgregarDato">
                            Agregar
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="slice bg-section-secondary">
            <div class="container">
                <div class="row">
                    <div class="col-12 overflowX">
                        <table class="table" id="listado">
                            <thead class="expediente-encabezado-tabla">
                                <tr>
                                    <th scope="col" class="text-center">Id</th>
                                    <th scope="col" class="text-center">Nombre</th>
                                    <th scope="col" class="text-center">Editar</th>
                                    <th scope="col" class="text-center">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody class="expediente-cuerpo-tabla">
                                <tr>
                                    <td class="text-center">303330333</td>
                                    <th class="text-center" scope="row">Nombre colaborador</th>

                                    <td class="text-center">
                                        <a class="btn btn-dark btn-icon-only btn-sm" href="colaboradores-edit.php?id=1">
                                            <span class="btn-inner--icon">
                                                <i class="fas fa-pencil-alt"></i>
                                            </span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-icon-only btn-sm" data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="eliminar('0')">
                                            <span class="btn-inner--icon">
                                                <i class="far fa-trash-alt"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="text-center">303330333</td>
                                    <th class="text-center" scope="row">Nombre colaborador</th>

                                    <td class="text-center">
                                        <a class="btn btn-dark btn-icon-only btn-sm" href="colaboradores-edit.php?id=1">
                                            <span class="btn-inner--icon">
                                                <i class="fas fa-pencil-alt"></i>
                                            </span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-icon-only btn-sm" data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="eliminar('0')">
                                            <span class="btn-inner--icon">
                                                <i class="far fa-trash-alt"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>


        <!-- Modal -->
        <div class="modal fade" id="AgregarDato" tabindex="-1" role="dialog" aria-hidden="true">
            <form id="form_item" action="procedures/items.php" method="post">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="texto_Modal_metodo">Nuevo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* </span>Nombre</small>
                                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre">
                                </div>
                            </div>

                            <div class="col-md-6">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-dark">Guardar</button>
                        </div>
                    </div>
                    <input type="hidden" id="formaction_item" name="formaction" value="create_DB">
                    <input type="hidden" id="id_item_edit" name="id_item" value="">
                </div>
            </form>
        </div>

        <div class="modal fade" id="acciones_item" tabindex="-1" role="dialog" aria-hidden="true">
            <form id="form_item" action="procedures/items.php" method="post">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="texto_accion"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <p id="AI_Mensaje_confirmacion"></p>
                            </div>
    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-dark">Guardar</button>
                        </div>
                    </div>
                    <input type="hidden" id="formaction_item_accion" name="formaction" value="">
                    <input type="hidden" id="id_item_accion" name="id_item" value="">
                </div>
            </form>
        </div>

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