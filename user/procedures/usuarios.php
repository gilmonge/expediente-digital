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
        $url_principal="../usuarios.php";
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
        $TABLA = TBL_USUARIO;
        /* Inicia los datos de la DB */
            $datos  = array(
                ':id'     => $Quick_function->Topnumber('id', $TABLA)+1,
                ':nombre' => (isset($Data['nombreUsuario']))  ? strip_tags(trim($Data["nombreUsuario"])) : "",
                ':contrasena' => md5((isset($Data['password']))  ? strip_tags(trim($Data["password"])) : "") ,
            );
        /* Inicia los datos de la DB */

        /* Declara el SQL */
            $sql="  INSERT INTO $TABLA SET 
                        id          = :id,
                        nombre      = :nombre,
                        contraseña  = :contrasena,
                        id_rol      = 1,
                        id_empleado = null,
                        activo      = 1
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
                ':id'     => (isset($Data['id_usuario']))? strip_tags(trim($Data["id_usuario"])) : 0,
                ':nombre' => (isset($Data['nombreUsuario']))  ? strip_tags(trim($Data["nombreUsuario"])) : "",
            );
            $TABLA = TBL_USUARIO;
        /* Inicia los datos de la DB */

        /* Declara el SQL */
            if(isset($Data['password']) && $Data['password'] != ''){
                $datos[":contrasena"] = md5((isset($Data['password']))  ? strip_tags(trim($Data["password"])) : "");

                $sql="  UPDATE $TABLA SET 
                            nombre = :nombre,
                            contraseña  = :contrasena
                        WHERE
                            `id` = :id
                ";
            }else{
                $sql="  UPDATE $TABLA SET 
                            nombre = :nombre
                        WHERE
                            `id` = :id
                ";
            }
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
            $datos  = array(':id' => (isset($Data['id_usuario'])) ? strip_tags(trim($Data["id_usuario"])) : 0,);
        /* Inicia los datos de la DB */

        /* Declara el SQL */
            $TABLA = TBL_USUARIO;
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
            $datos  = array(':id' => (isset($Data['id_usuario'])) ? strip_tags(trim($Data["id_usuario"])) : 0,);
        /* Inicia los datos de la DB */

        /* Declara el SQL */
            $TABLA = TBL_USUARIO;
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