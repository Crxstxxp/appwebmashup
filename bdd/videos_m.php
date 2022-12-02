<?php

//Clase que se utilizara para crear el modelo que interactuara con la BD

// include_once '../config/conexion.php';

class Categoria extends Conectar
{
    //Funcion para traer todas las categorias
    public function getVideos()
    {
        //llamar la cadena de conexion de la BD 
        $Conectar = parent::Conexion();
        //String a ejecutar
        $sql = "SELECT * FROM videos";

        //Se prepara la conexion
        $sql = $Conectar->prepare($sql);

        //Ejecutar el query
        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVideo($id)
    {

        $Conectar = parent::Conexion();
        //String a ejecutar
        $sql = "SELECT * FROM videos WHERE id = ?";
        $sql = $Conectar->prepare($sql);
        //Indicar en el string de SQL el parametro que utilizara
        $sql->bindValue(1, $id);
        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function postVideos($canal, $id_yt)
    {

        $Conectar = parent::Conexion();
        //String a ejecutar
        $sql = "INSERT INTO videos (nombre, id_canal) VALUES (?, ?)";
        $sql = $Conectar->prepare($sql);
        //Indicar en el string de SQL el parametro que utilizara
        $sql->bindValue(1, $canal);
        $sql->bindValue(2, $id_yt);
        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function putVideo($canal, $id_yt, $id)
    {
        $Conectar = parent::Conexion();
        //String a ejecutar
        $sql = "UPDATE videos SET nombre = ?, id_canal = ? WHERE id = ?";
        $sql = $Conectar->prepare($sql);
        //Indicar en el string de SQL el parametro que utilizara
        $sql->bindValue(1, $canal);
        $sql->bindValue(2, $id_yt);
        $sql->bindValue(3, $id);
        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delVideo($id)
    {

        $Conectar = parent::Conexion();
        //String a ejecutar
        $sql = "DELETE FROM videos WHERE id = ?";
        $sql = $Conectar->prepare($sql);
        //Indicar en el string de SQL el parametro que utilizara
        $sql->bindValue(1, $id);
        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
