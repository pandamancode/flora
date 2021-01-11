<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-tag fa-fw"></i> Edit Data Obat</h4>
</div>

<form method="post" action="<?php echo base_url() ?>Obat/update_process">
  <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">

      <div class="form-group">
          <label> Nama Obat :</label>
          <input type="text"  name="nama" value="<?=$obat->nama_obat?>" class="form-control" required autocomplete="off">
      </div> 
      <div class="form-group">
        <label> Harga Obat :</label>
          <input type="text"  name="harga" class="form-control" required autocomplete="off" value="<?=$obat->harga_obat?>">
      </div>
      <div class="form-group">
        <label> Jenis Obat :</label>
        <select class="form-control" name="jenis">
          <option value="obat" <?php if($obat->jenis=='obat'){ echo "selected"; } ?> >Obat</option>
          <option value="non-obat" <?php if($obat->jenis=='non-obat'){ echo "selected"; } ?> >Non Obat</option>
          <option value="BMHP" <?php if($obat->jenis=='BMHP'){ echo "selected"; } ?> >BMHP</option>
        </select>
      </div>

  </div>
  <div class="modal-footer">
    <input type="hidden" name="id" value="<?php echo $obat->kd_obat; ?>">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
    <button type="button" class="btn btn-danger " data-dismiss="modal"> <i class="fa fa-close fa-fw"></i>Close</button>
  </div>
</form>