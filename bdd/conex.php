<?php

    //Archivo de conexion a la bd de MySQL api restful

    class Conectar {
        protected $dbh;

        protected function Conexion() {
            try{
                $conectar = $this -> dbh=new PDO("mysql:local=localhost; dbname=api_yutu","root","");
                return $conectar;
            }
            catch(Exception $e) {
                print "Error en la BD".$e -> getMessage()."</br>";
                die("Verifica por favor");
            }
        }
    }
?>