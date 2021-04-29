<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo COMPANY; ?></title>
    <?php include "./vistas/inc/Link.php";?>
</head>
<body>
    <?php
    #Enviar datos mediante Ajax
        $peticionAjax = false;
        require_once "./controladores/vistasControlador.php";
        #Definimos una nueva instancia de vista
        $IV = new vistasControlador();
        #Nombre de la vista que se va a mostyrar
        $vistas =  $IV->obtener_vistas_controlador();
        #verificamos si es un login o 404
        if ($vistas=="login"||$vistas=="404")
        {
            #Mostramos la vistas
            require_once "./vistas/contenidos/".$vistas."-view.php";
        }
        else
        {
            #Star else que imprime Main Container
    ?>
	
	<!-- Main container -->
	<main class="full-box main-container">

        <?php include "./vistas/inc/NavLateral.php";?>
		<!-- Page content -->
		<section class="full-box page-content">

            <?php
            include "./vistas/inc/NavBar.php";
            #Mostramo la vista principal
            include $vistas;
            ?>
			
		</section>
	</main>
    <?php
            #End else
        }
    include "./vistas/inc/Script.php";?>
</body>
</html>