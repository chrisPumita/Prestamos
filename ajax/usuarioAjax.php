<?php
//recibir los datos desde el form para cada modulo

    //definir

    $peticionAjax = true;

    require_once "../config/APP.php";
    //detectar si estamos enviando datos desde el form
    if (isset($_POST['usuario_dni_reg'])){

        /*-----------  Instancia al controlador  -----------------*/
        require_once "../controladores/usuarioControlador.php";
        $ins_usuario = new usuarioControlador();

        /*----------- Agregar un usuario e la BD -----------------*/
        if (isset($_POST['usuario_dni_reg']) && isset($_POST['usuario_nombre_reg']))
        {
            echo $ins_usuario->agregar_usuario_controlador();
        }
    }
    else{
        session_start(['name'=>'SPM']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit();
    }