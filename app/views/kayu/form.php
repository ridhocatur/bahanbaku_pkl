<div class="modal fade" id="tampilModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Tambah Data Kayu</h5>
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
                <label for="level" class="col-sm-3 col-form-label text-md-right">Kode Log</label>
                <div class="col-md-8">
                    <input id="kd_kayu" type="text" class="form-control" name="kd_kayu" required autocomplete="kd_kayu" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Jenis Kayu</label>
                <div class="col-md-8">
                <select class="form-control" name="kd_jenis" id="kd_jenis">
                  <option value="">-- Pilih Data --</option>
                  <?php foreach($data2['jenis'] as $data): ?>
                    <option value="<?= $data['kd_jenis']; ?>"><?= $data['nama']; ?></option>
                  <?php endforeach; ?>
                </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Stok</label>
                <div class="col-md-8">
                    <input id="stok" type="text" class="form-control" name="stok" required autocomplete="stok">
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Kubikasi</label>
                <div class="col-md-8">
                    <input id="kubikasi" type="text" class="form-control" name="kubikasi" required austocomplete="kubikasi">
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