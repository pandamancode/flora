<form id="frm_petugas">
  <div class="row">
  <span id="success_message"></span>
  <div class="form-group col col-md-6">
     <small class="form-text text-danger" id="nik_petugas_error" class="text-danger"></small>
       <label>NIK&nbsp;Petugas :</label>
          <input type="text"  id="nik_petugas_add" class="form-control" placeholder="NIK Petugas" required autocomplete="off">
  </div>

  <div class="form-group col col-md-6">
    <label> Nama petugas :</label>
      <input type="text"  id="nama_petugas_add" class="form-control" placeholder="Nama petugas" required autocomplete="off">
  </div>
  <div class="form-group col col-md-6">
    <label> Status :</label>
    <select class="form-control" id="status">
      <option value="PERAWAT">Perawat</option>
      <option value="DOKTER">Dokter</option>            
      <option value="KASIR">Kasir</option>
    </select>
  </div>
  <div class="form-group col col-md-6">
    <label>Jenis&nbsp;Kelamin :</label>
    <select class="form-control" id="gender">
      <option value="L">Laki Laki</option>
      <option value="P">Perempuan</option>
    </select>
  </div>
  <div class="form-group col col-md-6">
    <label>No&nbsp;Telpon</label>
    <input type="text" id="no_telp" class="form-control">
  </div>
  <div class="form-group col col-md-6">
    <label>Alamat :</label>
    <textarea class="form-control" rows="4" id="alamat_petugas"></textarea>
  </div>
  <br>
  </div> 
    <button type="button" id="btn_simpan_petugas" class="btn btn-primary pull-right"><i class="fa fa-save fa-fw"></i> Simpan</button>
    <button type="button" class="btn btn-danger btn-close-form-petugas"> <i class="fa fa-close fa-fw"></i>Close</button>
</form>