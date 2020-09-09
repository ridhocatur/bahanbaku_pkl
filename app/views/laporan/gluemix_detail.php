<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?= BASEURL; ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="<?= BASEURL; ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <title><?= $data['judul']; ?></title>
</head>
<body>
<center>
    <table>
        <tr>
            <td>
                <img src="<?= BASEURL; ?>/img/logotrp.JPG" style="width: 100px; height: 100px;">
            </td>
            <td>&nbsp;</td>
            <td>
                <center>
                    <h3>DATA <?= strtoupper($data['judul']); ?></h3>
                    <h4>PT. TANJUNG RAYA PLYWOOD</h4>
                    <h6>Desa Tinggiran II Luar, Barito Kuala</h6>
                </center>
            </td>
        </tr>
    </table>
</center>
<br>
<br>
<table class="table" width="800">
    <?php foreach($data['gluemix'] as $data) : ?>
        <tr class="text-center">
            <th>Shift : <?= $data['shift']; ?></th>
            <th>Tipe Lem : <?= $data['gluemix']; ?></th>
            <th>Tanggal : <?= date('d-m-Y' ,strtotime($data['tgl'])); ?></th>
        </tr>
        <?php if (sizeof($data['item']) > 0) : ?>
    <tr>
        <td colspan="3" align="center">
            <table width="max">
                <thead>
                    <tr align="center">
                        <th>No.</th>
                        <th>Kode Bahan</th>
                        <th>Merk</th>
                        <th>Stok Keluar</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                <?php $totalstok = 0; ?>
                <?php foreach($data['item'] as $item) : ?>
                    <tr>
                        <td align="center"><?= $no; ?></td>
                        <td align="right"><?= $item['kd_bahan']; ?></td>
                        <td align="right"><?= $item['merk']; ?></td>
                        <td align="right"><?= $item['stok_keluar']; ?>&nbsp;kg</td>
                        <?php $totalstok += intval($item['stok_keluar']) ?>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" align="center"><b>T O T A L</b></td>
                    <td align="right"><b><?= $totalstok; ?>&nbsp;kg</b></td>
                </tr>
                </tbody>
            </table>
            <br>
        </td>
    </tr>
                <?php endif; ?>
                <?php endforeach; ?>
</table>
<script>
    window.print();
</script>
<script src="<?= BASEURL; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASEURL; ?>/vendor/jquery/jquery.min.js"></script>
</body>
</html>