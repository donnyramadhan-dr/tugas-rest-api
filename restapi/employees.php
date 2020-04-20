<?php

    include('index.php');

    $req_method = $_SERVER["REQUEST_METHOD"];
    switch ($req_method) {
        case 'GET':
            if (isset($_GET['id'])) {
                $query = new Employe("","","","","");
                echo $query->cari($_GET['id']);
            }else {
                $query = new Employe("","","","","");
                echo $query->select();
            }
            break;
        
        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);
            $nama = $data['nama'];
            $usia = $data['usia'];
            $nomor = $data['nohp'];
            $email = $data['email'];
            $gaji = $data['gaji'];

            $query = new Employe("$nama","$usia","$nomor","$email","$gaji");
            echo $query->tambah();
            break;
        
        case 'PUT':
            $data = json_decode(file_get_contents("php://input"),true);
            $nama = $data['nama'];
            $usia = $data['usia'];
            $nomor = $data['nohp'];
            $email = $data['email'];
            $gaji = $data['gaji'];

            $query = new Employe("$nama","$usia","$nomor","$email","$gaji");
            echo $query->update($_GET['id']);
            break;
        
        case 'DELETE':
            $query = new Employe("","","","","");
            echo $query->delete($_GET['id']);
            break;    
        
        default:
            header("HTTP/1.0 405 Method Not Allowed");
            $message =  array('message'=>'Method Not Allowed');
            echo json_encode($message);
            break;
    }

?>