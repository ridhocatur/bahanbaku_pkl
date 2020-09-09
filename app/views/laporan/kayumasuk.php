<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $data['judul']; ?></h1>
<div class="card shadow mb-4">
<div class="card-body col-md-5">
    <form action="<?= BASEURL; ?>/laporan/laporankayumasuk" method="POST">
    <div class="form-group tglawal">
        <label>Tanggal Awal</label>
        <div class="input-group">
            <input id="datepicker1" type="text" class="form-control" placeholder="Tanggal 1" name="tgl_awal">
        </div>
    </div>
    <br>
    <div class="form-group tglakhir">
        <label>Tanggal Akhir</label>
        <div class="input-group">
            <input id="datepicker2" type="text" class="form-control" placeholder="Tanggal 2" name="tgl_akhir">
        </div>
    </div>
    <br>
    <div class="form-group supplier">
        <label>Supplier</label>
        <select class="form-control" name="id_supplier" id="id_supplier">
            <option value="">-- Pilih Supplier --</option>
            <?php foreach($data['supplier'] as $data): ?>
              <option value="<?= $data['id']; ?>"><?= $data['nm_sup']; ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <button type="submit" class="btn btn-success tombolcetak" formtarget="_blank">Tampilkan</button>
    <button type="button" class="btn btn-danger clearForm">Clear</button>
    </form>
    <p><h7>*kosongkan untuk tampil semua data</h7></p>
    </div>
</div>