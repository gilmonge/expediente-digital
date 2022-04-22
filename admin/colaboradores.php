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
                        <h2>Listado de colaboradores<h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-md-0 text-md-right">
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#AgregarDato" onclick="establecer_agregar()">
                            Agregar Cliente
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
                                    <th scope="col" class="text-center">Identificación</th>
                                    <th scope="col" class="text-center">Nombre</th>
                                    <th scope="col" class="text-center">Correo</th>
                                    <th scope="col" class="text-center">Teléfono</th>
                                    <th scope="col" class="text-center">Salario actual</th>
                                    <th scope="col" class="text-center">Activo</th>
                                    <th scope="col" class="text-center">Información</th>
                                    <th scope="col" class="text-center">Editar</th>
                                    <th scope="col" class="text-center">Bloquear</th>
                                </tr>
                            </thead>
                            <tbody class="expediente-cuerpo-tabla">
                                <?php
                                    $select = "SELECT * FROM ".TBL_EMPLEADO;
                                    $listado_items= $Quick_function->SQLDatos_SA($select);
                                    while ($row = $listado_items->fetch()) {
                                        $id = $row["id"];
                                        $cedula = $row["cedula"];
                                        $nombre = $row["nombre"].' '.$row["apellido"];
                                        $correo = $row["correo"];
                                        $telefono = $row["telefono"];
                                        $salario_actual = $row["salario_actual"];
                                        $activo = ($row["activo"])? "Activo" : "Bloqueado";

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

                                        $btnInformacion = '
                                            <td class="text-center">
                                                <button type="button" class="btn btn-outline-dark btn-icon-only btn-sm" data-toggle="modal" data-target="#informacion_colaboradores" onclick="mostrar_informacion(\'0\')">
                                                    <span class="btn-inner--icon">
                                                        <i class="fas fa-info"></i>
                                                    </span>
                                                </button>
                                            </td>
                                        ';

                                        echo "
                                            <tr>
                                                <td class='text-center'>$cedula</td>
                                                <td class='text-center'>$nombre</td>
                                                <td class='text-center'>$correo</td>
                                                <td class='text-center'>$telefono</td>
                                                <td class='text-center'>$salario_actual</td>
                                                <td class='text-center'>$activo</td>
                                                $btnInformacion
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


        <!-- Modal -->
        <div class="modal fade" id="AgregarDato" tabindex="-1" role="dialog" aria-hidden="true">
            <form id="formcolaboradores" action="procedures/colaboradores.php" method="post">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="texto_Modal_metodo">Nuevo item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Cédula</span></small>
                                    <input type="text" class="form-control" placeholder="Cédula" name="cedula" id="cedula">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Nombre</span></small>
                                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Apellido</span></small>
                                    <input type="text" class="form-control" placeholder="Apellido" name="apellido" id="apellido">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Fecha nacimiento</span></small>
                                    <input type="text" class="form-control" placeholder="Fecha nacimiento" name="fecha_nacimiento" id="fecha_nacimiento">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Tipo de licencia</span></small>

                                    <select name="tipo_licencia" id="tipo_licencia" aria-required="">
                                        <option value='No tiene'>No tiene</option>
                                        <option value='A1'>A1</option>
                                        <option value='A2'>A2</option>
                                        <option value='A3'>A3</option>
                                        <option value='B1'>B1</option>
                                        <option value='B2'>B2</option>
                                        <option value='B3'>B3</option>
                                        <option value='B4'>B4</option>
                                        <option value='C1'>C1</option>
                                        <option value='C2'>C2</option>
                                        <option value='D1'>D1</option>
                                        <option value='D2'>D2</option>
                                        <option value='D3'>D3</option>
                                        <option value='E1'>E1</option>
                                        <option value='E2'>E2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Télefono</span></small>
                                    <input type="text" class="form-control" placeholder="Télefono" name="telefono" id="telefono">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Correo</span></small>
                                    <input type="text" class="form-control" placeholder="Correo" name="correo" id="correo">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Residencia</span></small>
                                    <input type="text" class="form-control" placeholder="Residencia" name="residencia" id="residencia">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Hijos</span></small>
                                    <input type="text" class="form-control" placeholder="Hijos" name="hijos" id="hijos">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Salario actual</span></small>
                                    <input type="text" class="form-control" placeholder="Salario actual" name="salario_actual" id="salario_actual">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Estado civil</span></small>
                                    <input type="text" class="form-control" placeholder="Estado civil" name="estado_civil" id="estado_civil">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Banco</span></small>
                                    <input type="text" class="form-control" placeholder="Banco" name="banco" id="banco">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Cuenta IBAN</span></small>
                                    <input type="text" class="form-control" placeholder="Cuenta IBAN" name="cuenta_iban" id="cuenta_iban">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Cuenta cliente</span></small>
                                    <input type="text" class="form-control" placeholder="Cuenta cliente" name="cuenta_cliente" id="cuenta_cliente">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Número SINPE</span></small>
                                    <input type="text" class="form-control" placeholder="Número SINPE" name="numero_sinpe" id="numero_sinpe">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Fecha contratación</span></small>
                                    <input type="text" class="form-control" placeholder="Fecha contratación" name="fecha_contratacion" id="fecha_contratacion">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Fecha ingreso</span></small>
                                    <input type="text" class="form-control" placeholder="Fecha ingreso" name="fecha_ingreso" id="fecha_ingreso">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Grado académico</span></small>

                                    <select name="id_grado_academico" id="id_grado_academico" aria-required="">
                                        <?php
                                            $select = "SELECT * FROM ".TBL_GRADO_ACADEMICO. " WHERE activo = 1" ;
                                            $listado_items= $Quick_function->SQLDatos_SA($select);
                                            while ($row = $listado_items->fetch()) {
                                                $id = $row["id"];
                                                $nombre = $row["nombre"];

                                                $informacion = htmlentities(json_encode($row));

                                                echo "
                                                    <option value='$id'>$nombre</option>
                                                ";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Puesto</span></small>

                                    <select name="id_puesto" id="id_puesto" aria-required="">
                                        <?php
                                            $select = "SELECT * FROM ".TBL_PUESTO." WHERE activo = 1";
                                            $listado_items= $Quick_function->SQLDatos_SA($select);
                                            while ($row = $listado_items->fetch()) {
                                                $id = $row["id"];
                                                $nombre = $row["nombre"];

                                                $informacion = htmlentities(json_encode($row));

                                                echo "
                                                    <option value='$id'>$nombre</option>
                                                ";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Sexo</span></small>

                                    <select name="id_sexo" id="id_sexo" aria-required="">
                                        <?php
                                            $select = "SELECT * FROM ".TBL_SEXO." WHERE activo = 1";
                                            $listado_items= $Quick_function->SQLDatos_SA($select);
                                            while ($row = $listado_items->fetch()) {
                                                $id = $row["id"];
                                                $descripcion = $row["descripcion"];

                                                $informacion = htmlentities(json_encode($row));

                                                echo "
                                                    <option value='$id'>$descripcion</option>
                                                ";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Sucursal</span></small>

                                    <select name="id_sucursal" id="id_sucursal" aria-required="">
                                        <?php
                                            $select = "SELECT * FROM ".TBL_SUCURSALES." WHERE activo = 1";
                                            $listado_items= $Quick_function->SQLDatos_SA($select);
                                            while ($row = $listado_items->fetch()) {
                                                $id = $row["id"];
                                                $nombre = $row["nombre"];

                                                $informacion = htmlentities(json_encode($row));

                                                echo "
                                                    <option value='$id'>$nombre</option>
                                                ";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-dark">Guardar</button>
                        </div>
                    </div>
                    <input type="hidden" id="formaction_colaboradores" name="formaction" value="create_DB">
                    <input type="hidden" id="id_colaboradores_edit" name="id_colaboradores" value="">
                    <input type="hidden" name="origen" value="2">
                </div>
            </form>
        </div>

        <div class="modal fade" id="acciones_colaboradores" tabindex="-1" role="dialog" aria-hidden="true">
            <form action="procedures/colaboradores.php" method="post">
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
                    <input type="hidden" id="formaction_colaboradores_accion" name="formaction" value="">
                    <input type="hidden" id="id_colaboradores_accion" name="id_colaboradores" value="">
                    <input type="hidden" name="origen" value="2">
                </div>
            </form>
        </div>
        
        <div class="modal fade" id="informacion_colaboradores" tabindex="-1" role="dialog" aria-hidden="true">
            <form id="form_cuenta" action="procedures/cuentas_contables.php" method="post">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="texto_accion">Información del cliente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="expediente-letra-estandar">Tipo identificación:</th>
                                            <td><span id="info_tipo_identificacion" class="badge badge-light expediente-letra-estandar"></span></td>

                                            <th scope="row" class="expediente-letra-estandar">Teléfono:</th>
                                            <td><span id="info_telefono" class="badge badge-light expediente-letra-estandar"></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="expediente-letra-estandar">Identificación:</th>
                                            <td><span id="info_identificacion" class="badge badge-light expediente-letra-estandar"></span></td>

                                            <th scope="row" class="expediente-letra-estandar">Dirección:</th>
                                            <td><span id="info_direccion" class="badge badge-light expediente-letra-estandar"></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="expediente-letra-estandar">Nombre:</th>
                                            <td><span id="info_nombre" class="badge badge-light expediente-letra-estandar"></span></td>

                                            <th scope="row" class="expediente-letra-estandar">Clasificación:</th>
                                            <td><span id="info_clasificacion" class="badge badge-light expediente-letra-estandar"></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="expediente-letra-estandar">Correo:</th>
                                            <td><span id="info_correo" class="badge badge-light expediente-letra-estandar"></span></td>

                                            <th scope="row" class="expediente-letra-estandar">Estado:</th>
                                            <td><span id="info_estado" class="badge badge-light expediente-letra-estandar"></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <?php include_once("template/libs.php") ?>
        <?php include_once("template/footer.php") ?>

        
        <script type="text/javascript">
            function establecer_agregar() {
                $("#formcolaboradores")             .trigger("reset")
                $("#formaction_colaboradores")    .val("create_DB")
                $("#id_item_edit")          .val("")
                $("#texto_Modal_metodo")    .html("Nuevo item")
                refrescar_selectpicker()
            }
            
            function establecer_editar(informacion) {
                informacion = JSON.parse(informacion)
                $("#formcolaboradores").trigger("reset")
                $("#formaction_colaboradores").val("edit_DB")
                
                $("#texto_Modal_metodo")    .html(`Modificar ${informacion.nombre}`)
                $("#id_colaboradores_edit")       .val(informacion.id)

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
                $("#formaction_colaboradores_accion").val('activate_DB')
                $("#id_colaboradores_accion").val(informacion.id)

                mensaje = (informacion.activo == 1)? `
                    Desea inactivar el cliente ${informacion.nombre}
                `: `
                    Desea activar el cliente ${informacion.nombre}
                `;
                
                $('#AI_Mensaje_confirmacion').html(mensaje)

                $('#acciones_colaboradores').modal('show')
            }

            function eliminar(informacion) {
                informacion = JSON.parse(informacion)
                $("#formaction_colaboradores_accion").val('block_DB')
                $("#id_colaboradores_accion").val(informacion.id)

                mensaje = `
                    Desea bloquear '<b>${informacion.nombre}</b>'
                `;

                texto = `
                    Bloquear
                `;
                
                $("#texto_accion").html(texto)
                $("#btn_accion").html(texto)
                $('#AI_Mensaje_confirmacion').html(mensaje)

                $('#acciones_colaboradores').modal('show')
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