<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-tag fa-fw"></i> Edit Data penyakit</h4>
</div>

<form method="post" action="<?php echo base_url() ?>Itemgaji/update_process">
  <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">

      <div class="form-group">
          <label> Nama Tugas / Tindakan :</label>
          <input type="text"  name="nama_item_gaji" value="<?=$itemgaji->nama_item_gaji?>" class="form-control" required autocomplete="off">
      </div>

      <div class="form-group">
          <label> Biaya :</label>
          <input type="number"  name="biaya" value="<?=$itemgaji->biaya?>" class="form-control" placeholder="Biaya" required autocomplete="off">
        </div>

  </div>
  <div class="modal-footer">
    <input type="hidden" name="id" value="<?php echo $itemgaji->kd_item_gaji; ?>">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
    <button type="button" class="btn btn-danger " data-dismiss="modal"> <i class="fa fa-close fa-fw"></i>Close</button>
  </div>
</form>