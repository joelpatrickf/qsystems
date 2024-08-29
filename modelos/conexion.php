<?php

class Conexion{
    private $host ='localhot';
    private $dbname = 'casper_system';
    private $username= 'rsplusex';
    private $password = 'Alfaomega@123abx';



    private $connection;

    static public function conectar(){
        try {
            //$conn = new PDO("mysql:host=92.38.150.132;dbname=hosteria_qanalytics","hosteria_casper","AlfaomegaCasper@12abx_",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8 "));

            $conn = new PDO("mysql:host=localhost;dbname=casper_system","rsplusex","Alfaomega@123",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8 "));
            return $conn;
        }
        catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }

    }

    static public function conectarSinUTF8(){
        try {
            $conn = new PDO("mysql:host=localhost;dbname=farmagreen","rsplusex","Alfaomega@123");
            return $conn;
        }
        catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }    



}
