<?php
//incluir el modelo principal que conecta a la base de datos
 require_once "mainModel.php";
  class usuarioModelo extends mainModel{
      //modulo de usuario

      /*-----------  >Modelo agrergar usuario-----------------*/

      protected static function agregar_usuario_modelo($datos)
      {
        //interactua diectamente con la base de datos
          $query = "INSERT INTO `usuario` (`usuario_id`, `usuario_dni`, `usuario_nombre`, `usuario_apellido`, `usuario_telefono`, 
                       `usuario_direccion`, `usuario_email`, `usuario_usuario`, `usuario_clave`, `usuario_estado`, `usuario_privilegio`) 
                   VALUES (NULL, :DNI, :Nombre, :Apellido, :Telefono, :Direccion, :Email, :Usuario,:Clave, :Estado, :Privilegio)";
          $sql = mainModel::conectar()->prepare($query);

          $sql ->bindParam(":DNI",$datos['DNI']);
          $sql ->bindParam(":Nombre",$datos['Nombre']);
          $sql ->bindParam(":Apellido",$datos['Apellido']);
          $sql ->bindParam(":Telefono",$datos['Telefono']);
          $sql ->bindParam(":Direccion",$datos['Direccion']);
          $sql ->bindParam(":Email",$datos['Email']);
          $sql ->bindParam(":Usuario",$datos['Usuario']);
          $sql ->bindParam(":Clave",$datos['Clave']);
          $sql ->bindParam(":Estado",$datos['Estado']);
          $sql ->bindParam(":Privilegio",$datos['Privilegio']);
          //eejecutanmoos
          $sql -> execute();
          return $sql;
      }
  }