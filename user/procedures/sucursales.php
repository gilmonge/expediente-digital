<?php
    /**************************************************
        Sistema de contabilidad
        Desarrollador: Rexy Studios
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
        $url_principal="../sucursales.php";
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
        $TABLA = TBL_SUCURSALES;
        /* Inicia los datos de la DB */
            $datos  = array(
                ':id'               => $Quick_function->Topnumber('id', $TABLA)+1,
                ':nombre'           =>  (isset($Data['nombre']))  ? strip_tags(trim($Data["nombre"])) : "",
                ':direccion'        =>  (isset($Data['direccion']))  ? strip_tags(trim($Data["direccion"])) : "",
                ':correo'           =>  (isset($Data['correo']))  ? strip_tags(trim($Data["correo"])) : "",
                ':telefono'         =>  (isset($Data['telefono']))  ? strip_tags(trim($Data["telefono"])) : 0,
                ':telefono2'        =>  (isset($Data['telefono2']))  ? strip_tags(trim($Data["telefono2"])) : 0,
                ':horario_apertura' =>  (isset($Data['horario_apertura']))  ? strip_tags(trim($Data["horario_apertura"])) : "",
                ':horario_cierre'   =>  (isset($Data['horario_cierre']))  ? strip_tags(trim($Data["horario_cierre"])) : "",
                ':dias_atencion'    =>  (isset($Data['dias_atencion']))  ? strip_tags(trim($Data["dias_atencion"])) : "",
            );
        /* Inicia los datos de la DB */

        /* Declara el SQL */
            $sql="  INSERT INTO $TABLA SET 
                        id                  = :id,
                        nombre              = :nombre,
                        direccion           = :direccion,
                        correo              = :correo,
                        telefono            = :telefono,
                        telefono2           = :telefono2,
                        horario_apertura    = :horario_apertura,
                        horario_cierre      = :horario_cierre,
                        dias_atencion       = :dias_atencion
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
                ':id'               => (isset($Data['id_sucursal']))? strip_tags(trim($Data["id_sucursal"])) : 0,
                ':nombre'           =>  (isset($Data['nombre']))  ? strip_tags(trim($Data["nombre"])) : "",
                ':direccion'        =>  (isset($Data['direccion']))  ? strip_tags(trim($Data["direccion"])) : "",
                ':correo'           =>  (isset($Data['correo']))  ? strip_tags(trim($Data["correo"])) : "",
                ':telefono'         =>  (isset($Data['telefono']))  ? strip_tags(trim($Data["telefono"])) : 0,
                ':telefono2'        =>  (isset($Data['telefono2']))  ? strip_tags(trim($Data["telefono2"])) : 0,
                ':horario_apertura' =>  (isset($Data['horario_apertura']))  ? strip_tags(trim($Data["horario_apertura"])) : "",
                ':horario_cierre'   =>  (isset($Data['horario_cierre']))  ? strip_tags(trim($Data["horario_cierre"])) : "",
                ':dias_atencion'    =>  (isset($Data['dias_atencion']))  ? strip_tags(trim($Data["dias_atencion"])) : "",
            );
        /* Inicia los datos de la DB */

        /* Declara el SQL */
            $TABLA = TBL_SUCURSALES;
            $sql="  UPDATE $TABLA SET 
                        nombre              = :nombre,
                        direccion           = :direccion,
                        correo              = :correo,
                        telefono            = :telefono,
                        telefono2           = :telefono2,
                        horario_apertura    = :horario_apertura,
                        horario_cierre      = :horario_cierre,
                        dias_atencion       = :dias_atencion
                    WHERE
                        `id` = :id
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
            $datos  = array(':id' => (isset($Data['id_sucursal'])) ? strip_tags(trim($Data["id_sucursal"])) : 0,);
        /* Inicia los datos de la DB */

        /* Declara el SQL */
            $TABLA = TBL_SUCURSALES;
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
            $datos  = array(':id' => (isset($Data['id_sucursal'])) ? strip_tags(trim($Data["id_sucursal"])) : 0,);
        /* Inicia los datos de la DB */

        /* Declara el SQL */
            $TABLA = TBL_SUCURSALES;
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