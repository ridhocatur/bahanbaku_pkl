<div class="modal fade" id="tampilModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
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
                <label for="level" class="col-sm-4 col-form-label text-md-right">Invoice</label>
                <div class="col-md-5">
                    <input id="invoice" type="text" class="form-control" name="invoice" required autocomplete="invoice" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-4 col-form-label text-md-right">Supplier</label>
                <div class="col-md-5">
                <select class="form-control" name="id_supplier" id="id_supplier">
                    <option>-- Pilih Supplier --</option>
                    <?php foreach($data2['supplier'] as $data): ?>
                      <option value="<?= $data['id']; ?>"><?= $data['nm_sup']; ?></option>
                    <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-4 col-form-label text-md-right">Tgl. Masuk</label>
                <div class="col-md-5">
                    <input id="tgl" type="date" class="form-control" name="tgl" required autocomplete="tgl" autofocus>
                </div>
            </div>
                        <!--  ROW -->
            <table class="table table-borderless">
                <thead>
                    <tr style="text-align:center">
                        <th style="width: 5%"></th>
                        <th style="width: 30%">Kode Kayu</th>
                        <th style="width: 30%">Stok Masuk</th>
                        <th style="width: 30%">Kubikasi</th>
                        <th style="width: 5%"></th>
                    </tr>
                </thead>
                <tbody id="form-body">
                    <tr style="text-align:center">
                        <td></td>
                        <td>
                            <select class="form-control" name="id_kayu[]" id="id_kayu">
                            <option>-- Pilih Data --</option>
                            <?php foreach($data3['kayu'] as $data): ?>
                            <option value="<?= $data['id']; ?>"><?= $data['kd_kayu']; ?></option>
                            <?php endforeach;?>
                            </select>
                        </td>
                        <td>
                            <input id="jml_stok_kayu" type="text" class="form-control jml_stok_kayu" name="jml_stok_kayu[]" required>
                        </td>
                        <td>
                            <input id="jml_kubik_kayu" type="text" class="form-control jml_kubik_kayu" name="jml_kubik_kayu[]" required autocomplete="kubikasi">
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
                <label for="level" class="col-sm-4 col-form-label text-md-right">Total Stok Masuk</label>
                <div class="col-md-5">
                    <input id="total_stok" type="text" class="form-control" name="total_stok" autocomplete="total_stok" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-4 col-form-label text-md-right">Total Kubikasi</label>
                <div class="col-md-5">
                    <input id="total_kubik" type="text" class="form-control" name="total_kubik" autocomplete="total_kubik" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-4 col-form-label text-md-right">Keterangan</label>
                <div class="col-md-5">
                    <input id="keterangan" type="text" class="form-control" name="keterangan" autocomplete="keterangan" autofocus>
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
<script type ="text/javascript">
function stok_kayu() {
    //Initialize total to 0
    var total = 0;
    $(".jml_stok_kayu").each(function() {
      // Sum only if the text entered is number and greater than 0
      if (!isNaN(this.value) && this.value.length != 0) {
        total += parseFloat(this.value);
      }
    });
    //Assign the total to label
    //.toFixed() method will roundoff the final sum to 2 decimal places
    $('#total_stok').val(total.toFixed(0));
  }
function kubik_kayu() {
  //Initialize total to 0
  var total1 = 0;
  $(".jml_kubik_kayu").each(function() {
    // Sum only if the text entered is number and greater than 0
    if (!isNaN(this.value) && this.value.length != 0) {
      total1 += parseFloat(this.value);
    }
  });
  //Assign the total to label
  //.toFixed() method will roundoff the final sum to 2 decimal places
  $('#total_kubik').val(total1.toFixed(0));
}
	</script>
<script type="text/javascript">
        function add_form()
        {
            var html = '';

            html += '<tr style="text-align:center">';
            html += '<td></td>';
            html += '<td><select class="form-control" name="id_kayu[]" id="id_kayu"><option>-- Pilih Data --</option><?php foreach($data3['kayu'] as $data): ?><option value="<?= $data['id']; ?>"><?= $data['kd_kayu']; ?></option><?php endforeach;?></select></td>';
            html += '<td><input id="jml_stok_kayu" type="text" class="form-control jml_stok_kayu" name="jml_stok_kayu[]" required></td>';
            html += '<td><input id="jml_kubik_kayu" type="text" class="form-control jml_kubik_kayu" name="jml_kubik_kayu[]" required autocomplete="kubikasi"></td>';
            html += '<td><button type="button" class="btn btn-danger" onclick="del_form(this)">-</button></td>';
            html += '</tr>';

            $('#form-body').append(html);
            $('#total_stok').blur( function(){
              stok_kayu();
            });
            $('#total_kubik').blur( function(){
              kubik_kayu();
            });
        }

        function del_form(id)
        {
            id.closest('tr').remove();
            stok_kayu();
            kubik_kayu();
        }
</script>