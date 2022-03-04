<?php
	/**************************************************
		Sistema de administracion
		Desarrollador: Gilberth Monge
		Año de creación: 2020
		Última modificación del archivo: 21-04-2020
	**************************************************/

    /** estado de la aplicacion */
		if(PHP_OS == 'Linux'){ define("DEBUG", "PRODUCTION"); } /* DEBUG PRODUCTION */
		else{ define("DEBUG", "DEVELOP"); }
	/** estado de la aplicacion */

	date_default_timezone_set('America/Costa_Rica');
	$nombre_Error_Log = "error_log_".date("Y_m_d").".log";

	error_reporting(E_ALL); /** E_ALL | E_DEPRECATED | E_PARSE */
 	ini_set("error_reporting", -1);
 	ini_set("log_errors", TRUE);
 	ini_set("display_errors",true);
	if(PHP_OS == 'Linux'){ 
		/* estructura basica de un servidor Centos7 */
		if(DEBUG == "DEBUG"){ ini_set("error_log", "/var/www/html/expediente-digital/error_log/$nombre_Error_Log"); }
		else{ ini_set("error_log", "/var/www/expediente-digital/error_log/$nombre_Error_Log"); }
	}
	else{ ini_set("error_log", "C:\\xampp\\htdocs\\expediente-digital\\error_log\\$nombre_Error_Log"); }

	/* conexion con la base de datos*/
		define("HOST_BD", "localhost");
		define("NOMBRE_BD", "expediente-digital");
		define("USUARIO_BD", "rexy_developer");
		define("CONTRASENA_BD", "r2R12@iT9S854$");
	/* conexion con la base de datos*/

	/** Tablas fijas */
		define("TABLA_ADMINISTRADORES", "rexy_usuarios");
		define("TABLA_CONFIGURACION", "rexy_configuracion");
		define("TABLA_PARAMETROS", "rexy_parametros");
		define("TABLA_USUARIOS_CONECTADOS", "rexy_usuarios_conectados");
	/** Tablas fijas */

	/* Roles de usuario */
		define("TABLA_ROLES_USUARIO", "rexy_roles_usuario");
		define("TABLA_MENU_ADMIN", "rexy_roles_usuario_scripts");
		define("TABLA_MENU_PERMISOS", "rexy_roles_usuario_permisos");
		define("TABLA_PERMISOS_X_ROLES", "vs_permisos_roles");
	/* Roles de usuario */

	/** codigos de ecriptamiento */
		define("LLAVE", "FyZ1Xer1eG");
		define("LLAVELBL", "t40uCgM^du!wo3vM");
	/** codigos de ecriptamiento */

	/** varios */
		define("un_MB", '1048576');
	/** varios */

	/* Google reCaptcha*/
		define("KEY_PUBLICO", "6LdTKigTAAAAAL2fhjr_PenMbxTotjpAMk_c46rq");
		define("KEY_SECRETO", "6LdTKigTAAAAALnLfcW8K5KoPmTx_Wh7PEx0mLrT");
	/* Google reCaptcha*/

	/* Terceros */
		define("TBL_EMPLEADO", "tbl_empleado");
	/* Terceros */
	
	/* Monedas */
		define("TABLA_MONEDAS", "rexy_monedas");
	/* Monedas */

	/* Cuentas contables */
		define("TABLA_CUENTAS_CONTABLES", "rexy_cuentas_contables");
	/* Cuentas contables */
?>