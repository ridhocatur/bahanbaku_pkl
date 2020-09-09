<?php

class Auth extends Controller
{
    public function login()
    {
        check_already_login();
        $this->view('auth/login');
    }

    public function authenticate()
    {
        if(isset($_POST['login'])) { // mengecek apakah form variabelnya ada isinya
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $user = $this->model('User_model')->loginUser($username, $password);

            if(!empty($user)) { // cek session
                $_SESSION['id'] = $user['id'];
                $_SESSION['nama'] = $user['nama'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['level'] = $user['level'];
                Flasher::setFlashUser('Berhasil', '', 'success');
                header('Location: '.BASEURL.'/');
                exit;
            } else {
                if ( $user == 0) {
                    Flasher::setFlashUser('Gagal', 'Username / Password Salah', 'danger');
                    header('Location: '.BASEURL.'/');
                    exit;
                }
            }
        }
    }

    public function logout()
    {
        session_start();

        session_unset();
        session_destroy();
        // unset($_SESSION['id']);
        // unset($_SESSION['nama']);
        // unset($_SESSION['username']);
        header('Location: '.BASEURL.'/auth/login');
    }
}