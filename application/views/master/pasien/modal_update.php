<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-tag fa-fw"></i>&nbsp;Update Data Pasien</h4>
</div>

<form method="post" action="<?php echo base_url() ?>pasien/update_pasien" enctype="multipart/form-data">
  <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
    <div class="row">
      <div class="form-group col-md-6">
        <label>NIK :</label>
        <input type="text" value="<?=$pasien->nik?>" name="nik" class="form-control" placeholder="NIK" readonly
          autocomplete="off">
      </div>
      <div class="form-group col-md-6">
        <label> Nama Pasien :</label>
        <input type="text" value="<?=$pasien->nama_pasien?>" name="nama" class="form-control" placeholder="Nama Pasien"
          required autocomplete="off">
      </div>
      <div class="form-group col-md-4">
        <label> Tanggal Lahir :</label>
        <input type="date" value="<?=$pasien->tgl_lahir?>" name="tgl" class="form-control" placeholder="Tanggal Lahir"
          required autocomplete="off">
      </div>
      <div class="form-group col-md-4">
        <label> Gender :</label>
        <select name="gender" class="form-control" required>
          <option value="" disabled="" selected="">Pilih Gender</option>
          <option value="L" <?php if($pasien->gender=='L'){ echo "selected"; } ?>>Laki-laki</option>
          <option value="P" <?php if($pasien->gender=='P'){ echo "selected"; } ?>>Perempuan</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label> No.Telp :</label>
        <input type="text" value="<?=$pasien->no_telp?>" name="no_telp" class="form-control" placeholder="No Telp"
          required autocomplete="off">
      </div>
      <div class="form-group col-md-6">
        <label> Alamat :</label>
        <input type="text" name="alamat" class="form-control" value="<?=$pasien->alamat?>" placeholder="Alamat" required
          autocomplete="off">
      </div>
      <div class="form-group col-md-6">
        <label> Status Pasien :</label>
        <select name="status_pasien" id="status_pasien" class="form-control" required>
          <option value="" selected="" disabled="">Pilih</option>
          <option value="UMUM" <?php if($pasien->status_pasien=='UMUM'){ echo 'selected'; } ?>>UMUM</option>
          <option value="KHUSUS" <?php if($pasien->status_pasien=='KHUSUS'){ echo 'selected'; } ?>>KHUSUS</option>
        </select>
      </div>
      <div class="form-group col-md-6 khusus">
        <label> Instansi :</label>
        <input type="text" name="instansi" value="<?=$pasien->instansi?>" class="form-control" placeholder="Instansi"
          required autocomplete="off">
      </div>
      <div class="form-group col-md-6 khusus">
        <label> Satuan Kerja :</label>
        <input type="text" name="satuan_kerja" value="<?=$pasien->satuan_kerja?>" class="form-control"
          placeholder="Satuan Kerja" required autocomplete="off">
      </div>
      <div class="form-group col-md-6 khusus">
        <label> Bagian :</label>
        <input type="text" name="bagian" value="<?=$pasien->bagian?>" class="form-control" placeholder="Bagian" required
          autocomplete="off">
      </div>
      <div class="form-group col-md-6 khusus">
        <label> Pangkat :</label>
        <input type="text" name="pangkat" value="<?=$pasien->pangkat?>" class="form-control" placeholder="Pangkat"
          required autocomplete="off">
      </div>

    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
    <button type="button" class="btn btn-danger " data-dismiss="modal"> <i class="fa fa-close fa-fw"></i>Close</button>
  </div>
</form>

<script>
  $(".khusus").attr('style', 'display:none');

  $('#status_pasien').on('change', function () {
    if (this.value == "KHUSUS") {
      $(".khusus").attr('style', 'display:block');
      document.getElementById("instansi").focus();
    } else {
      $(".khusus").attr('style', 'display:none');
    }
  });
</script>