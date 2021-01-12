<div class="box box-primary">
	<div class="panel-heading">
		<i class='fa fa-list-alt fa-fw'></i> Identitas Pasien</strong>
	</div>
	<div class="box box-body">
		<div class="table-responsive">
			<table class='table table-striped' id='tbl'>
				<tbody>
					<tr>
						<td>No. MCU</td>
						<td>: <?=$pasien->row()->no_mcu?></td>
					</tr>
					<tr>
						<td>NIK / NRP</td>
						<td>: <?=$pasien->row()->nik?></td>
					</tr>
					<tr>
						<td>Nama Pasien</td>
						<td>: <?=$pasien->row()->nama_pasien?></td>
					</tr>
					<tr>
						<td>Tgl Lahir</td>
						<td>: <?=tgl_indo($pasien->row()->tgl_lahir)?></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>: <?=gender($pasien->row()->gender)?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>: <?=$pasien->row()->alamat?></td>
					</tr>
					<tr>
						<td>No. Telp</td>
						<td>: <?=$pasien->row()->no_telp?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>