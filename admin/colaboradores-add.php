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
                                    <h2>Agregar colaborador<h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-md-0 text-md-right"></div>
                            </div>
                        </div>
                            <!-- Page content -->
                        <div class="container-fluid mt--7">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card bg-secondary shadow">
                                        <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <div class="col-12">
                                                    <h3 class="mb-0">Información</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form id="formcolaboradores" action="procedures/colaboradores.php" method="post">
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
                                                                
                                                                <select name="banco" id="banco" aria-required="" required>
                                                                    <option value='Banco Nacional'>Banco Nacional</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <small class="form-text text-dark"><span class="asteriscos">* Cuenta IBAN</span></small>
                                                                <input type="text" class="form-control" placeholder="Cuenta IBAN" name="cuenta_iban" id="cuenta_iban" required  maxlength="22" minlength="22">
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

                                                <input type="hidden" id="formaction_colaboradores" name="formaction" value="create_DB">
                                                <input type="hidden" id="id_colaboradores_edit" name="id_colaboradores" value="">
                                                <input type="hidden" name="origen" value="2">
                                                
                                                <div class="modal-footer">
                                                    <a type="button" class="btn btn-secondary" data-dismiss="modal" href="colaboradores.php">Cerrar</a>
                                                    <button type="submit" class="btn btn-dark">Guardar</button>
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

    </body>

</html>