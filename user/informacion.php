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
                        </div>
                            <!-- Page content -->
                        <div class="">
                           
                        
        <!-- Nueva pantalla -->
        <div class="" id="Informacion" tabindex="-1" role="dialog" aria-hidden="true">
            <form id="formcolaboradores" action="procedures/colaboradores.php" method="post">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="texto_Modal_metodo">Nuevo item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="" >
                                        <div class="row justify-content-center">
                                            <div class="col-lg-3 order-lg-2">
                                                <div class="card-profile-image">
                                                    <a href="#">
                                                        <!-- Fotografia -->
                                                        <img src="" class="rounded-circle">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0 pt-md-4">
                                            
                                            <div class="text-center">
                                                <h3>
                                                Nombre Apellido<span class="font-weight-light"></span>
                                                </h3>
                                                <div class="h5 font-weight-300">
                                                    <i class="ni location_pin mr-2"></i>Puesto Colaborador
                                                </div>                                
                                            </div>
                                        </div>
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Esquema de vacunas</span></small>

                                    <select name="vacunas" id="vacunas" aria-required="">
                                        <option value='1'>Completo</option>
                                        <option value='2'>Incompleto</option>
                                        <option value='3'>Sin vacunas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" > 
                        <!--div class="modal-footer"-->
                        <br>
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#AgregarDato" onclick="">
                                            Editar</button>
                        <br>
                        </div>
                        </div>
                       
                    </div>
                </div>
            </form>
        </div>
        </div>
          <!-- Fin Colaborador -->  

                    </div>
                </div>
            </div>
        </section>
        <!-- Modal -->
       
                        <!--Editar-->

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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="form-text text-dark"><span class="asteriscos">* Esquema de vacunas</span></small>

                                    <select name="vacunas" id="vacunas" aria-required="">
                                        <option value='1'>Completo</option>
                                        <option value='2'>Incompleto</option>
                                        <option value='3'>Sin vacunas</option>
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