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
                        <h2>Listado de puestos de trabajo<h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-md-0 text-md-right">
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#AgregarDato" onclick="establecer_agregar()">
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
                                    <th scope="col" class="text-center">Salario base</th>
                                    <th scope="col" class="text-center">Departamento</th>
                                    <th scope="col" class="text-center">Activo</th>
                                    <th scope="col" class="text-center">Editar</th>
                                    <th scope="col" class="text-center">Bloquear</th>
                                </tr>
                            </thead>
                            <tbody class="expediente-cuerpo-tabla">
                                <?php
                                    $TBL_PUESTO = TBL_PUESTO;
                                    $TBL_DEPARTAMENTO = TBL_DEPARTAMENTO;
                                    $select = " SELECT 
                                                    PUES.id,
                                                    PUES.nombre,
                                                    PUES.salario_base,
                                                    PUES.activo,
                                                    PUES.nombre AS departamento
                                                FROM $TBL_PUESTO AS PUES
                                                INNER JOIN $TBL_DEPARTAMENTO AS DEP
                                                    ON DEP.id = PUES.id_departamento
                                    ";
                                    $listado_items= $Quick_function->SQLDatos_SA($select);
                                    while ($row = $listado_items->fetch()) {
                                        $id = $row["id"];
                                        $nombre = $row["nombre"];
                                        $salario_base = $row["salario_base"];
                                        $departamento = $row["departamento"];
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
                                                <td class='text-center'>$salario_base</td>
                                                <td class='text-center'>$departamento</td>
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
            <form id="form_item" action="procedures/puestos.php" method="post">
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
                    <input type="hidden" id="formaction_puestos_accion" name="formaction" value="">
                    <input type="hidden" id="id_puestos_accion" name="id_puestos" value="">
                </div>
            </form>
        </div>
        
        <div class="modal fade" id="AgregarDato" tabindex="-1" role="dialog" aria-hidden="true">
            <form id="form_departamento" action="procedures/puestos.php" method="post">
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
                                    <small class="form-text text-dark"><span class="asteriscos">* </span>Salario base</small>
                                    <input type="text" class="form-control" placeholder="Salario base" name="salario_base" id="salario_base">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* </span>Departamento</small>

                                    <select name="id_departamento" id="id_departamento" aria-required="">
                                        <?php
                                            $select = "SELECT * FROM ".TBL_DEPARTAMENTO;
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
                    <input type="hidden" id="formaction_puestos" name="formaction" value="create_DB">
                    <input type="hidden" id="id_puestos" name="id_puestos" value="">
                </div>
            </form>
        </div>

        <?php include_once("template/libs.php") ?>
        <?php include_once("template/footer.php") ?>

        <script type="text/javascript">
            function establecer_agregar() {
                $("#form_departamento")      .trigger("reset")
                $("#formaction_puestos").val("create_DB")
                $("#id_puestos")                .val("")
                $("#nombre")                 .val("")
                $("#salario_base")           .val("")
                $("#id_departamento")        .val("")
                $("#texto_Modal_metodo")     .html("Nueva talla de uniforme")
            }

            function establecer_editar(informacion) {
                informacion = JSON.parse(informacion)
                $("#form_departamento").trigger("reset")
                $("#formaction_puestos").val("edit_DB")

                $("#texto_Modal_metodo").html(`Modificar talla de uniforme`)
                $("#id_puestos")           .val(informacion.id)

                $("#nombre").val(informacion.nombre)
                $("#salario_base").val(informacion.salario_base)
                $("#id_departamento").val(informacion.id_departamento)
            }

            function eliminar(informacion) {
                informacion = JSON.parse(informacion)
                $("#formaction_puestos_accion").val('block_DB')
                $("#id_puestos_accion").val(informacion.id)

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