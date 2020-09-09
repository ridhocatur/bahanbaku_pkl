<div class="modal fade" id="tampilModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Tambah Satuan</h5>
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
                <label for="level" class="col-sm-3 col-form-label text-md-right">NIK</label>
                <div class="col-md-8">
                    <input id="nik" type="text" class="form-control" name="nik" required autocomplete="nik" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Username</label>
                <div class="col-md-8">
                    <input id="username" type="text" class="form-control" name="username" required autocomplete="username" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Password</label>
                <div class="col-md-8">
                    <input id="password" type="password" class="form-control" name="password" autocomplete="password" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Nama</label>
                <div class="col-md-8">
                    <input id="nama" type="text" class="form-control" name="nama" required autocomplete="nama" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Telepon</label>
                <div class="col-md-8">
                    <input id="telp" type="text" class="form-control" name="telp" autocomplete="telp">
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Level</label>
                <div class="col-md-8">
                    <select class="form-control" name="level" id="level">
                      <option value="">-- Pilih Data --</option>
                      <option value="admin">Admin</option>
                      <option value="manager">Manager</option>
                      <option value="user">User</option>
                      <option value="supplier">Supplier</option>
                    </select>
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