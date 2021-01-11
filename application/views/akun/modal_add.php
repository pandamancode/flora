<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-tag fa-fw"></i>&nbsp;Tambah Data Pengguna</h4>
</div>

<form method="post" action="<?php echo base_url() ?>Akun/store" enctype="multipart/form-data">
  <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
      <div class="form-group">
          <label>Pegawai / Petugas :</label>
          <select name="pegawai" class="form-control" required>
            <option value="" selected="" disabled="">Pilih Pegawai</option>
            <?php foreach($pegawai->result() as $r){ ?>
            <option value="<?=$r->nik_petugas?>"><?=$r->nama_petugas?> - <?=$r->nik_petugas?></option>
            <?php } ?>
          </select>         
      </div>

      <div class="form-group">
        <label>Password :</label>
          <input type="password"  name="password" class="form-control" placeholder="Password" required autocomplete="off">
      </div>

      <div class="form-group">
        <label>Level User :</label>
        <select class="form-control" name="level" required>
          <option value="" disabled="" selected="">Pilih Level</option>
          <option value="PENDAFTARAN">Pendaftaran</option>
          <option value="PELAYANAN">Pelayanan</option>            
          <option value="ADMIN">Admin/Kasir</option>
          <option value="OWNER">Owner</option>
        </select>
      </div>     

  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
    <button type="button" class="btn btn-danger " data-dismiss="modal"> <i class="fa fa-close fa-fw"></i>Close</button>
  </div>
</form>