<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit fa-fw"></i>&nbsp;Register</h4>
</div>

<form method="post" action="<?php echo base_url() ?>pendaftaran/reg_now" enctype="multipart/form-data">
  <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
        
        <div class="form-group">
          <select name="poli" class="form-control" required>
            <option value="" disabled="" selected="">Pilih Poli</option>
            <option value="UMUM">Umum</option>
            <option value="GIGI">Gigi</option>
          </select>
        </div>
        
  </div>
  <div class="modal-footer">
    <input type="hidden" value="<?=$nik?>" name="nik">
    <button type="submit" class="btn btn-primary"><i class="fa fa-edit fa-fw"></i> Register</button>
    <button type="button" class="btn btn-danger " data-dismiss="modal"> <i class="fa fa-close fa-fw"></i>Close</button>
  </div>
</form>