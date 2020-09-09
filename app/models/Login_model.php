<?php

class Login_model
{
    private $tabel = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getlogin()
    {
        if(!isset($_SESSION['username'] )== 0) { // cek session apakah kosong(belum login) maka alihkan ke index.php
            header('Location: http://localhost/bahanbaku/public/home/index.php');
        }
        if(isset($_POST['login'])) { // mengecek apakah form variabelnya ada isinya
            $username = $_POST['username'];
            $password = $_POST['password'];
            try {
                $this->db->kueri("SELECT * FROM ".$this->tabel." WHERE username=:username AND password=:password"); // buat queri select
                $this->db->bind('username', $username);
                $this->db->bind('password', $password);
                $this->db->execute(); // jalankan query
                $count = $this->db->rowCount(); // mengecek row

                if($count == 1) { // jika rownya ada
                    $_SESSION['username'] = $username; // set sesion dengan variabel username
                    header("Location: http://localhost/bahanbaku/public/dashboard/index.php"); // lempar variabel ke tampilan index.php
                    return;
                }else{
                    echo "Anda tidak dapat login";
                }

            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
    }
    }

    public function getlogout()
    {
        session_destroy();
    }
}