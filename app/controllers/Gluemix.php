<?php

class Gluemix extends Controller
{
    public function __construct()
    {
        check_not_login();
    }

    public function index()
    {
        $data['judul'] = 'Data Pengolahan Lem';
        $data['gluemix'] = $this->model('Gluemix_model')->getAll();
        $data2['bantu'] = $this->model('BahanBantu_model')->getAll();
        $this->view('templates/head', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('gluemix/index', $data, $data2);
        $this->view('templates/footer');
        $this->view('templates/script');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail';
        $data['gluemix'] = $this->model('Gluemix_model')->getDetail($id);
        $data['info'] = $this->model('Gluemix_model')->getDataById($id);
        $data2['total'] = $this->model('Gluemix_model')->getDataById($id);
        $this->view('templates/head', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('gluemix/detail', $data, $data2);
        $this->view('templates/footer');
        $this->view('templates/script');
    }

    public function tambah()
    {
        if($this->model('Gluemix_model')->tambahData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Tambah', 'success');
            header('Location: '.BASEURL.'/gluemix');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Tambah', 'danger');
            header('Location: '.BASEURL.'/gluemix');
            exit;
        }
    }

    public function hapus($id)
    {
        if($this->model('Gluemix_model')->hapusData($id) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Hapus', 'success');
            header('Location: '.BASEURL.'/gluemix');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Tambah', 'danger');
            header('Location: '.BASEURL.'/gluemix');
            exit;
        }
    }
}