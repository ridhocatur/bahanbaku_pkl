<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $data['judul'] ?></h1>
<?php Flasher::flash(); ?>
<div class="card shadow mb-4">
<div class="card-header py-3">
    <button type="button" class="btn btn-primary tambahVinir" data-toggle="modal" data-target="#modalVinir">
    Tambah Data
    </button>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Vinir</th>
                <th>Ukuran</th>
                <th>Stok (pcs)</th>
                <th>Kubikasi (M<sup>3</sup>)</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($data['bahan'] as $data) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['ukuran']; ?></td>
                <td><?= $data['stok']; ?></td>
                <td><?= $data['kubikasi']; ?></td>
                <td><?= $data['keterangan']; ?></td>
                <td>
                    <a href="<?= BASEURL; ?>/vinir/edit/<?= $data['id']; ?>" class="btn btn-info btn-circle btn-sm ubahVinir" data-toggle="modal" data-target="#modalVinir" data-id="<?= $data['id']; ?>" ><i class="fa fa-edit"></i></a>
                    <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="Jenis <?= $data['nama']?>" href="<?= BASEURL; ?>/vinir/hapus/<?= $data['id']; ?>"><i class="fa fa-trash"></i></button>
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

