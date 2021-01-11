<div id="respon1"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
	<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		    <h3 class="box-title">Data Medical Check Up</h3>
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
							<td>
								<svg class="barcode128"
								  jsbarcode-format="CODE128"
								  jsbarcode-value="<?=$r->no_mcu?>"
								  jsbarcode-textmargin="0"
								  jsbarcode-lineColor="#0aa"
								  jsbarcode-height="25"
								  jsbarcode-fontSize="10"
								  jsbarcode-fontoptions="bold">
								</svg>
							</td>
							<td><?=$pasien->nik?></td>
							<td><?=$pasien->nama_pasien?></td>
							<td><?=tgl_indo($r->tgl_mcu)?></td>
							<td>
								<a href="<?=base_url()?>periksa_fisik/hasil/<?=$r->no_mcu?>" class="btn btn-primary btn-xs btn-flat btn-block btn-social"><i class="fa fa-pencil"></i> Entry Hasil Periksa Fisik</a>
								<a href="<?=base_url()?>ekg/hasil/<?=$r->no_mcu?>" class="btn btn-primary btn-xs btn-flat btn-block btn-social"><i class="fa fa-pencil"></i> Entry Hasil EKG</a>
								<a href="<?=base_url()?>rontgen/hasil/<?=$r->no_mcu?>" class="btn btn-primary btn-xs btn-flat btn-block btn-social"><i class="fa fa-pencil"></i> Entry Hasil Rontgen</a>
								<a href="<?=base_url()?>laboratorium/hasil/<?=$r->no_mcu?>" class="btn btn-primary btn-xs btn-flat btn-block btn-social"><i class="fa fa-pencil"></i> Entry Hasil Lab</a>
								<!--a href="<?=base_url()?>rontgen/hasil/<?=$r->no_mcu?>" class="btn btn-primary btn-xs btn-flat btn-block btn-social"><i class="fa fa-pencil"></i> Fisioterapi</a-->
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

<script type="text/javascript">
  	setTimeout(function() {document.getElementById('respon1').innerHTML='';},2000);

  	$('#m_mcu').addClass('active');
  	$('#m_pemeriksaan_fisik').addClass('active');

	$(function () {
	  $("#tbl").dataTable({
	    "iDisplayLength": 10,
	  });
	});

  	
	JsBarcode(".barcode128").init();
</script>