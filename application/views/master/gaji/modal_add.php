<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-tag fa-fw"></i>&nbsp;Tambah Data Nama Tugas dan Gaji</h4>
</div>
<!-- <div class="col-md-12">
    <?php //echo $this->session->flashdata('msg'); ?>
</div> -->
<form method="post" action="<?php echo base_url() ?>Itemgaji/store" enctype="multipart/form-data">
  <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
      <div class="row">
        <div class="form-group col col-md-5">
          <label>Kode :</label>
          <input type="text"  name="kd_item_gaji" class="form-control" placeholder="Kode" required autocomplete="off">          
        </div>
        <div class="form-group col col-md-7">
          <label> Nama Tugas :</label>
          <input type="text"  name="nama_item_gaji" class="form-control" placeholder="Nama Tugas / Tindakan" required autocomplete="off">
        </div>
        <div class="form-group col col-md-12">
          <label> Biaya :</label>
          <input type="number"  name="biaya" class="form-control" placeholder="Biaya" required autocomplete="off">
        </div>
      </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
    <button type="button" class="btn btn-danger " data-dismiss="modal"> <i class="fa fa-close fa-fw"></i>Close</button>
  </div>
</form>