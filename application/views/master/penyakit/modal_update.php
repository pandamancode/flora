<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-tag fa-fw"></i> Edit Data penyakit</h4>
</div>

<form method="post" action="<?php echo base_url() ?>penyakit/update_process">
  <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">

      <div class="form-group">
          <label> Nama penyakit :</label>
          <input type="text"  name="nama" value="<?=$penyakit->nama_penyakit?>" class="form-control" required autocomplete="off">
      </div>

  </div>
  <div class="modal-footer">
    <input type="hidden" name="id" value="<?php echo $penyakit->kd_penyakit; ?>">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
    <button type="button" class="btn btn-danger " data-dismiss="modal"> <i class="fa fa-close fa-fw"></i>Close</button>
  </div>
</form>