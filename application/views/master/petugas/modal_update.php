<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-tag fa-fw"></i> Edit Data Petugas</h4>
</div>

<form method="post" action="<?php echo base_url() ?>Petugas/update_process">
  <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">

      <div class="form-group">
          <label> Nama petugas :</label>
          <input type="text"  name="nama" value="<?=$petugas->nama_petugas?>" class="form-control" required autocomplete="off">
      </div> 
      
      <div class="row">
        <div class="form-group col col-md-6">
          <label> Status :</label>
          <select class="form-control" name="status" required>
            <option value="" disabled="" selected="">Pilih Status</option>
            <option value="PERAWAT" <?php if($petugas->status=='PERAWAT'){ echo "selected"; } ?> >Perawat</option>
            <option value="DOKTER" <?php if($petugas->status=='DOKTER'){ echo "selected"; } ?> >Dokter</option>            
            <option value="APOTEKER" <?php if($petugas->status=='APOTEKER'){ echo "selected"; } ?> >Apoteker</option>
          </select>
        </div>     

        <div class="form-group col col-md-6">
          <label>Jenis&nbsp;Kelamin :</label>
          <select class="form-control" name="jenis" required>
            <option value="" disabled="" selected="">Pilih Gender</option>
            <option value="L" <?php if($petugas->gender=='L'){ echo "selected"; } ?> >Laki Laki</option>
            <option value="P" <?php if($petugas->gender=='P'){ echo "selected"; } ?> >Perempuan</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label>No&nbsp;Telpon</label>
        <input type="text" name="telp" class="form-control" value="<?=$petugas->no_telp?>">
      </div>
      <div class="form-group">
        <label>Alamat :</label>
        <textarea class="form-control" rows="3" name="alamat"><?=$petugas->alamat?></textarea>
      </div>

  </div>
  <div class="modal-footer">
    <input type="hidden" name="id" value="<?php echo $petugas->nik_petugas; ?>">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
    <button type="button" class="btn btn-danger " data-dismiss="modal"> <i class="fa fa-close fa-fw"></i>Close</button>
  </div>
</form>