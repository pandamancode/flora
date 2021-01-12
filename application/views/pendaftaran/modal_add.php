<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-tag fa-fw"></i>&nbsp;Registrasi Pasien Baru</h4>
</div>

<form method="post" action="<?php echo base_url() ?>Pendaftaran/save_pasien" enctype="multipart/form-data">
  <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
    <div class="row">
      <div class="form-group col-md-6">
        <label>NIK :</label>
        <input type="text" name="nik" class="form-control" placeholder="NIK" required autocomplete="off">
      </div>
      <div class="form-group col-md-6">
        <label> Nama Pasien :</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama Pasien" required autocomplete="off">
      </div>
      <div class="form-group col-md-6">
        <label> Tanggal Lahir :</label>
        <input type="date" name="tgl" class="form-control" placeholder="Tanggal Lahir" required autocomplete="off">
      </div>
      <div class="form-group col-md-6">
        <label> Gender :</label>
        <select name="gender" class="form-control" required>
          <option value="" disabled="" selected="">Pilih Gender</option>
          <option value="L">Laki-laki</option>
          <option value="P">Perempuan</option>
        </select>
      </div>

      <div class="form-group col-md-6">
        <label> No.Telp :</label>
        <input type="text" name="no_telp" class="form-control" placeholder="No Telp" required autocomplete="off">
      </div>
      <div class="form-group col-md-6">
        <label> Pekerjaan :</label>
        <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" required autocomplete="off">
      </div>
      <div class="form-group col-md-12">
        <label> Alergi Obat :</label>
        <input type="text" name="alergi_obat" class="form-control" placeholder="Alergi Obat" required
          autocomplete="off">
      </div>
      <div class="form-group col-md-12">
        <label> Alamat :</label>
        <textarea name="alamat" class="form-control" placeholder="Alamat" required autocomplete="off"></textarea>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
    <button type="button" class="btn btn-danger " data-dismiss="modal"> <i class="fa fa-close fa-fw"></i>Close</button>
  </div>
</form>