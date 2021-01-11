<div class="modal-header" style="background-color:#3c8dbc; color:white;">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Data Penyakit</strong></h4>
</div>
<div class="modal-body">
    <table class="table table-striped table-hover" id="tbl_penyakit">
      <thead>
          <tr>
              <th width="5%">No</th>
              <th>Nama Penyakit</th>
              <th width="5%">Action</th>
          </tr>
      </thead>
      <tbody>
        <?php $no=0;foreach($penyakit->result() as $r){ $no++; ?>
          <tr>
              <td><?=$no?></td>
              <td><?=$r->nama_penyakit?></td>
              <td><a href="<?=base_url()?>Pelayanan/pilih_penyakit/<?=$r->kd_penyakit?>/<?=$no_invoice?>" title='Pilih Petugas' class='btn btn-primary btn-xs btn-flat'><i class='fa fa-check-square-o'></i> Pilih</a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
</div>

<script type="text/javascript">
  $(function () {
      $("#tbl_penyakit").dataTable({
        "iDisplayLength": 10,
      });
  });
</script>