<div class="modal fade" id="tampilModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Tambah Data Gluemix</h5>
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
                <label for="level" class="col-sm-3 col-form-label text-md-right">Tanggal</label>
                <div class="col-md-8">
                    <input id="tgl" type="date" class="form-control" name="tgl" required autocomplete="tgl" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Jenis Lem</label>
                <div class="col-md-8">
                  <select class="form-control" name="tipe_glue" id="tipe_glue">
                    <option value="">-- Pilih Data --</option>
                    <option value="Type-1 Melamine">Type-1 Melamine</option>
                    <option value="Type-2 LFE">Type-2 LFE</option>
                  </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 text-md-right">Shift</label>
                <div class="col-md-4">
                  <label class="radio-inline"><input type="radio" name="shift" id="shift" value="1"> 1 (Satu) </label>
                  <label class="radio-inline"><input type="radio" name="shift" id="shift" value="2"> 2 (Dua) </label>
                </div>
            </div>

            <table class="table table-borderless">
                <thead>
                    <tr style="text-align:center">
                        <th style="width: 10%"></th>
                        <th style="width: 36%">Jenis & Ukuran</th>
                        <th style="width: 20%">Stok Keluar</th>
                        <th style="width: 20%">Kubikasi</th>
                        <th style="width: 10%"></th>
                    </tr>
                </thead>
                <tbody id="form-body">
                    <tr style="text-align:center">
                        <td></td>
                        <td>
                            <select class="form-control" name="id_vinir[]" id="id_vinir">
                              <option>-- Pilih Data --</option>
                              <?php foreach($data2['vinir'] as $data): ?>
                                <option value="<?= $data['id']; ?>"><?= $data['kd_jenis']; ?>,&nbsp;<?= $data['ukuran']; ?> mm</option>
                              <?php endforeach;?>
                            </select>
                        </td>
                        <td>
                            <input id="vinir_stok_keluar" type="text" class="form-control vinir_stok_keluar" name="vinir_stok_keluar[]" required>
                        </td>
                        <td>
                            <input id="kubik_keluar" type="text" class="form-control kubik_keluar" name="kubik_keluar[]" required autocomplete="kubikasi">
                        </td>
                        <td>
                            <div class="input-group-btn">
                            <button class="btn btn-success" onclick="add_form()" type="button">+</button>
                        </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Total Stok Keluar</label>
                <div class="col-md-8">
                    <input id="total_stok" type="text" class="form-control" name="total_stok" autocomplete="total_stok" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Total Kubikasi</label>
                <div class="col-md-8">
                    <input id="total_kubik" type="text" class="form-control" name="total_kubik" autocomplete="total_kubik" value="">
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
        <button type="button" class="btn btn-secondary keluar" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
      </div>
    </div>
  </div>
</div>
<script type ="text/javascript">
function calc_stok() {
    //Initialize total to 0
    var total = 0;
    $(".vinir_stok_keluar").each(function() {
      // Sum only if the text entered is number and greater than 0
      if (!isNaN(this.value) && this.value.length != 0) {
        total += parseFloat(this.value);
      }
    });
    //Assign the total to label
    //.toFixed() method will roundoff the final sum to 2 decimal places
    $('#total_stok').val(total.toFixed(0));
  }
function calc_kubik() {
  //Initialize total to 0
  var total1 = 0;
  $(".kubik_keluar").each(function() {
    // Sum only if the text entered is number and greater than 0
    if (!isNaN(this.value) && this.value.length != 0) {
      total1 += parseFloat(this.value);
    }
  });
  //Assign the total to label
  //.toFixed() method will roundoff the final sum to 2 decimal places
  $('#total_kubik').val(total1.toFixed(2));
}
	</script>
<script type="text/javascript">
        function add_form()
        {
            var html = '';

            html += '<tr style="text-align:center">';
            html += '<td></td>';
            html += '<td><select class="form-control" name="id_vinir[]" id="id_vinir"><option>-- Pilih Data --</option><?php foreach($data2['vinir'] as $data): ?><option value="<?= $data['id']; ?>"><?= $data['kd_jenis']; ?>,&nbsp;<?= $data['ukuran']; ?> mm</option><?php endforeach;?></select></td>';
            html += '<td><input id="vinir_stok_keluar" type="text" class="form-control vinir_stok_keluar" name="vinir_stok_keluar[]" required></td>';
            html += '<td><input id="kubik_keluar" type="text" class="form-control kubik_keluar" name="kubik_keluar[]" required autocomplete="kubikasi"></td>';
            html += '<td><button type="button" class="btn btn-danger" onclick="del_form(this)">-</button></td>';
            html += '</tr>';

            $('#form-body').append(html);
            $('#total_stok').blur( function(){
              calc_stok();
            });
            $('#total_kubik').blur( function(){
              calc_kubik();
            });
        }

        function del_form(id)
        {
            id.closest('tr').remove();
            calc_stok();
            calc_kubik();
        }
</script>
