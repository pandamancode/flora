<div id="respon1"><?php echo $this->session->flashdata('msg'); ?></div>
<div class='row'>
	<div class='col-md-12'>
		<div class="box box-primary">
			<div class="panel-heading">
				<i class='fa fa-lock fa-fw'></i> Master <i class='fa fa-angle-right fa-fw'></i> Akun pengguna <i class='fa fa-angle-right fa-fw'></i>
				<a href="#" class="btn-add pull-right"><i class="fa fa-plus fa-fw"></i> Tambah&nbsp;</a>
			</div>
			<div class="box box-body">

				<div class="table-responsive">
				<table class='table table-striped table-hover' id='tbl'>
				<thead>
					<tr>
						<th width="5%">#</th>
						<th>NIK / Username</th>
						<th>Nama</th>
						<th>Gender</th>
						<th>Level</th>
						<th width="10%">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no =0;
						foreach($petugas->result() as $r){
							$no++;							
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $r->nik_petugas ?></td>
							<td><?php echo $r->nama_petugas ?></td>
							<td><?php echo gender($r->gender) ?></td>
							<td><?php echo $r->level_user ?></td>
							<td>
								<a href="<?=base_url()?>akun/reset/<?php echo $r->nik_petugas ?>" class="btn btn-primary btn-flat btn-xs btn-update btn-block"> <i class="fa fa-key fa-fw" style="color:#ffffff;"></i> <span style="color:#ffffff;"> Ubah Password &nbsp;</span></a>
								<a onclick="return confirm('Yakin Ingin Menghapus Akun?');" href="<?=base_url()?>akun/hapus_akun/<?php echo $r->nik_petugas ?>" class="btn btn-danger btn-flat btn-xs btn-block"><i class="fa fa-trash fa-fw" style="color:#ffffff;"></i>  <span style="color:#ffffff;"> Hapus Akun</span></a>
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

<script type="text/javascript">
	setTimeout(function() {document.getElementById('respon1').innerHTML='';},2000);

	$('#m_akun').addClass('active');
	$('#m_master').addClass('active');

	$(function () {
	    $("#tbl").dataTable({
	      "iDisplayLength": 10,
	    });
	});

	// Simpan Data
	$(document).on("click", ".btn-add", function() {
	  var id = $(this).attr("data-id");
	  
	  $.ajax({
	    method: "POST",
	    url: "<?php echo base_url('Akun/add'); ?>",
	    data: "id=" +id
	  })
	  .done(function(data) {
	    $('#tempat-modal').html(data);        
	    $('#md_add').modal('show');
	  })
	})
</script>