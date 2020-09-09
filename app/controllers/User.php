<?php

class User extends Controller
{
    public function __construct()
    {
        check_not_login();
    }

    public function index()
    {
        $data['judul'] = 'List User';
        $data['user'] = $this->model('User_model')->getAll();
        $this->view('templates/head', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar');
        $this->view('user/index', $data);
        $this->view('templates/footer');
        $this->view('templates/script');
    }

    public function tambah()
    {
        if($this->model('User_model')->tambahData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Tambah', 'success');
            header('Location: '.BASEURL.'/user');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Tambah', 'danger');
            header('Location: '.BASEURL.'/user');
            exit;
        }
    }

    public function getedit()
    {
        echo json_encode($this->model('User_model')->getDataById($_POST['id']));
    }

    public function edit()
    {
        if($this->model('User_model')->editData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Ubah', 'info');
            header('Location: '.BASEURL.'/user');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Ubah', 'danger');
            header('Location: '.BASEURL.'/user');
            exit;
        }
    }

    public function hapus($id)
    {
        if($this->model('User_model')->hapusData($id) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Hapus', 'success');
            header('Location: '.BASEURL.'/user');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Tambah', 'danger');
            header('Location: '.BASEURL.'/user');
            exit;
        }
    }
}