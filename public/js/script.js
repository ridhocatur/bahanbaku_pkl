$(function () {
    // ------------------ tombol Close modal
    $('.close').on('click', function() {
        $('#formModal')[0].reset();
    });
    //---------------------------------

    $('.tambahUser').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('#password').attr('placeholder','')
        $('#formModal')[0].reset();
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/user/tambah')
    });

    $('.tombolUbahUser').on('click', function(){
        $('#ModalLabel').html('Ubah Data Satuan')
        $('#password').attr('placeholder','Kosongkan jika tidak ingin di ubah')
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/user/edit')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/bahanbaku/public/user/getedit',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                $('#id').val(data.id);
                $('#nik').val(data.nik);
                $('#username').val(data.username);
                $('#nama').val(data.nama);
                $('#telp').val(data.telp);
                $('#level').val(data.level);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //------------------- Jenis Kayu
    $('.tambahJenisKayu').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('#formModal')[0].reset();
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/jeniskayu/tambah')
    });

    $('.ubahJenisKayu').on('click', function(){
        $('#ModalLabel').html('Ubah Data Jenis Kayu')
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/jeniskayu/edit')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/bahanbaku/public/jeniskayu/getedit',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                $('#id').val(data.id);
                $('#kd_jenis').val(data.kd_jenis);
                $('#nama').val(data.nama);
                $('#keterangan').val(data.keterangan);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //----------------- Kategori
    $('.tambahKategori').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('#formModal')[0].reset();
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/kategori/tambah')
    });

    $('.tombolUbahKategori').on('click', function(){
        $('#ModalLabel').html('Ubah Data Kategori')
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/kategori/edit')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/bahanbaku/public/kategori/getedit',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                $('#id').val(data.id);
                $('#nm_kateg').val(data.nm_kateg);
                $('#keterangan').val(data.keterangan);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //----------------- Supplier
    $('.tambahSupplier').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('#formModal')[0].reset();
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/supplier/tambah')
    });

    $('.tombolUbahSupplier').on('click', function(){
        $('#ModalLabel').html('Ubah Data Supplier')
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/supplier/edit')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/bahanbaku/public/supplier/getedit',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                // console.log(data);
                $('#id').val(data.id);
                $('#nm_sup').val(data.nm_sup);
                $('#sup').val(data.sup);
                $('#alamat').val(data.alamat);
                $('#email').val(data.email);
                $('#telp').val(data.telp);
                $('#keterangan').val(data.keterangan);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //----------------- Kayu
    $('.tambahKayu').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('#formModal')[0].reset();
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/kayu/tambah')
    });

    $('.tombolUbahKayu').on('click', function(){
        $('#ModalLabel').html('Ubah Data Kayu')
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/kayu/edit')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/bahanbaku/public/kayu/getedit',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                // console.log(data);
                $('#id').val(data.id);
                $('#kd_kayu').val(data.kd_kayu);
                $('#kd_jenis').val(data.kd_jenis);
                $('#stok').val(data.stok);
                $('#kubikasi').val(data.kubikasi);
                $('#keterangan').val(data.keterangan);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //----------------- Master Bahan Bantu
    $('.tambahbahanbantu').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('#formModal')[0].reset();
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/bahanbantu/tambah')
    });

    $('.ubahbahanbantu').on('click', function(){
        $('#ModalLabel').html('Ubah Data')
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/bahanbantu/edit')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/bahanbaku/public/bahanbantu/getedit',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                // console.log(data);
                $('#id').val(data.id);
                $('#kd_bahan').val(data.kd_bahan);
                $('#nama').val(data.nama);
                $('#merk').val(data.merk);
                $('#stok').val(data.stok);
                $('#id_kategori').val(data.id_kategori);
                $('#keterangan').val(data.keterangan);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //----------------- Bahan Masuk
    $('.dataBaru').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/bahanmasuk/tambah')
        $('#formModal')[0].reset();
        // $('#stok_masuk').prop("disabled", false);
    });

    $('.tombolUbahBahanMasuk').on('click', function(){
        $('#ModalLabel').html('Ubah Data Bahan')
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/bahanmasuk/edit')
        // $('#stok_masuk').prop("disabled", true);

        const id = $(this).data('id');
        // console.log(id);
        $.ajax({
            url: 'http://localhost/bahanbaku/public/bahanmasuk/getedit',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                // console.log(data);
                $('#id').val(data.id);
                $('#tgl').val(data.tgl);
                $('#invoice').val(data.invoice);
                $('#id_bahan').val(data.id_bahan);
                $('#nama').val(data.nama);
                $('#stok_masuk').val(data.stok_masuk);
                $('#id_supplier').val(data.id_supplier);
                $('#keterangan').val(data.keterangan);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //----------------- Master Vinir
    $('.tambahVinir').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('#formModal')[0].reset();
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/vinir/tambah')
    });

    $('.ubahVinir').on('click', function(){
        $('#ModalLabel').html('Ubah Data')
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/vinir/edit')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/bahanbaku/public/vinir/getedit',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                // console.log(data);
                $('#id').val(data.id);
                $('#kd_jenis').val(data.kd_jenis);
                $('#ukuran').val(data.ukuran);
                $('#stok').val(data.stok);
                $('#kubikasi').val(data.kubikasi);
                $('#keterangan').val(data.keterangan);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //----------------- Vinir Masuk
    $('.tambahVinirMasuk').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/vinirmasuk/tambah')
        $('#formModal')[0].reset();
        $('#id_kayu').prop("disabled", false);
    });

    $('.tombolUbahVinirMasuk').on('click', function(){
        $('#ModalLabel').html('Ubah Data Bahan')
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/vinirmasuk/edit')
        $('#id_kayu').prop("disabled", true);

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/bahanbaku/public/vinirmasuk/getedit',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                // console.log(data);
                $('#id').val(data.id);
                $('#id_kayu').val(data.id_kayu);
                $('#tgl').val(data.tgl);
                $('#id_vinir').val(data.id_vinir);
                $('#stok').val(data.stok_masuk);
                $('#kubikasi').val(data.kubik_masuk);
                $('#kayu_log').val(data.kayu_log);
                $('#keterangan').val(data.keterangan);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //----------------- Gluemix
    $('.tambahGluemix').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/gluemix/tambah')
        $('#formModal')[0].reset();
    });
     //---- sambungan form.php untuk kalkulasi total Gluemix
    $("body").on('keyup', '.stok_keluar', function(e) {
        e.preventDefault();
        kalkulasi();
      });

      //----------------- Vinir Keluar
    $('.tambahVinirKeluar').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/vinirkeluar/tambah')
        $('#formModal')[0].reset();
    });
    //---- sambungan form.php untuk kalkulasi total Vinir Keluar
    $("body").on('keyup', '.vinir_stok_keluar', function(e) {
        e.preventDefault();
        calc_stok();
      });

    $("body").on('keyup', '.kubik_keluar', function(e) {
        e.preventDefault();
        calc_kubik();
      });

      //----------------- Kayu Masuk
    $('.tambahKayuMasuk').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('.modal-body form').attr('action', 'http://localhost/bahanbaku/public/kayumasuk/tambah')
        $('#formModal')[0].reset();
    });
      //---- sambungan form.php untuk kalkulasi total Kayu Masuk
    $("body").on('keyup', '.jml_stok_kayu', function(e) {
        e.preventDefault();
        stok_kayu();
      });

    $("body").on('keyup', '.jml_kubik_kayu', function(e) {
        e.preventDefault();
        kubik_kayu();
      });

      // ------------------- TOMBOL LAPORAN
    $(".clearForm").on('click',function(){
        $('#datepicker1').datepicker('value', '');
        $('#datepicker2').datepicker('value', '');
        $('#id_supplier').val('');
        $('#id_kayu').val('');
        $('#shift').val('');
    });
});