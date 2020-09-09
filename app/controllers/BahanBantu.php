<?php

class BahanBantu extends Controller
{
    public function __construct()
    {
        check_not_login();
    }

    public function index()
    {
        $data['judul'] = 'Data Master Bahan Bantu';
        $data['bahan'] = $this->model('BahanBantu_model')->getJoinAll();
        $data2['kategori'] = $this->model('Kategori_model')->getAll();
        $this->view('templates/head', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar');
        $this->view('bahanbantu/index', $data, $data2);
        $this->view('templates/footer');
        $this->view('templates/script');
    }

    public function tambah()
    {
        if($this->model('BahanBantu_model')->tambahData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Tambah', 'success');
            header('Location: '.BASEURL.'/bahanbantu');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Tambah', 'danger');
            header('Location: '.BASEURL.'/bahanbantu');
            exit;
        }
    }

    public function getedit()
    {
        echo json_encode($this->model('BahanBantu_model')->getJoinById($_POST['id']));
    }

    public function edit()
    {
        if($this->model('BahanBantu_model')->editData($_POST) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Ubah', 'info');
            header('Location: '.BASEURL.'/bahanbantu');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Ubah', 'danger');
            header('Location: '.BASEURL.'/bahanbantu');
            exit;
        }
    }

    public function hapus($id)
    {
        if($this->model('BahanBantu_model')->hapusData($id) > 0)
        {
            Flasher::setFlash('Berhasil', 'Di Hapus', 'success');
            header('Location: '.BASEURL.'/bahanbantu');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Di Tambah', 'danger');
            header('Location: '.BASEURL.'/bahanbantu');
            exit;
        }
    }
}