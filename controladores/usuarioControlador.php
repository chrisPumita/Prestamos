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
            //guardar en variables todos los datos del formulario
            $dni        = mainModel::limpiar_cadena($_POST['usuario_dni_reg']);
            $nombre     = mainModel::limpiar_cadena($_POST['usuario_nombre_reg']);
            $apellido   = mainModel::limpiar_cadena($_POST['usuario_apellido_reg']);
            $telefono   = mainModel::limpiar_cadena($_POST['usuario_telefono_reg']);
            $direccion  = mainModel::limpiar_cadena($_POST['usuario_direccion_reg']);

            $usuario    = mainModel::limpiar_cadena($_POST['usuario_usuario_reg']);
            $email      = mainModel::limpiar_cadena($_POST['usuario_email_reg']);
            $clave1     = mainModel::limpiar_cadena($_POST['usuario_clave_1_reg']);
            $clave2     = mainModel::limpiar_cadena($_POST['usuario_clave_2_reg']);

            //$privilegio = mainModel::limpiar_cadena($_POST['usuario_privilegio_reg']);

            //verificar que los campos obligatorios tengan informacion
            if ($dni == "" || $nombre==""|| $apellido == ""
                || $usuario == "" || $clave1 == "" || $clave2 == "")
            {
                //el usuario no ha llenado los campos text
                $alerta =[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"No has llenado los campos obligatorios",
                    "Tipo"=>"error"
                ];
                //lo convertimos a json para mandarlo a json
                echo json_encode($alerta);
                exit();
            }
        }
    }

