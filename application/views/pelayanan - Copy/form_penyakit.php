<form id="frm_penyakit">
  <span id="success_message"></span>
  <div class="form-group">
     <small class="form-text text-danger" id="kd_penyakit_error" class="text-danger"></small>
       <label>Kode :</label>
          <input type="text"  id="kd_penyakit_add" class="form-control" placeholder="Kode Penyakit" required autocomplete="off">
  </div>

  <div class="form-group">
    <label> Nama Penyakit :</label>
      <input type="text"  id="nama_penyakit_add" class="form-control" placeholder="Nama penyakit" required autocomplete="off">
  </div>
  <div class="col-md-12">
    <button type="button" id="btn_simpan_penyakit" class="btn btn-primary pull-right"><i class="fa fa-save fa-fw"></i> Simpan</button>
    <button type="button" class="btn btn-danger btn-close-form-penyakit"> <i class="fa fa-close fa-fw"></i>Close</button>
  </div>
</form>