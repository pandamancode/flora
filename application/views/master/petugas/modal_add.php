<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-tag fa-fw"></i>&nbsp;Tambah Data Petugas</h4>
</div>

<form method="post" action="<?php echo base_url() ?>petugas/store" enctype="multipart/form-data">
  <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
  <!--Cek Data-->
     
      <div class="form-group">
          <label>NIK :</label>
          <input type="text"  name="kode" class="form-control" placeholder="Kode petugas" required autocomplete="off">          
      </div>
      <div class="form-group">
        <label> Nama petugas :</label>
          <input type="text"  name="nama" class="form-control" placeholder="Nama petugas" required autocomplete="off">
      </div>
      <div class="row">
        <div class="form-group col col-md-6">
          <label> Status :</label>
          <select class="form-control" name="status">
            <option value="" disabled="" selected="">Pilih Status</option>
            <option value="PERAWAT">Perawat</option>
            <option value="DOKTER">Dokter</option>            
            <option value="APOTEKER">Apoteker</option>
          </select>
        </div>     

        <div class="form-group col col-md-6">
          <label>Gender :</label>
          <select class="form-control" name="jenis" required="">
            <option value="" disabled="" selected="">Pilih Gender</option>
            <option value="L">Laki Laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label>No&nbsp;Telpon</label>
        <input type="text" name="telp" class="form-control">
      </div>
      <div class="form-group">
        <label>Alamat :</label>
        <textarea class="form-control" rows="3" name="alamat"></textarea>
      </div>

  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
    <button type="button" class="btn btn-danger " data-dismiss="modal"> <i class="fa fa-close fa-fw"></i>Close</button>
  </div>
</form>