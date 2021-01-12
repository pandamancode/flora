<?php echo $this->session->flashdata('msg'); ?>
<div class='row'>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Data Pasien</h3>
				<a href="javascript:;" class="btn-add pull-right"><i class="fa fa-user-plus fa-fw"></i> Pasien
					Baru&nbsp;</a>
			</div>
			<div class="box box-body">
				<div class="table-responsive">
					<table class='table table-striped table-hover' id='tbl'>
						<thead>
							<tr>
								<th width="5%">No</th>
								<th>NIK</th>
								<th>Nama Pasien</th>
								<th>Gender</th>
								<th>No.Telp</th>
								<td width="8%">Action</td>
							</tr>
						</thead>
						<tbody>
							<?php $no=0; foreach($pasien->result() as $r){ $no++; ?>
							<tr>
								<td><?=$no?></td>

								<td><?=$r->nik?></td>
								<td><?=$r->nama_pasien?></td>
								<td><?=gender($r->gender)?></td>
								<td><?=$r->no_telp?></td>
								<td>
									<a href="<?=base_url()?>pendaftaran/reg_now/<?=$r->nik?>"
										class="btn btn-primary btn-xs btn-block btn-flat btn-social btn-register"><i
											class="fa fa-send-o"></i> Registrasi</a>
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
	$('#m_registrasi').addClass('active');

	$(function () {
		$("#tbl").dataTable({
			"iDisplayLength": 10,
		});
	});

	$(document).on("click", ".btn-add", function () {
		var id = $(this).attr("data-id");

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Pendaftaran/modal_add'); ?>",
				data: "id=" + id
			})
			.done(function (data) {
				$('#tempat-modal').html(data);
				$('.modal-dialog').attr('class', 'modal-dialog modal-lg');
				$('#md_add').modal('show');
			})
	})

	$(document).on("click", ".btn-update", function () {
		var id = $(this).attr("data-id");

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Pendaftaran/modal_update'); ?>",
				data: "id=" + id
			})
			.done(function (data) {
				$('#tempat-modal').html(data);
				$('.modal-dialog').attr('class', 'modal-dialog modal-lg');
				$('#md_update').modal('show');
			})
	})

	$(document).on("click", ".btn-register", function () {
		var id = $(this).attr("data-id");

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Pendaftaran/modal_register'); ?>",
				data: "id=" + id
			})
			.done(function (data) {
				$('#tempat-modal').html(data);
				$('.modal-dialog').attr('class', 'modal-dialog modal-xs');
				$('#md_register').modal('show');
			})
	})
</script>