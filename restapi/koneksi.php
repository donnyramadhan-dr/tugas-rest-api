<?php

    header("Content-Type: application/json; charset=UTF-8");

    Class Connection{
        public $dbconn;
        function getConn($dbname, $user, $password){
            try {
                $conn = new PDO("mysql:host=localhost;dbname=$dbname","$user", "$password");
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            return $this->dbconn = $conn;
        }
    }

    $koneksi = new Connection();
    $db = $koneksi->getConn("produk","root","");

    // try {
    //     $conn = new PDO('mysql:host=localhost;dbname=produk','root','');
    //     echo "Tersambung";
    // } catch (PDOException $e) {
    //     echo $e->getMessage();
    // }

?>