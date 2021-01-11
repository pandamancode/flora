<?php echo $this->session->flashdata('msg'); ?>
<div class='row'>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
			    <h3 class="box-title">Data Pasien</h3>
			    <a href="javascript:;" class="btn-add pull-right"><i class="fa fa-user-plus fa-fw"></i> Tambah Pasien</a>
			 </div>
			<div class="box box-body">
				<div class="table-responsive">
					<table class='table table-striped table-hover' id='tbl'>
						<thead>
							<tr>
								<th width="5%">No</th>
								<th>NIK</th>
								<th>Nama Pasien</th>
								<th>Tgl Lahir</th>
								<th>Gender</th>
								<th>No.Telp</th>
								<th width="8%">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=0; foreach($pasien->result() as $r){ $no++; ?>
							<tr>
								<td><?=$no?></td>
								<td><?=$r->nik?></td>
								<td><?=$r->nama_pasien?></td>
								<td><?=tgl_indo($r->tgl_lahir)?></td>
								<td><?=gender($r->gender)?></td>
								<td><?=$r->no_telp?></td>
								<td>
									<a href="javascript:;" data-id="<?=$r->nik?>" class="btn btn-success btn-xs btn-update"><i class="fa fa-edit"></i></a>
									<a href="javascript:;" data-id="<?=$r->nik?>" class="btn btn-danger btn-xs btn-flat hapus-data" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="tempat-modal"></div>

<div class="modal fade" id="konfirmasiHapus" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
        <h3 style="display:block; text-align:center;">Hapus Data Ini?</h3>
        <form method="post" action="<?php echo base_url() ?>pasien/hapus">
          <input type="hidden" name="id" id="id_">
          <div class="col-md-6">
            <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Ya, Hapus Data Ini</button>
          </div>
          <div class="col-md-6">
            <button class="form-control btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Tidak</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	$('#m_pasien').addClass('active');
	$('#m_master').addClass('active');

	$(function () {
	    $("#tbl").dataTable({
	      "iDisplayLength": 10,
	    });
	});

	$(document).on("click", ".btn-add", function() {
	  var id = $(this).attr("data-id");
	  
	  $.ajax({
	    method: "POST",
	    url: "<?php echo base_url('pasien/modal_add'); ?>",
	    data: "id=" +id
	  })
	  .done(function(data) {
	    $('#tempat-modal').html(data);
	    $('.modal-dialog').attr('class','modal-dialog modal-lg');        
	    $('#md_add').modal('show');
	  })
	})

	$(document).on("click", ".btn-update", function() {
	  var id = $(this).attr("data-id");
	  
	  $.ajax({
	    method: "POST",
	    url: "<?php echo base_url('pasien/modal_update'); ?>",
	    data: "id=" +id
	  })
	  .done(function(data) {
	    $('#tempat-modal').html(data);
	    $('.modal-dialog').attr('class','modal-dialog modal-lg');        
	    $('#md_update').modal('show');
	  })
	})

	$(document).on("click", ".hapus-data", function() {
		id = $(this).attr("data-id");
		$('#id_').val(id);
	})
</script>
