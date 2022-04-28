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
                        <a type="button" class="btn btn-dark" href="colaboradores-add.php">
                            Agregar Colaborador
                        </a>
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
                                    <th scope="col" class="text-center">Estado</th>
                                    <th scope="col" class="text-center">Información</th>
                                    <th scope="col" class="text-center">Editar</th>
                                    <th scope="col" class="text-center">Bloquear</th>
                                </tr>
                            </thead>
                            <tbody class="expediente-cuerpo-tabla">
                                <?php
                                    $select =  "SELECT e.id as id, e.cedula  as cedula, e.fecha_nacimiento as fecha_nacimiento, e.nombre as nombre, e.apellido as apellido, CONCAT(e.nombre, ' ',e.apellido) as nombre_persona, e.tipo_licencia as tipo_licencia,
                                    e.residencia, e.telefono, e.activo, e.correo, g.nombre as grado, p.nombre as puesto, s.descripcion as sexo, su.nombre as sucursal, 
                                    m.detalle as inf_medica, e.fecha_ingreso, e.cuenta_iban, e.cuenta_cliente, e.numero_sinpe,e.estado_civil, s.id as id_sexo, e.hijos,
                                    e.vacunas, g.id as id_grado_academico, su.id as id_sucursal, p.id as id_puesto, e.banco,
                                    e.fecha_contratacion as fecha_contratacion, TIMESTAMPDIFF(YEAR,e.fecha_contratacion,CURDATE()) AS annos_laborados, 
                                    TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad, e.banco as banco, e.salario_actual as salario_actual,
                                    e.fecha_contratacion as fec_contratacion
                                        FROM  tbl_empleado e
                                            Inner Join tbl_grado_academico g on e.id_grado_academico = g.id
                                            Inner Join tbl_puesto p on e.id_puesto = p.id
                                            Inner Join tbl_sexo s on e.id_sexo = s.id
                                            Inner Join tbl_sucursales su on e.id_sucursal = su.id
                                            left Join tbl_informacion_medica m on e.id = m.id_empleado";

                                    $listado_items= $Quick_function->SQLDatos_SA($select);

                                    while ($row = $listado_items->fetch()) {
                                        $cedula = $row["cedula"];
                                        $nombre = $row["nombre_persona"];
                                        $correo = $row["correo"];
                                        $telefono = $row["telefono"];
                                        $activo = ($row["activo"])? "Activo" : "Bloqueado";                                        
                                        $informacion = htmlentities(json_encode($row));


                                        $botonEditar = '
                                            <button type="button" class="btn btn-dark btn-icon-only btn-sm" data-toggle="modal" data-target="#informacion_colaboradores" onclick="establecer_editar(\''.$informacion.'\')">
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

                                        $botonInfo = '
                                        <button type="button" class="btn btn-outline-dark btn-icon-only btn-sm" data-toggle="modal" data-target="#informacion_colaborador" onclick="mostrar_informacion(\''.$informacion.'\')">
                                            <span class="btn-inner--icon">
                                                <i class="fas fa-info"></i>
                                            </span>
                                        </button>
                                        ';

                                        echo "
                                            <tr>
                                            <td class='text-center'>$cedula</td>
                                            <td class='text-center'>$nombre</td>
                                            <td class='text-center'>$correo</td>
                                            <td class='text-center'>$telefono</td>
                                            <td class='text-center'>$activo</td>
                                            <td class='text-center'>$botonInfo</td>
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


        <div class="modal fade" id="informacion_colaborador" tabindex="-1" role="dialog" aria-hidden="true">
            <form id="form_cuenta" action="procedures/cuentas_contables.php" method="post">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="texto_accion">Información del colaborador</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            
                                            <th scope="row" class="expediente-letra-estandar">Nombre:</th>
                                            <td><span id="info_nombre" class="badge badge-light expediente-letra-estandar"></span></td>

                                            <th scope="row" class="expediente-letra-estandar">Correo:</th>
                                            <td><span id="info_correo" class="badge badge-light expediente-letra-estandar"></span></td>

                                            <th scope="row" class="expediente-letra-estandar">Puesto:</th>
                                            <td><span id="info_puesto" class="badge badge-light expediente-letra-estandar"></span></td>
                               
                                            
                                        </tr>

                                        <tr>
                                            <th scope="row" class="expediente-letra-estandar">Identificación:</th>
                                            <td><span id="info_identificacion" class="badge badge-light expediente-letra-estandar"></span></td>

                                            <th scope="row" class="expediente-letra-estandar">Teléfono:</th>
                                            <td><span id="info_telefono" class="badge badge-light expediente-letra-estandar"></span></td>

                                            <th scope="row" class="expediente-letra-estandar">Grado académico:</th>
                                            <td><span id="info_grado" class="badge badge-light expediente-letra-estandar"></span></td>
                                            
                                            
                                        </tr>
                                        <tr>
                                                                                       
                                        </tr>
                                        <tr>       
                                            <th scope="row" class="expediente-letra-estandar">Sexo:</th>
                                            <td><span id="info_sexo" class="badge badge-light expediente-letra-estandar"></span></td>    
                                        
                                            <th scope="row" class="expediente-letra-estandar">Fecha de contratación:</th>
                                            <td><span id="info_fecha_con" class="badge badge-light expediente-letra-estandar"></span></td>

                                            <th scope="row" class="expediente-letra-estandar">Sucursal:</th>
                                            <td><span id="info_sucursal" class="badge badge-light expediente-letra-estandar"></span></td>

                                            
                                        </tr>

                                        <tr>
                                            <th scope="row" class="expediente-letra-estandar">Edad:</th>
                                            <td><span id="info_edad" class="badge badge-light expediente-letra-estandar"></span></td>

                                            <th scope="row" class="expediente-letra-estandar">Años laborados:</th>
                                            <td><span id="info_annos_l" class="badge badge-light expediente-letra-estandar"></span></td>

                                            <th scope="row" class="expediente-letra-estandar">Salario:</th>
                                            <td><span id="info_salario" class="badge badge-light expediente-letra-estandar"></span></td>

                                        </tr>                           
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
            <form id="form_edit_colaboradores" action="procedures/colaboradores.php" method="post">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="texto_accion">Editar información del colaborador</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                
                                                <h6 class="heading-small text-muted mb-4 text-dark">Información personal</h6>
                                                <div class="pl-lg-4">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Cédula</span></small>
                                                                <input type="text" class="form-control" placeholder="Cédula" name="cedula" id="cedula" required maxlength="9" minlength="9">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Fecha nacimiento</span></small>
                                                                <input type="text" class="form-control datepicker" placeholder="Fecha nacimiento" name="fecha_nacimiento" id="fecha_nacimiento" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Nombre</span></small>
                                                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" required maxlength="40" minlength="2">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Apellido</span></small>
                                                                <input type="text" class="form-control" placeholder="Apellido" name="apellido" id="apellido" required maxlength="40" minlength="2">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Tipo de licencia</span></small>

                                                                <select name="tipo_licencia" id="tipo_licencia" aria-required="" required>
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
                                                                <small class="form-text text-dark"><span class="asteriscos">* Estado civil</span></small>
                                                                <select name="estado_civil" id="estado_civil" aria-required="" required>
                                                                    <option value='S'>Soltero(a)</option>
                                                                    <option value='C'>Casado(a)</option>
                                                                    <option value='U'>Unión libre</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Sexo</span></small>

                                                                <select name="id_sexo" id="id_sexo" aria-required="" required>
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
                                                                <small class="form-text text-dark"><span class="asteriscos">* Hijos</span></small>
                                                                <select name="hijos" id="hijos" aria-required="" required>
                                                                    <option value='No tiene'>No tiene</option>
                                                                    <?php
                                                                        for ($i=1; $i <= 10; $i++) { 
                                                                            if($i==1){
                                                                                echo "<option value='Tiene $i hijo(a)'>Tiene $i hijo(a)</option>";
                                                                            }else{
                                                                                echo "<option value='Tiene $i hijos(as)'>Tiene $i hijos(as)</option>";
                                                                            }
                                                                        }
                                                                        $select = "SELECT * FROM ".TBL_SEXO." WHERE activo = 1";
                                                                        $listado_items= $Quick_function->SQLDatos_SA($select);
                                                                        while ($row = $listado_items->fetch()) {
                                                                            $id = $row["id"];
                                                                            $descripcion = $row["descripcion"];

                                                                            $informacion = htmlentities(json_encode($row));

                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <hr class="my-4">

                                                <h6 class="heading-small text-muted mb-4 text-dark">Información de contacto</h6>
                                                <div class="pl-lg-4">
                                                    <div class="row">
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Télefono</span></small>
                                                                <input type="text" class="form-control" placeholder="Télefono" name="telefono" id="telefono" required maxlength="8" minlength="8">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Correo</span></small>
                                                                <input type="email" class="form-control" placeholder="Correo" name="correo" id="correo" required maxlength="60" minlength="10">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Residencia</span></small>
                                                                <input type="text" class="form-control" placeholder="Residencia" name="residencia" id="residencia" required maxlength="300" minlength="20">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <hr class="my-4">

                                                <div class="pl-lg-4">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h6 class="heading-small text-muted mb-4 text-dark">Información médica</h6>
                                                            <div class="pl-lg-12">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <small class="form-text text-dark"><span class="asteriscos">* Esquema de vacunas</span></small>

                                                                            <select name="vacunas" id="vacunas" aria-required="" required>
                                                                                <option value='3'>Sin vacunas</option>
                                                                                <option value='2'>Incompleto</option>
                                                                                <option value='1'>Completo</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <h6 class="heading-small text-muted mb-4 text-dark">Información educativa</h6>
                                                            <div class="pl-lg-12">
                                                                <div class="row">

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <small class="form-text text-dark"><span class="asteriscos">* Grado académico</span></small>

                                                                            <select name="id_grado_academico" id="id_grado_academico" aria-required="" required>
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

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="my-4">

                                                <h6 class="heading-small text-muted mb-4 text-dark">Información del trabajo</h6>
                                                <div class="pl-lg-4">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Puesto</span></small>

                                                                <select name="id_puesto" id="id_puesto" aria-required="" required>
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
                                                                <small class="form-text text-dark"><span class="asteriscos">* Salario actual</span></small>
                                                                <input type="text" class="form-control" placeholder="Salario actual" name="salario_actual" id="salario_actual" required maxlength="40" minlength="2">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Fecha contratación</span></small>
                                                                <input type="text" class="form-control datepicker" placeholder="Fecha contratación" name="fecha_contratacion" id="fecha_contratacion" required>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Fecha ingreso</span></small>
                                                                <input type="text" class="form-control datepicker" placeholder="Fecha ingreso" name="fecha_ingreso" id="fecha_ingreso" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Sucursal</span></small>

                                                                <select name="id_sucursal" id="id_sucursal" aria-required="" required>
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
                                                    
                                                </div>
                                                <hr class="my-4">

                                                <h6 class="heading-small text-muted mb-4 text-dark">Datos de pago</h6>
                                                <div class="pl-lg-4">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Banco</span></small>                       
                                                                <input type="text" class="form-control" placeholder="Banco" name="banco" id="banco">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Cuenta IBAN</span></small>
                                                                <input type="text" class="form-control" placeholder="Cuenta IBAN" name="cuenta_iban" id="cuenta_iban" required  maxlength="18" minlength="18">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Cuenta cliente</span></small>
                                                                <input type="text" class="form-control" placeholder="Cuenta cliente" name="cuenta_cliente" id="cuenta_cliente" required maxlength="17" minlength="15">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Número SINPE</span></small>
                                                                <input type="text" class="form-control" placeholder="Número SINPE" name="numero_sinpe" id="numero_sinpe" required maxlength="8" minlength="8">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>                       
                            </div>
                                <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal" href="colaboradores.php">Cerrar</button>
                                 <button type="submit" class="btn btn-dark">Guardar</button>
                                </div>
                    </div>
                     <input type="hidden" id="formaction_colaboradores" name="formaction" value="create_DB">
                    <input type="hidden" id="id_colab" name="id_colab" value="">
                   <!-- <input type="hidden" name="origen" value="2">-->
                </div>
            </form>
        </div>

        <?php include_once("template/libs.php") ?>
        <?php include_once("template/footer.php") ?>

        
        <script type="text/javascript">
            function establecer_agregar() {
                $("#form_colaborador")             .trigger("reset")
                $("#formaction_colaboradores")    .val("create_DB")
                $("#id_item_edit")          .val("")
                $("#texto_Modal_metodo")    .html("Nuevo item")
                refrescar_selectpicker()
            }
            
            function establecer_editar(informacion) {
                informacion = JSON.parse(informacion)
                $("#form_edit_colaboradores").trigger("reset")
                $("#formaction_colaboradores").val("edit_DB")
            
                $("#id_colab")   .val(informacion.id)
                $("#nombre")   .val(informacion.nombre)
                $("#apellido")   .val(informacion.apellido)
                $("#fecha_nacimiento")   .val(informacion.fecha_nacimiento)
                $("#tipo_licencia")   .val(informacion.tipo_licencia)
                $("#cedula")   .val(informacion.cedula)
                $("#telefono")   .val(informacion.telefono)
                $("#correo")   .val(informacion.correo)
                $("#residencia")   .val(informacion.residencia)
                $("#hijos")   .val(informacion.hijos)
                $("#salario_actual")   .val(informacion.salario_actual)
                $("#estado_civil")   .val(informacion.estado_civil)
                $("#banco")   .val(informacion.banco)
                $("#cuenta_iban")   .val(informacion.cuenta_iban)
                $("#cuenta_cliente")   .val(informacion.cuenta_cliente)
                $("#numero_sinpe")   .val(informacion.numero_sinpe)
                $("#fecha_contratacion")   .val(informacion.fecha_contratacion)
                $("#fecha_ingreso")   .val(informacion.fecha_ingreso)
                $("#id_grado_academico")   .val(informacion.id_grado_academico)
                $("#id_puesto")   .val(informacion.id_puesto)
                $("#id_sexo")   .val(informacion.id_sexo)
                $("#id_sucursal")   .val(informacion.id_sucursal)
                $("#vacunas")   .val(informacion.vacunas)

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
                    Desea bloquear '<b>${informacion.nombre_persona}.</b>'
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
                $('#info_identificacion')       .html(informacion.cedula)
                $('#info_nombre')               .html(informacion.nombre_persona)
                $('#info_correo')               .html(informacion.correo)
                $('#info_puesto')               .html(informacion.puesto)
                $('#info_telefono')             .html(informacion.telefono)
                $('#info_grado')                .html(informacion.grado)
                $('#info_sexo')                 .html(informacion.sexo)
                $('#info_fecha_con')            .html(informacion.fecha_contratacion)
                $('#info_sucursal')             .html(informacion.sucursal) 
                $('#info_edad')                 .html(informacion.edad)
                $('#info_salario')              .html(informacion.salario_actual)
                $('#info_annos_l')              .html(informacion.annos_laborados)
            }

            $(document).ready(function () {
                crear_dataTable("listado")
            })
        </script>
    </body>

</html>