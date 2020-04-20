<?php

    include('koneksi.php');

    Class Employe{
        public $nama;
        public $usia;
        public $nomor;
        public $email;
        public $gaji;

        function __construct($nama,$usia,$nomor,$email,$gaji){
            $this->nama =$nama;
            $this->usia =$usia;
            $this->nohp =$nomor;
            $this->email=$email;
            $this->gaji=$gaji; 
        }

        function select(){
            global $db;
            $employ = $db->query("SELECT * FROM `employe`");
            while ($row = $employ->fetch(PDO::FETCH_ASSOC)) {
                $result[]=$row;
                $data = array('status'=>200, 'result'=>$result);
            }
            return json_encode($data);
        }

        function cari($id){
            global $db;
            $employ = $db->query("SELECT * FROM `employe` where id = $id");
            while ($row = $employ->fetch(PDO::FETCH_ASSOC)) {
                $result[]=$row;
                $data = array('status'=>200,'result'=>$result);
            }
            return json_encode($data);
        }

        function tambah(){
            global $db;
            if ($employ = $db->exec("INSERT INTO `employe` (`id`, `nama`, `usia`, `nohp`, `emai`, `gaji`) VALUES (NULL, '$this->$nama', '$this->$usia', '$this->$nomor', '$this->$email', '$this->$gaji');")) {
                $result = array('status'=>$employ, 'message'=>'Add Employe Success');
                return json_encode($result);
            }else {
                http_response_code(400);
                $result = array('status' =>$employ,'message'=> 'Employ Added Erorr');
                return json_encode($result);
            }
        }

        function update($id){
            global $db;
            if ($employ = $db->exec("UPDATE `employe` SET `nama` = '$this->$nama ', `usia` = '$this->$usia', `nohp` = '$this->$nomor', `emai` = '$this->$email', `gaji` = '$this->$email' WHERE `employe`.`id` = $id;")) {
                $result = array('status'=>$employ, 'message'=>'Update Employe Success');
                return json_encode($result);
            }else{
                http_response_code(400);
                $result = array('status'=>$employ, 'message'=>'Update Employe Error');
                return json_encode($result);
            }
        }

        function delete($id){
            global $db;
            if ($employ = $db->exec("DELETE FROM `employe` WHERE `employe`.`id` = $id")) {
                $result = array('status'=>$employ, 'message'=>'Delete Employe Succes');
                return json_encode($result);
            }else {
                http_response_code(400);
                $result = array('status'=>$employ,'message'=>'Delete Employe Erorr');
                return json_encode($result);
            }
        }
    }

?>