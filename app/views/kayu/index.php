<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $data['judul']; ?></h1>
<?php Flasher::flash(); ?>
<div class="card shadow mb-4">
<div class="card-header py-3">
    <button type="button" class="btn btn-primary tambahKayu" data-toggle="modal" data-target="#tampilModal">
    Tambah Data
    </button>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Log</th>
                <th>Jenis Kayu</th>
                <th>Stok (pcs)</th>
                <th>Kubikasi (M<sup>3</sup>)</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($data['kayu'] as $data) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['kd_kayu']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['stok']; ?></td>
                <td><?= $data['kubikasi']; ?></td>
                <td><?= $data['keterangan']; ?></td>
                <td>
                    <a href="<?= BASEURL; ?>/kayu/edit/<?= $data['id']; ?>" class="btn btn-info btn-circle btn-sm tombolUbahKayu" data-toggle="modal" data-target="#tampilModal" data-id="<?= $data['id']; ?>" ><i class="fa fa-edit"></i></a>
                    <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="<?= $data['kd_kayu']?>" href="<?= BASEURL; ?>/kayu/hapus/<?= $data['id']; ?>"><i class="fa fa-trash"></i></button>
                </td>
                <form action="" method="POST" id="deleteForm">
                    <input type="submit" value="" style="display:none">
                </form>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

<!-- Modal Add -->
<?php require_once 'form.php'; ?>