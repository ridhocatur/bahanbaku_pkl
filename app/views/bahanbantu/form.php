<div class="modal fade" id="ModalBahan" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" id="formModal">
      <input type="hidden" name="id" id="id">
        <div class="box-body">
            <p></p>
            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Kode Bahan</label>
                <div class="col-md-8">
                    <input id="kd_bahan" type="text" class="form-control" name="kd_bahan" required autocomplete="kd_bahan" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Nama Bahan</label>
                <div class="col-md-8">
                    <input id="nama" type="text" class="form-control" name="nama" required autocomplete="nama" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Merk</label>
                <div class="col-md-8">
                    <input id="merk" type="text" class="form-control" name="merk" required autocomplete="merk" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Stok</label>
                <div class="col-md-8">
                    <input id="stok" type="number" class="form-control" name="stok" require autocomplete="stok">
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Kategori</label>
                <div class="col-md-8">
                <select class="form-control" name="id_kategori" id="id_kategori">
                  <option value="">-- Pilih Data --</option>
                  <?php foreach($data2['kategori'] as $data): ?>
                    <option value="<?= $data['id']; ?>"><?= $data['nm_kateg']; ?></option>
                  <?php endforeach; ?>
                </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Keterangan</label>
                <div class="col-md-8">
                    <input id="keterangan" type="text" class="form-control" name="keterangan" autocomplete="keterangan">
                </div>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
      </div>
    </div>
  </div>
</div>