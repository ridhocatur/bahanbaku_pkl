<h1 class="h3 mb-2 text-gray-800"><?= $data['judul']; ?></h1>
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h4>Invoice : <b><?= $data2['invo']['invoice']; ?></b></h4>
    <h5>Tanggal : <b><?= date('d-F-Y' ,strtotime($data2['invo']['tgl'])); ?></b></h5>
    <a class="btn btn-info" href="<?= BASEURL; ?>/kayumasuk/">Kembali</a>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Kode Kayu</th>
                <th>Stok Masuk</th>
                <th>Kubik Masuk</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['detail'] as $data) : ?>
            <tr>
                <td value="<?= $data['id']; ?>"><?= $data['kd_kayu']; ?></td>
                <td><?= $data['stok_masuk']; ?></td>
                <td><?= $data['kubik_masuk']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tr>
            <th><center> <b>TOTAL : </b> </center></th>
            <th><?= $data2['invo']['jml_stok']; ?></th>
            <th><?= $data2['invo']['jml_kubik']; ?></th>
        </tr>
    </table>
    <br>
</div>
</div>