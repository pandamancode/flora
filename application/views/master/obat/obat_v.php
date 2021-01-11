<div class='row'>
	<div class='col-md-12'>
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Data Obat</h3>
				<a href="#" class="btn-add pull-right"><i class="fa fa-plus fa-fw"></i> Tambah Obat</a>
			</div>
			<div class="box box-body">
				<?php echo $this->session->flashdata('msg'); ?>
				<div class="table-responsive">
				<table class='table table-striped table-hover' id='tbl'>
				<thead>
					<tr>
						<th width="5%">#</th>
						<th>Kode</th>
						<th>Nama</th>
						<th>Harga</th>
						<th>Jenis</th>
						<th width="15%">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no =0;
						foreach($obat->result() as $r){
							$no++;
							
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $r->kd_obat ?></td>
							<td><?php echo $r->nama_obat ?></td>
							<td>Rp <?=format_rp($r->harga_obat);?></td>
							<td><?php echo ucwords($r->jenis) ?></td>
							<td>
								<a href="#" class="btn btn-primary btn-flat btn-xs btn-update" data-id="<?php echo $r->kd_obat ?>"> <i class="fa fa-edit fa-fw" style="color:#ffffff;"></i> <span style="color:#ffffff;"> Ubah &nbsp;</span></a>
								<a href="#" class="btn btn-danger btn-flat btn-xs hapus-data" data-toggle="modal" data-target="#konfirmasiHapus" data-id="<?php echo $r->kd_obat ?>"><i class="fa fa-trash fa-fw" style="color:#ffffff;"></i>  <span style="color:#ffffff;"> Hapus</span></a>
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

<?php $this->load->view('master/obat/modal_hapus');?>
<?php $this->load->view('master/obat/js');?>
