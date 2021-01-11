<div class='row'>
	<div class='col-md-12'>
		<div class="box box-primary">
			<div class="panel-heading">
				<i class='fa fa-ambulance fa-fw'></i> Master <i class='fa fa-angle-right fa-fw'></i> Data Nama Tugas dan Gaji <i class='fa fa-angle-right fa-fw'></i><i id="nota_judul"></i>
				<a href="#" class="btn-add pull-right"><i class="fa fa-plus fa-fw"></i> Tambah&nbsp;</a>
			</div>
			
			<div class="box box-body">

				<div class="table-responsive">
				<table class='table table-striped table-hover' id='tbl'>
				<thead>
					<tr>
						<th width="5%">#</th>
						<th>Kode</th>
						<th>Nama Tugas / Tindakan</th>	
						<th>Biaya Tindakan</th>						
						<th width="15%">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no =0;
						foreach($itemgaji->result() as $r){
							$no++;							
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $r->kd_item_gaji ?></td>
							<td><?php echo $r->nama_item_gaji ?></td>
							<td><?php echo format_rp($r->biaya) ?></td>
							<td>
								<a href="#" class="btn btn-primary btn-flat btn-xs btn-update" data-id="<?php echo $r->kd_item_gaji ?>"> <i class="fa fa-edit fa-fw" style="color:#ffffff;"></i> <span style="color:#ffffff;"> Ubah &nbsp;</span></a>
								<a href="#" class="btn btn-danger btn-flat btn-xs hapus-data" data-toggle="modal" data-target="#konfirmasiHapus" data-id="<?php echo $r->id_ig ?>"><i class="fa fa-trash fa-fw" style="color:#ffffff;"></i>  <span style="color:#ffffff;"> Hapus</span></a>
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

<?php $this->load->view('master/gaji/modal_hapus');?>
<?php $this->load->view('master/gaji/js');?>
