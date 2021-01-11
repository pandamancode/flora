
<form id="frm_pasien">
  <!-- <div class="row"> -->
  <span id="success_message"></span>
  <div class="form-group col-md-6">
     <small class="form-text text-danger" id="nik_error" class="text-danger"></small>
       <label>NIK :</label>
          <input type="text"  id="nik_pasien_add" class="form-control" placeholder="NIK" required autocomplete="off">
  </div>

  <div class="form-group col-md-6">
    <label> Nama Pasien :</label>
      <input type="text"  id="nama_pasien_add" class="form-control" placeholder="Nama Pasien" required autocomplete="off">
  </div>
  <!-- <div class="row"> -->
    <div class="form-group col-md-6">
      <label> Tanggal Lahir :</label>
      <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= date("Y-m-d");?>">
    </div>     

    <div class="form-group col-md-6">
      <label>Jenis&nbsp;Kelamin :</label>
      <select class="form-control" name="jenis" id="jenis">
        <option value="L">Laki Laki</option>
        <option value="P">Perempuan</option>
      </select>
    </div>
  <!-- </div> -->
  <div class="form-group  col-md-6">
    <label>No&nbsp;Telpon</label>
    <input type="text" id="telp" class="form-control">
  </div>
  <div class="form-group col-md-6">
    <label>Alamat :</label>
    <textarea class="form-control" rows="4" id="alamat"></textarea>
  </div>
 <!-- </div> -->
  <div class="col-md-12">
  <button type="button" id="btn_simpan_pasien" class="btn btn-primary pull-right"><i class="fa fa-save fa-fw"></i> Simpan</button>
  <button type="button" class="btn btn-danger btn-close-form"> <i class="fa fa-close fa-fw"></i>Close</button>
  </div>
</form>
