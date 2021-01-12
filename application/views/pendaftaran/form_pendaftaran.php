<?php echo $this->session->flashdata('msg'); ?>
<div class='row'>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Data Registrasi <b style="color:red;"><?=tgl_indo(date('Y-m-d'))?></b></h3>
				<a href="<?=base_url()?>pendaftaran/pasien_reg" class="btn-add pull-right"><i
						class="fa fa-edit fa-fw"></i> Registrasi Pasien&nbsp;</a>
			</div>
			<div class="box box-body">
				<div class="table-responsive">
					<table class='table table-striped table-hover' id='tbl'>
						<thead>
							<tr>
								<th width="5%">#</th>
								<th>No. Registrasi</th>
								<th>NIK</th>
								<th>Nama Pasien</th>
								<th>Gender</th>
								<th>No.Telp</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=0; foreach($reg_pasien->result() as $r){ $no++; 
								if($r->status=='selesai'){
									$status = "<span class='label label-success'><i class='fa fa-check-circle'></i> Selesai</span>";
								}else{
									$status = "<span class='label label-info'><i class='fa fa-spinner fa-spin'></i> Dalam Antrian</span>";
								}
							?>
							<tr>
								<td><?=$no?></td>
								<td><span style="color: red;"><strong><?=$r->no_registrasi?></strong></span></td>
								<td><?=$r->nik?></td>
								<td><?=$r->nama_pasien?></td>
								<td><?=gender($r->gender)?></td>
								<td><?=$r->no_telp?></td>
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
	$('#m_reg_poliumum').addClass('active');
	$('#m_poliumum').addClass('active');

	$(function () {
		$("#tbl").dataTable({
			"iDisplayLength": 10,
			"order": [
				[5, "asc"]
			]
		});
	});

	$(document).on("click", ".btn-pasien", function () {
		var id = $(this).attr("data-id");

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Pendaftaran/data_pasien'); ?>",
				data: "id=" + id
			})
			.done(function (data) {
				$('#tempat-modal').html(data);
				$('.modal-dialog').attr('class', 'modal-dialog modal-lg');
				$('#md_pasien').modal('show');
			})
	})
</script>