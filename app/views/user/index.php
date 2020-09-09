<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $data['judul']; ?></h1>
<?php Flasher::flash(); ?>
<div class="card shadow mb-4">
<div class="card-header py-3">
    <button type="button" class="btn btn-primary tambahUser" data-toggle="modal" data-target="#tampilModal">
    Tambah Data
    </button>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
            <?php foreach($data['user'] as $data) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nik']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['telp']; ?></td>
                <td><?= $data['level']; ?></td>
                <td>
                    <a href="<?= BASEURL; ?>/user/edit/<?= $data['id']; ?>" class="btn btn-info btn-circle btn-sm tombolUbahUser" data-toggle="modal" data-target="#tampilModal" data-id="<?= $data['id']; ?>" ><i class="fa fa-edit"></i></a>
                    <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="<?= $data['nama']?>" href="<?= BASEURL; ?>/user/hapus/<?= $data['id']; ?>"><i class="fa fa-trash"></i></button>
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