<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-tag fa-fw"></i> Tambah Data Obat</h4>
</div>

<form method="post" action="<?php echo base_url() ?>Obat/store" enctype="multipart/form-data">
  <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
  <!--Cek Data-->
     
      <div class="form-group">
          <label> Kode Obat :</label>
          <input type="text"  name="kode" class="form-control" placeholder="Kode Obat" required autocomplete="off">          
      </div>
      <div class="form-group">
        <label> Nama Obat :</label>
          <input type="text"  name="nama" class="form-control" placeholder="Nama Obat" required autocomplete="off">
      </div>
      <div class="form-group">
        <label> Harga Obat :</label>
          <input type="text"  name="harga" class="form-control" placeholder="Harga Obat" required autocomplete="off" value="0">
      </div>
      <div class="form-group">
        <label> Jenis Obat :</label>
        <select class="form-control" name="jenis">
          <option value="obat">Obat</option>
          <option value="non-obat">Non Obat</option>
          <option value="BMHP">BMHP</option>
        </select>
      </div>

  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
    <button type="button" class="btn btn-danger " data-dismiss="modal"> <i class="fa fa-close fa-fw"></i>Close</button>
  </div>
</form>