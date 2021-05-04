<?php
    //detectar cuando estamos haciendo peticion AJAX

    if($peticionAjax){
        require_once "../modelos/usuarioModelo.php";
    }
    else{
        require_once "./modelos/usuarioModelo.php";
    }

    class usuarioControlador extends usuarioModelo{

        /*-----------  >Controlador agrergar usuario-----------------*/
        public function agregar_usuario_controlador()
        {

        }
    }

