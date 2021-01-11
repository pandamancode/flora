<form id="frm">
  <span id="success_message"></span>
  <div class="form-group">
     <small class="form-text text-danger" name="kd_obat_error" id="kd_obat_error" class="text-danger"></small>
      <label> Kode Obat :</label>
      <input type="text" id="kd_obat1" class="form-control" placeholder="Kode Obat" required autocomplete="off">          
  </div>
  <div class="form-group">
    <label> Nama Obat :</label>
      <input type="text"  id="nama_obat1" class="form-control" placeholder="Nama Obat" required autocomplete="off">
  </div>
  <div class="form-group">
    <label> Harga Obat :</label>
      <input type="text"  id="harga_obat" class="form-control" placeholder="Harga Obat" required autocomplete="off" value="0">
  </div>
  <div class="form-group">
    <label> Jenis Obat :</label>
    <select class="form-control" id="jenis">
      <option value="obat">Obat</option>
      <option value="non-obat">Non Obat</option>
      <option value="BMHP">BMHP</option>
    </select>
  </div>
  <button type="button" id="btn_simpan_obat" class="btn btn-primary pull-right"><i class="fa fa-save fa-fw"></i> Simpan</button>
  <button type="button" class="btn btn-danger btn-close-form"> <i class="fa fa-close fa-fw"></i>Close</button>
</form>