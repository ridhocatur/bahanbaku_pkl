<h1 class="h3 mb-2 text-gray-800"><?= $data['judul']; ?></h1>
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h3>Tipe Lem : <b><?= $data['info']['gluemix']; ?></b></h3>
    <h5>Shift : <b><?= $data['info']['shift']; ?></b></h5>
    <h5>Tanggal : <b><?= date('d-F-Y' ,strtotime($data['info']['tgl'])); ?></b></h5>
    <a class="btn btn-info" href="<?= BASEURL; ?>/gluemix/">Kembali</a>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Kode Bahan</th>
                <th>Merk</th>
                <th>Stok Keluar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['gluemix'] as $data) : ?>
            <tr>
                <td value="<?= $data['id_bahan']; ?>"><?= $data['kd_bahan']; ?></td>
                <td value="<?= $data['id_bahan']; ?>"><?= $data['merk']; ?></td>
                <td><?= $data['stok_keluar']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tr>
            <th style="display: none;"></th>
            <th colspan="2"><center> <b>TOTAL : </b> </center></th>
            <th><?= $data2['total']['total']; ?></th>
        </tr>
    </table>
    <br>
</div>
</div>