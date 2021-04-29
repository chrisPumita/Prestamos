<?php
	 /**
	  * Modelo obtener las vistas que interactua con las vistas
	  */
	 class vistaModelo
	 {
	 	/*--------------Modelos obtener vistas----------------*/
	 	 protected static function obtener_vistas_modelo($vistas)
	 	 {
	 	 	#Lista blanca de palabras de la url
	 	 	$listaBlanca =["home","client-list"];
	 	 	#Verificamos si la vista que esta entrando esta en la lista blanca para poder moestrarla
	 	 	if (in_array($vistas,$listaBlanca))
	 	 	 {
	 	 	     if (is_file("./vistas/contenidos/".$vistas."-view.php"))
	 	 	     {
	 	 	     	//buscamos la referencia del archivo y mostramos la vista
	 	 	     	$contenido = "./vistas/contenidos/".$vistas."-view.php";
	 	 	     }
	 	 	     else
	 	 	     {
	 	 	     	//La referencia no existe asi que devolvemos 404
	 	 	     	$contenido="404";
	 	 	     }
	 	 		# devolver la vista de la pagina
	 	 	}
	 	 	elseif ($vistas=="login"|| $vistas=="index") {
	 	 		# El usuario esta en el loging o index
	 	 		$contenido ="login";
	 	 	}
	 	 	else
	 	 	{
	 	 		$contenido="404";
	 	 	}
	 	 	return $contenido;
	 	 }

	 }