<div id="respon1"><?php echo $this->session->flashdata('msg'); ?></div>
<div class='row'>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
			    <h3 class="box-title">Data Pembayaran</h3>
			 </div>
			<div class="box box-body">
				<div class="table-responsive">
					<table class='table table-striped table-hover' id='tbl'>
						<thead>
							<tr>
								<th width="5%">#</th>
								<th>No. Invoice</th>
								<th>NIK</th>
								<th>Nama Pasien</th>
								<th>Gender</th>
								<th width="10%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=0; foreach($pelayanan->result() as $r){ $no++; 
								$pasien = $this->db->select("*")->from("tb_registrasi")->join("tb_pasien","tb_pasien.nik=tb_registrasi.nik")->where("tb_registrasi.no_registrasi",$r->no_registrasi)->get()->row();
							?>
							<tr>
								<td><?=$no?></td>
								<td><span style="color: red;"><strong><?=$r->no_invoice?></strong></span></td>
								<td><?=$pasien->nik?></td>
								<td><?=$pasien->nama_pasien?></td>
								<td><?=gender($pasien->gender)?></td>
								<td>
									<a href="<?=base_url()?>pembayaran/detail/<?=$r->no_invoice?>" class="btn btn-primary btn-xs btn-flat"><i class="fa fa-list-alt"></i> Lihat Detail</a>
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
	
	$('#m_pembayaran').addClass('active');

	$(function () {
	    $("#tbl").dataTable({
	      "iDisplayLength": 10,
	    });
	});
</script>
