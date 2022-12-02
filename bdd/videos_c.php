<?php

//Decirle al programa que vamos a utilzar objetos JSON
header('Content-Type: application/json');

//Es el archivo del controlador que se utilizara para acceder al modelo a traves de un endpoint y traer los datos en un JSON

require_once 'conex.php';
require_once 'videos_m.php';

//Crear un objeto para utilizar la categoria del models 
$categoria = new Categoria();

//Decodificar los parametros que enviamos y los acepte en tipo JOSN
$body = json_decode(file_get_contents("php://input"), true);

//Crear los servicio s a utilizar en los endpoint
switch ($_GET["op"]) {
        //Traer todos los registros de la tabla de categorias
    case "selectall":
        $datos = $categoria->getVideos();
        echo json_encode($datos);
        break;
    case "selectid":
        $datos = $categoria->getVideo($body["id"]);
        echo json_encode($datos);
        break;
        //Traer un registro en particulas de la tabla 
    case "insert":
        $datos = $categoria->postVideos($body["canal"], $body["id_canal"]);
        echo json_encode("Registro insertado con exito");
        break;
    case "update":
        $datos = $categoria->putVideo($body["canal"], $body["id_canal"], $body['id']);
        echo json_encode("Registro actualizado con exito");
        break;
    case "delete":
        $datos = $categoria->delVideo($body["id"]);
        echo json_encode("Registro eliminado con exito");
        break;
}
