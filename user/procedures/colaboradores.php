<?php
    /**************************************************
        Sistema de expediente digital
        Desarrollador: Equipo UAM
        Año de creación: 2020
        Última modificación del archivo: 21-04-2020
    **************************************************/
    /** Inicializaciones */
        @session_start();
        include_once('../../core/variables_globales.php');
        include_once('../../core/quick_function.php');
        $Quick_function = new Quick_function;
    /** Inicializaciones */
    
    /** Verifica si esta logueado */
        $eslogueado=$Quick_function->es_logueado();
        if($eslogueado != true){ header('Location: ../'); }
    /** Verifica si esta logueado */

    /* Establece las urls de redireccion */
        $url_principal="../colaboradores.php";
    /* Establece las urls de redireccion */

    /* Decide el comportamiento del procedimiento */
        $formaction = (isset($_POST['formaction']))? $_POST['formaction'] : $formaction=$Quick_function->decryptlabel($_GET['formaction']);
    /* Decide el comportamiento del procedimiento */
    
    /* Decision de que metodo usar */
        switch($formaction){
            case "create_DB":
                agregaDB($url_principal, $Quick_function, $_POST);
            break;
            case "edit_DB":
                editarDB($url_principal, $Quick_function, $_POST);
            break;
            case "deleted_DB":
                borrarDB($url_principal, $Quick_function, $_POST);
            break;
            case "block_DB":
                bloquearDB($url_principal, $Quick_function, $_POST);
            break;
            default:
                header('Location: '.$uri);
            break;
        }
    /* Decision de que metodo usar */

    function agregaDB($url_list, $Quick_function, $Data){
        $TABLA = TBL_EMPLEADO;
        /* Inicia los datos de la DB */
            $datos  = array(
                ':id'     => $Quick_function->Topnumber('id', $TABLA)+1,
                ':nombre'               => (isset($Data['nombre']))  ? strip_tags(trim($Data["nombre"])) : "",
                ':apellido'             => (isset($Data['apellido']))  ? strip_tags(trim($Data["apellido"])) : "",
                ':fecha_nacimiento'     => (isset($Data['fecha_nacimiento']))  ? strip_tags(trim($Data["fecha_nacimiento"])) : "",
                ':tipo_licencia'        => (isset($Data['tipo_licencia']))  ? strip_tags(trim($Data["tipo_licencia"])) : "",
                ':cedula'               => (isset($Data['cedula']))  ? strip_tags(trim($Data["cedula"])) : "",
                ':telefono'             => (isset($Data['telefono']))  ? strip_tags(trim($Data["telefono"])) : "",
                ':correo'               => (isset($Data['correo']))  ? strip_tags(trim($Data["correo"])) : "",
                ':residencia'           => (isset($Data['residencia']))  ? strip_tags(trim($Data["residencia"])) : "",
                ':hijos'                => (isset($Data['hijos']))  ? strip_tags(trim($Data["hijos"])) : "",
                ':salario_actual'       => (isset($Data['salario_actual']))  ? strip_tags(trim($Data["salario_actual"])) : "",
                ':estado_civil'         => (isset($Data['estado_civil']))  ? strip_tags(trim($Data["estado_civil"])) : "",
                ':banco'                => (isset($Data['banco']))  ? strip_tags(trim($Data["banco"])) : "",
                ':cuenta_iban'          => (isset($Data['cuenta_iban']))  ? strip_tags(trim($Data["cuenta_iban"])) : "",
                ':cuenta_cliente'       => (isset($Data['cuenta_cliente']))  ? strip_tags(trim($Data["cuenta_cliente"])) : "",
                ':numero_sinpe'         => (isset($Data['numero_sinpe']))  ? strip_tags(trim($Data["numero_sinpe"])) : "",
                ':fecha_contratacion'   => (isset($Data['fecha_contratacion']))  ? strip_tags(trim($Data["fecha_contratacion"])) : "",
                ':fecha_ingreso'        => (isset($Data['fecha_ingreso']))  ? strip_tags(trim($Data["fecha_ingreso"])) : "",
                ':id_grado_academico'   => (isset($Data['id_grado_academico']))  ? strip_tags(trim($Data["id_grado_academico"])) : "",
                ':id_puesto'            => (isset($Data['id_puesto']))  ? strip_tags(trim($Data["id_puesto"])) : "",
                ':id_sexo'              => (isset($Data['id_sexo']))  ? strip_tags(trim($Data["id_sexo"])) : "",
                ':id_sucursal'          => (isset($Data['id_sucursal']))  ? strip_tags(trim($Data["id_sucursal"])) : "",
                ':vacunas'              => (isset($Data['vacunas']))  ? strip_tags(trim($Data["vacunas"])) : "",
            );
        /* Inicia los datos de la DB */

        /* Declara el SQL */
            $sql="  INSERT INTO $TABLA SET 
                        id                  = :id,
                        nombre              = :nombre,
                        apellido            = :apellido,
                        fecha_nacimiento    = :fecha_nacimiento,
                        licencia_conduccion = 0,
                        tipo_licencia       = :tipo_licencia,
                        cedula              = :cedula,
                        telefono            = :telefono,
                        correo              = :correo,
                        residencia          = :residencia,
                        hijos               = :hijos,
                        salario_actual      = :salario_actual,
                        estado_civil        = :estado_civil,
                        banco               = :banco,
                        cuenta_iban         = :cuenta_iban,
                        cuenta_cliente      = :cuenta_cliente,
                        numero_sinpe        = :numero_sinpe,
                        fecha_contratacion  = :fecha_contratacion,
                        fecha_ingreso       = :fecha_ingreso,
                        id_grado_academico  = :id_grado_academico,
                        id_puesto           = :id_puesto,
                        id_sexo             = :id_sexo,
                        id_sucursal         = :id_sucursal,
                        vacunas             = :vacunas,
                        activo              = 1
            ";
        /* Declara el SQL */

        /* Ejecuta el query */
            $Quick_function->SQLDatos_CA($sql, $datos);
        /* Ejecuta el query */

        /* Redirecciona */
            header('Location: '.$url_list);
        /* Redirecciona */
    }

    function editarDB($url_list, $Quick_function, $Data){
        /* Inicia los datos de la DB */
            $datos  = array(
                ':id'                   => (isset($Data['id_cursos']))? strip_tags(trim($Data["id_cursos"])) : 0,
                ':nombre'               => (isset($Data['nombre']))  ? strip_tags(trim($Data["nombre"])) : "",
                ':apellido'             => (isset($Data['apellido']))  ? strip_tags(trim($Data["apellido"])) : "",
                ':fecha_nacimiento'     => (isset($Data['fecha_nacimiento']))  ? strip_tags(trim($Data["fecha_nacimiento"])) : "",
                ':tipo_licencia'        => (isset($Data['tipo_licencia']))  ? strip_tags(trim($Data["tipo_licencia"])) : "",
                ':cedula'               => (isset($Data['cedula']))  ? strip_tags(trim($Data["cedula"])) : "",
                ':telefono'             => (isset($Data['telefono']))  ? strip_tags(trim($Data["telefono"])) : "",
                ':correo'               => (isset($Data['correo']))  ? strip_tags(trim($Data["correo"])) : "",
                ':residencia'           => (isset($Data['residencia']))  ? strip_tags(trim($Data["residencia"])) : "",
                ':hijos'                => (isset($Data['hijos']))  ? strip_tags(trim($Data["hijos"])) : "",
                ':salario_actual'       => (isset($Data['salario_actual']))  ? strip_tags(trim($Data["salario_actual"])) : "",
                ':estado_civil'         => (isset($Data['estado_civil']))  ? strip_tags(trim($Data["estado_civil"])) : "",
                ':banco'                => (isset($Data['banco']))  ? strip_tags(trim($Data["banco"])) : "",
                ':cuenta_iban'          => (isset($Data['cuenta_iban']))  ? strip_tags(trim($Data["cuenta_iban"])) : "",
                ':cuenta_cliente'       => (isset($Data['cuenta_cliente']))  ? strip_tags(trim($Data["cuenta_cliente"])) : "",
                ':numero_sinpe'         => (isset($Data['numero_sinpe']))  ? strip_tags(trim($Data["numero_sinpe"])) : "",
                ':fecha_contratacion'   => (isset($Data['fecha_contratacion']))  ? strip_tags(trim($Data["fecha_contratacion"])) : "",
                ':fecha_ingreso'        => (isset($Data['fecha_ingreso']))  ? strip_tags(trim($Data["fecha_ingreso"])) : "",
                ':id_grado_academico'   => (isset($Data['id_grado_academico']))  ? strip_tags(trim($Data["id_grado_academico"])) : "",
                ':id_puesto'            => (isset($Data['id_puesto']))  ? strip_tags(trim($Data["id_puesto"])) : "",
                ':id_sexo'              => (isset($Data['id_sexo']))  ? strip_tags(trim($Data["id_sexo"])) : "",
                ':id_sucursal'          => (isset($Data['id_sucursal']))  ? strip_tags(trim($Data["id_sucursal"])) : "",
                ':vacunas'              => (isset($Data['vacunas']))  ? strip_tags(trim($Data["vacunas"])) : "",
            );
        /* Inicia los datos de la DB */

        /* Declara el SQL */
            $TABLA = TBL_EMPLEADO;
            $sql="  UPDATE $TABLA SET 
                        nombre              = :nombre,
                        apellido            = :apellido,
                        fecha_nacimiento    = :fecha_nacimiento,
                        licencia_conduccion = 0,
                        tipo_licencia       = :tipo_licencia,
                        cedula              = :cedula,
                        telefono            = :telefono,
                        correo              = :correo,
                        residencia          = :residencia,
                        hijos               = :hijos,
                        salario_actual      = :salario_actual,
                        estado_civil        = :estado_civil,
                        banco               = :banco,
                        cuenta_iban         = :cuenta_iban,
                        cuenta_cliente      = :cuenta_cliente,
                        numero_sinpe        = :numero_sinpe,
                        fecha_contratacion  = :fecha_contratacion,
                        fecha_ingreso       = :fecha_ingreso,
                        id_grado_academico  = :id_grado_academico,
                        id_puesto           = :id_puesto,
                        id_sexo             = :id_sexo,
                        id_sucursal         = :id_sucursal,
                        vacunas             = :vacunas
                    WHERE
                        id = :id
            ";
        /* Declara el SQL */

        /* Ejecuta el query */
            $Quick_function->SQLDatos_CA($sql, $datos);
        /* Ejecuta el query */

        /* Redirecciona */
            header('Location: '.$url_list);
        /* Redirecciona */
    }

    function borrarDB($url_list, $Quick_function, $Data){
        /* Inicia los datos de la DB */
            $datos  = array(':id' => (isset($Data['id_cursos'])) ? strip_tags(trim($Data["id_cursos"])) : 0,);
        /* Inicia los datos de la DB */

        /* Declara el SQL */
            $TABLA = TBL_EMPLEADO;
            $sql="DELETE FROM $TABLA WHERE id = :id";
            echo $sql;
        /* Declara el SQL */
        
        /* Ejecuta el query */
            $Quick_function->SQLDatos_CA($sql, $datos);
        /* Ejecuta el query */

        /* Redirecciona */
            header('Location: '.$url_list);
        /* Redirecciona */
    }

    function bloquearDB($url_list, $Quick_function, $Data){
        /* Inicia los datos de la DB */
            $datos  = array(':id' => (isset($Data['id_colaboradores'])) ? strip_tags(trim($Data["id_colaboradores"])) : 0,);
        /* Inicia los datos de la DB */

        /* Declara el SQL */
            $TABLA = TBL_EMPLEADO;
            $sql="UPDATE $TABLA SET activo = !activo WHERE id = :id";
            echo $sql;
        /* Declara el SQL */
        
        /* Ejecuta el query */
            $Quick_function->SQLDatos_CA($sql, $datos);
        /* Ejecuta el query */

        /* Redirecciona */
            header('Location: '.$url_list);
        /* Redirecciona */
    }
?>