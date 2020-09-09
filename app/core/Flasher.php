<?php

class Flasher
{
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function setFlashUser($pesan, $aksi, $tipe)
    {
        $_SESSION['flasher'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        if( isset($_SESSION['flash']))
        {
            echo '<div class="alert alert-'. $_SESSION['flash']['tipe'] .'" role="alert">
            Data telah <strong>'. $_SESSION['flash']['pesan'] .'</strong> '. $_SESSION['flash']['aksi'] .'.
            </div>';
        }
        unset($_SESSION['flash']);
    }

    public static function flashUser()
    {
        if( isset($_SESSION['flasher']))
        {
            echo '<div class="alert alert-'. $_SESSION['flasher']['tipe'] .'" role="alert">
            Login <strong>'. $_SESSION['flasher']['pesan'] .' !</strong>. '. $_SESSION['flasher']['aksi'] .'
            </div>';
        }
        unset($_SESSION['flasher']);
    }
}