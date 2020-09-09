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
                <label for="level" class="col-sm-3 col-form-label text-md-right">Invoice</label>
                <div class="col-md-8">
                    <input id="invoice" type="text" class="form-control" name="invoice" required autocomplete="invoice" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Tgl. Masuk</label>
                <div class="col-md-8">
                    <input id="tgl" type="date" class="form-control" name="tgl" required autocomplete="tgl" autofocus>
                </div>
            </div>

            <div class="form-group row">
              <label for="level" class="col-sm-3 col-form-label text-md-right">Jenis Bahan</label>
              <div class="col-md-8">
                <select class="form-control" name="id_bahan" id="id_bahan">
                  <option value="0">-- Pilih Bahan --</option>
                  <?php foreach($data2['bantu'] as $data): ?>
                    <option value="<?= $data['id']; ?>"><?= $data['kd_bahan']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Nama Bahan</label>
                <div class="col-md-8">
                    <input id="nama" type="text" class="form-control" name="nama" required autocomplete="nama">
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Stok Masuk</label>
                <div class="col-md-8">
                    <input id="stok_masuk" type="text" class="form-control" name="stok_masuk" required autocomplete="stok_masuk">
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Keterangan</label>
                <div class="col-md-8">
                    <input id="keterangan" type="text" class="form-control" name="keterangan" autocomplete="keterangan">
                </div>
            </div>
        </div>

        <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Supplier</label>
                <div class="col-md-8">
                <select class="form-control" name="id_supplier" id="id_supplier">
                  <option value="">-- Pilih Data --</option>
                  <?php foreach($data2['suppbahan'] as $data): ?>
                    <option value="<?= $data['id']; ?>"><?= $data['nm_sup']; ?></option>
                  <?php endforeach; ?>
                </select>
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
