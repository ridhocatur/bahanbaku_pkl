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
                <label for="level" class="col-sm-3 col-form-label text-md-right">Kode Kayu</label>
                <div class="col-md-8">
                <select class="form-control" name="id_kayu" id="id_kayu">
                    <option>-- Pilih Data --</option>
                    <?php foreach($data2['kayu'] as $data): ?>
                      <option value="<?= $data['id']; ?>"><?= $data['kd_kayu']; ?></option>
                    <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Tanggal Masuk</label>
                <div class="col-md-8">
                    <input id="tgl" type="date" class="form-control" name="tgl" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Jenis & Ukuran</label>
                <div class="col-md-8">
                    <select class="form-control" name="id_vinir" id="id_vinir">
                      <option>-- Pilih Data --</option>
                      <?php foreach($data2['vinir'] as $data): ?>
                        <option value="<?= $data['id']; ?>"><?= $data['kd_jenis']; ?>,&nbsp;<?= $data['ukuran']; ?> mm</option>
                      <?php endforeach;?>
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
                    <input id="kubikasi" type="text" class="form-control" name="kubikasi" autocomplete="kubikasi">
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Pemakaian Log</label>
                <div class="col-md-8">
                    <input id="kayu_log" type="text" class="form-control" name="kayu_log" autocomplete="kayu_log">
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