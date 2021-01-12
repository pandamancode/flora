<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Data Registerasi MCU</h3>
	</div>
	<div class="box box-body">
		<div class="table-responsive">
			<table class='table table-striped table-hover' id='tbl'>
				<thead>
					<tr>
						<th width="5%">#</th>
						<th>No. MCU</th>
						<th>NIK/NRP</th>
						<th>Nama Pasien</th>
						<th>Tgl MCU</th>
						<th width="10%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=0; foreach($mcu->result() as $r){ $no++; 
						$pasien = $this->db->get_where("pasien",array('nik'=>$r->nik))->row();
					?>
					<tr>
						<td><?=$no?></td>
						<td><span style="color: red;"><strong><?=$r->no_mcu?></strong></span></td>
						<td><?=$pasien->nik?></td>
						<td><?=$pasien->nama_pasien?></td>
						<td><?=tgl_indo($r->tgl_mcu)?></td>
						<td>
							<a href="<?=base_url()?>Register_mcu/cetak_hasil/<?=$r->no_mcu?>" target="_blank"
								class="btn btn-primary btn-xs btn-flat"><i class="fa fa-print"></i> Print Hasil MCU</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>