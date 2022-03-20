<?php
	/**************************************************
		Sistema de administracion
		Desarrollador: Gilberth Monge
		Año de creación: 2020
		Última modificación del archivo: 21-04-2020
	**************************************************/
	/** Inicializaciones */
		@session_start();
		include_once('core/variables_globales.php');
		include_once('core/quick_function.php');
		$Quick_function = new Quick_function;
    /** Inicializaciones */
    
	/** Verifica si esta logueado */
        $eslogueado=$Quick_function->es_logueado();
		if($eslogueado==true){ header('Location: admin/'); }
	/** Verifica si esta logueado */
	
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Conta - Sistema administración</title>
        <!-- Favicon -->
        <link rel="icon" href="img/favicon.png?v0.0.6" type="image/png">

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0265b153d4.js" ></script>

        <!-- Quick CSS -->
        <link rel="stylesheet" href="assets/libs/quick-website/css/quick-website.css" id="stylesheet">
        
        <!-- Sistema administración CSS -->
        <link rel="stylesheet" href="assets/expediente/css/style.css?v0.0.5" id="stylesheet">

    </head>

    <body>

        <section>
            
            <div class="bg-primary position-absolute h-100 top-0 left-0 zindex-100 col-lg-6 col-xl-6 zindex-100 d-none d-lg-flex flex-column justify-content-end" data-bg-size="cover" data-bg-position="center">
                <!-- Cover image -->
                <img src="img/extras/login.jpg" alt="Image" class="img-as-bg">
                <!-- Overlay text -->
                <div class="row position-relative zindex-110 p-5" style="background: rgba(0,0,0,.3);">
                    <div class="col-md-8 text-center mx-auto">
                        <h5 class="h5 text-white mt-3" id="frase_dicho"></h5>
                        <p class="text-white opacity-8" id="frase_autor"></p>
                    </div>
                </div>
            </div>
            <div class="container-fluid d-flex flex-column">
                <div class="row align-items-center justify-content-center justify-content-lg-end min-vh-100">
                    <div class="col-sm-7 col-lg-6 col-xl-6 py-6 py-md-0">
                        <div class="row justify-content-center">
                            <div class="col-11 col-lg-10 col-xl-6">
                                <div>
                                    <div class="mb-5">
                                        <h6 class="h3 mb-1">Bienvenido!</h6>
                                        <p class="text-muted mb-0">
                                            Ingresa para disfrutar.
                                        </p>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <label class="form-control-label">Usuario</label>
                                                </div>
                                                <div class="mb-2">
                                                    <a href="index.php" class="small text-muted text-underline--dashed border-primary" data-toggle="password-text" data-target="#input-password">Volver</a>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Usuario">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-block btn-primary">Recuperar</button>
                                    </form>
                                    <div class="py-3 text-center">
                                        <span class="text-xs text-uppercase"><hr/></span>
                                    </div>
                                    <!-- Alternative login -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a href="#" class="btn btn-block btn-neutral btn-icon mb-3 mb-sm-0">
                                                <img src="img/logo.png" alt="Sistema administración" class="w-100">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        
        <!-- Service Worker -->
        <script>
            if ( navigator.serviceWorker ) {
                navigator.serviceWorker.register('sw.js');
            }
        </script>

        <!-- Core JS  -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Quick JS -->
        <script src="assets/libs/quick-website/js/quick-website.js"></script>

        <!-- expediente Studio JS -->
        <script src="assets/expediente/js/script.js"></script>

        <script>
            $(document).ready(function () {
                obtener_frase()
            })
        </script>
    </body>

</html>