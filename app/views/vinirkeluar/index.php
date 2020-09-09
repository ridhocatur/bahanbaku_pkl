<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $data['judul']; ?></h1>
<?php Flasher::flash(); ?>
<div class="card shadow mb-4">
<div class="card-header py-3">
    <button type="button" class="btn btn-primary tambahVinirKeluar" data-toggle="modal" data-target="#tampilModal">
    Tambah Data
    </button>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Shift</th>
                <th>Tipe Glue</th>
                <th>Jml. Pemakaian (pcs)</th>
                <th>Jml. Kubikasi (M<sup>3</sup>)</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($data['vinirkeluar'] as $data) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= date('d-m-Y' ,strtotime($data['tgl'])); ?></td>
                <td><?= $data['shift']; ?></td>
                <td><?= $data['tipe_glue']; ?></td>
                <td><?= $data['jml_stok']; ?></td>
                <td><?= $data['jml_kubikasi']; ?></td>
                <td><?= $data['keterangan']; ?></td>
                <td>
                    <a class="btn btn-info btn-circle btn-sm" data-id="<?= $data['id']; ?>" href="<?= BASEURL; ?>/vinirkeluar/detail/<?= $data['id']; ?>"><i class="fa fa-eye"></i></a>
                    <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="Tanggal <?= $data['tgl']?>" href="<?= BASEURL; ?>/vinirkeluar/hapus/<?= $data['id']; ?>"><i class="fa fa-trash"></i></button>
                </td>
                <form action="" method="POST" id="deleteForm">
                    <input type="submit" value="" style="display:none">
                </form>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
</div>
</div>
<!-- Modal Add -->
<?php require_once 'form.php'; ?>