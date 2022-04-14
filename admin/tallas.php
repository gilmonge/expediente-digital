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
                        <h2>Listado de tallas de uniformes<h2>
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
                                    <th scope="col" class="text-center">Sexo</th>
                                    <th scope="col" class="text-center">Activo</th>
                                    <th scope="col" class="text-center">Editar</th>
                                    <th scope="col" class="text-center">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody class="expediente-cuerpo-tabla">
                                <?php
                                    $TBL_TALLAS_UNIFORMES = TBL_TALLAS_UNIFORMES;
                                    $TBL_SEXO = TBL_SEXO;
                                    $select = " SELECT 
                                                    TU.id,
                                                    TU.nombre,
                                                    TU.id_sexo,
                                                    TU.activo,
                                                    S.descripcion
                                                FROM $TBL_TALLAS_UNIFORMES AS TU
                                                INNER JOIN $TBL_SEXO AS S
                                                    ON S.id = TU.id_sexo
                                    ";
                                    $listado_items= $Quick_function->SQLDatos_SA($select);
                                    while ($row = $listado_items->fetch()) {
                                        $id = $row["id"];
                                        $nombre = $row["nombre"];
                                        $descripcion = $row["descripcion"];
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

                                        echo "
                                            <tr>
                                                <td class='text-center'>$id</td>
                                                <td class='text-center'>$nombre</td>
                                                <td class='text-center'>$descripcion</td>
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

        <div class="modal fade" id="acciones_departamento" tabindex="-1" role="dialog" aria-hidden="true">
            <form id="form_item" action="procedures/tallas.php" method="post">
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
                    <input type="hidden" id="formaction_departamento_accion" name="formaction" value="">
                    <input type="hidden" id="id_tallas_accion" name="id_tallas" value="">
                </div>
            </form>
        </div>
        
        <div class="modal fade" id="AgregarDato" tabindex="-1" role="dialog" aria-hidden="true">
            <form id="form_departamento" action="procedures/tallas.php" method="post">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="texto_Modal_metodo">Nueva talla de uniforme</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* </span>Nombre</small>
                                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* </span>Sexo</small>

                                    <select name="id_sexo" id="id_sexo">
                                        <?php
                                            $select = "SELECT * FROM ".TBL_SEXO;
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

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-dark">Guardar</button>
                        </div>
                    </div>
                    <input type="hidden" id="formaction_departamento" name="formaction" value="create_DB">
                    <input type="hidden" id="id_tallas" name="id_tallas" value="">
                </div>
            </form>
        </div>

        <?php include_once("template/libs.php") ?>
        <?php include_once("template/footer.php") ?>

        <script type="text/javascript">
            function establecer_agregar() {
                $("#form_departamento")      .trigger("reset")
                $("#formaction_departamento").val("create_DB")
                $("#id_tallas")                .val("")
                $("#texto_Modal_metodo")     .html("Nueva talla de uniforme")
            }

            function establecer_editar(informacion) {
                informacion = JSON.parse(informacion)
                $("#form_departamento").trigger("reset")
                $("#formaction_departamento").val("edit_DB")

                $("#texto_Modal_metodo").html(`Modificar talla de uniforme`)
                $("#id_tallas")           .val(informacion.id)

                $("#nombre").val(informacion.nombre)
                $("#id_sexo").val(informacion.id_sexo)
            }

            function eliminar(informacion) {
                informacion = JSON.parse(informacion)
                $("#formaction_departamento_accion").val('deleted_DB')
                $("#id_tallas_accion").val(informacion.id)

                mensaje = `
                    Desea bloquear '<b>${informacion.nombre}</b>'
                `;

                texto = `
                    Bloquear
                `;
                
                $("#texto_accion").html(texto)
                $("#btn_accion").html(texto)
                $('#AI_Mensaje_confirmacion').html(mensaje)

                $('#acciones_departamento').modal('show')
            }

            $(document).ready(function () {
                crear_dataTable("listado")
            })
        </script>
    </body>

</html>