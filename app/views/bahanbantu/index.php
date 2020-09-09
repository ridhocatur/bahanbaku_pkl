<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $data['judul'];?></h1>
<?php Flasher::flash(); ?>
<div class="card shadow mb-4">
<div class="card-header py-3">
    <button type="button" class="btn btn-primary tambahbahanbantu" data-toggle="modal" data-target="#ModalBahan">
    Tambah Data
    </button>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Bahan</th>
                <th>Nama Bahan</th>
                <th>Merk</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($data['bahan'] as $data) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['kd_bahan']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['merk']; ?></td>
                <td><?= $data['stok']; ?>&nbsp;KG</td>
                <td><?= $data['nm_kateg']; ?></td>
                <td><?= $data['keterangan']; ?></td>
                <td>
                    <a href="<?= BASEURL; ?>/bahanbantu/edit/<?= $data['id']; ?>" class="btn btn-info btn-circle btn-sm ubahbahanbantu" data-toggle="modal" data-target="#ModalBahan" data-id="<?= $data['id']; ?>" ><i class="fa fa-edit"></i></a>
                    <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="<?= $data['nama']?>" href="<?= BASEURL; ?>/bahanbantu/hapus/<?= $data['id']; ?>"><i class="fa fa-trash"></i></button>
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

