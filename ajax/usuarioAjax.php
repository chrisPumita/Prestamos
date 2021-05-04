<?php
//recibir los datos desde el form para cada modulo

    //definir

    $peticionAjax = true;

    require_once "../config/APP.php";
    //detectar si estamos enviando datos desde el form
    if (){

        /*-----------  Instancia al controlador  -----------------*/
        require_once "../controladores/usuarioControlador.php";
        $ins_usuario = new usuarioControlador();

    }
    else{
        session_start(['name'=>'SPM']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
    }