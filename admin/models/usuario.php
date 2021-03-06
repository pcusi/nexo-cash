<?php

declare(strict_types=1);
require_once("conexion.php");

class Usuario extends Conexion
{


    public function login()
    {

        $conn = parent::conexion();

        if (isset($_POST["enviar"])) {

            //INICIO DE VALIDACIONES
            $clave = $_POST["clave"];
            $usuario = $_POST["usuario"];

            if (empty($usuario) and empty($clave)) {

                header("Location:" . parent::ruta() . "index?m=2");
                exit();
            } else {

                $sql = "SELECT *FROM Usuario WHERE usuario=? and clave=?";

                $sql = $conn->prepare($sql);

                $sql->bindValue(1, $usuario);
                $sql->bindValue(2, $clave);
                $sql->execute();
                $resultado = $sql->fetch();

                //si existe el registro entonces se conecta en session
                if (is_array($resultado) and count($resultado) > 0) {

                    /*IMPORTANTE: la session guarda los valores de los campos de la tabla de la bd*/
                    $_SESSION["Id"] = $resultado["Id"];
                    $_SESSION["Usuario"] = $resultado["Usuario"];

                    header("Location:" . parent::ruta() . "views/prestamos");

                    exit();
                } else {

                    //si no existe el registro entonces le aparece un mensaje
                    header("Location:" . parent::ruta() . "index?m=1");
                    exit();
                }
            } //cierre del else


        } //condicion enviar
    }

    public function logout()
    {
        session_destroy();
        header("Location:" . parent::ruta() . "index");
    }
}
