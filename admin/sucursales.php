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
                        <h2>Listado de sucursales<h2>
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
                                    <th scope="col" class="text-center">Dirección</th>
                                    <th scope="col" class="text-center">Correo</th>
                                    <th scope="col" class="text-center">Teléfono</th>
                                    <th scope="col" class="text-center">Teléfono 2</th>
                                    <th scope="col" class="text-center">Horario apertura</th>
                                    <th scope="col" class="text-center">Horario cierre</th>
                                    <th scope="col" class="text-center">Días atención</th>
                                    <th scope="col" class="text-center">Activo</th>
                                    <th scope="col" class="text-center">Editar</th>
                                    <th scope="col" class="text-center">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody class="expediente-cuerpo-tabla">
                                <?php
                                    $select = "SELECT * FROM ".TBL_SUCURSALES;
                                    $listado_items= $Quick_function->SQLDatos_SA($select);
                                    while ($row = $listado_items->fetch()) {
                                        $id = $row["id"];
                                        $nombre              = $row["nombre"];
                                        $direccion           = $row["direccion"];
                                        $correo              = $row["correo"];
                                        $telefono            = $row["telefono"];
                                        $telefono2           = $row["telefono2"];
                                        $horario_apertura    = date("h:m", strtotime($row["horario_apertura"]));
                                        $horario_cierre      = date("h:m", strtotime($row["horario_cierre"]));
                                        $dias_atencion       = $row["dias_atencion"];
                                        $activo              = ($row["activo"])? "Activo" : "Bloqueado";

                                        $informacion = htmlentities(json_encode($row));

                                        $botonEditar = '
                                            <button type="button" class="btn btn-dark btn-icon-only btn-sm" data-toggle="modal" data-target="#AgregarDato" onclick="establecer_editar(\''.$informacion.'\')">
                                                <span class="btn-inner--icon">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </span>
                                            </button>
                                        ';

                                        $botonEliminar = '
                                            <button type="button" class="btn btn-danger btn-icon-only btn-sm" data-toggle="tooltip" data-placement="bottom" title="Bloquear" onclick="eliminar(\''.$informacion.'\')">
                                                <span class="btn-inner--icon">
                                                    <i class="fas fa-ban"></i>
                                                </span>
                                            </button>
                                        ';

                                        echo "
                                            <tr>
                                                <td class='text-center'>$id</td>
                                                <td class='text-center'>$nombre</td>
                                                <td class='text-center'>$direccion</td>
                                                <td class='text-center'>$correo</td>
                                                <td class='text-center'>$telefono</td>
                                                <td class='text-center'>$telefono2</td>
                                                <td class='text-center'>$horario_apertura</td>
                                                <td class='text-center'>$horario_cierre</td>
                                                <td class='text-center'>$dias_atencion</td>
                                                <td class='text-center'>$activo</td>
                                                <td class='text-center'>$botonEditar</td>
                                                <td class='text-center'>$botonEliminar</td>
                                            </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="acciones_sucursal" tabindex="-1" role="dialog" aria-hidden="true">
            <form id="form_item" action="procedures/sucursales.php" method="post">
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
                            <button type="submit" id="btn_accion" class="btn btn-dark">Guardar</button>
                        </div>
                    </div>
                    <input type="hidden" id="formaction_sucursal_accion" name="formaction" value="">
                    <input type="hidden" id="id_sucursal_accion" name="id_sucursal" value="">
                </div>
            </form>
        </div>
        
        <div class="modal fade" id="AgregarDato" tabindex="-1" role="dialog" aria-hidden="true">
            <form id="form_sucursal" action="procedures/sucursales.php" method="post">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="texto_Modal_metodo">Nuevo sucursal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* </span>Nombre</small>
                                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="campo_nombre">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* </span>Dirección</small>
                                    <input type="text" class="form-control" placeholder="Dirección" name="direccion" id="campo_direccion">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* </span>Correo</small>
                                    <input type="text" class="form-control" placeholder="Correo" name="correo" id="campo_correo">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* </span>Teléfono</small>
                                    <input type="text" class="form-control" placeholder="Teléfono" name="telefono" id="campo_telefono">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* </span>Teléfono 2</small>
                                    <input type="text" class="form-control" placeholder="Teléfono 2" name="telefono2" id="campo_telefono2">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* </span>Horario apertura</small>
                                    <input type="text" class="form-control" placeholder="Horario apertura" name="horario_apertura" id="campo_horario_apertura">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* </span>Horario cierre</small>
                                    <input type="text" class="form-control" placeholder="Horario cierre" name="horario_cierre" id="campo_horario_cierre">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* </span>Días atención</small>
                                    <input type="text" class="form-control" placeholder="Días atención" name="dias_atencion" id="campo_dias_atencion">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-dark">Guardar</button>
                        </div>
                    </div>
                    <input type="hidden" id="formaction_sucursal" name="formaction" value="create_DB">
                    <input type="hidden" id="id_sucursal" name="id_sucursal" value="">
                </div>
            </form>
        </div>

        <?php include_once("template/libs.php") ?>
        <?php include_once("template/footer.php") ?>

        
        <script type="text/javascript">
            function establecer_agregar() {
                $("#form_sucursal")      .trigger("reset")
                $("#formaction_sucursal").val("create_DB")
                $("#id_sucursal")                .val("")
                $("#texto_Modal_metodo")     .html("Nuevo sucursal")
            }

            function establecer_editar(informacion) {
                informacion = JSON.parse(informacion)
                $("#form_sucursal").trigger("reset")
                $("#formaction_sucursal").val("edit_DB")

                $("#texto_Modal_metodo").html(`Modificar sucursal`)
                $("#id_sucursal")           .val(informacion.id)

                $("#nombre_sucursal").val(informacion.nombre)
            }

            function eliminar(informacion) {
                informacion = JSON.parse(informacion)
                $("#formaction_sucursal_accion").val('block_DB')
                $("#id_sucursal_accion").val(informacion.id)

                mensaje = `
                    Desea bloquear '<b>${informacion.nombre}</b>'
                `;

                texto = `
                    Bloquear
                `;
                
                $("#texto_accion").html(texto)
                $("#btn_accion").html(texto)
                $('#AI_Mensaje_confirmacion').html(mensaje)

                $('#acciones_sucursal').modal('show')
            }

            $(document).ready(function () {
                crear_dataTable("listado")
            })
        </script>
    </body>

</html>