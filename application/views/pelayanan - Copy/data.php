<!-- <div class='row'> -->
	<div class='col-md-12'>
		<div class="box box-primary">
			<div class="panel-heading">
				<i class='fa fa-shopping-cart fa-fw'></i> Master <i class='fa fa-angle-right fa-fw'></i> Data <?= $title;?> 
				<a href="#" class="btn-add pull-right"><i class="fa fa-plus fa-fw"></i> Tambah&nbsp;</a>
				
			</div>
			<div class="box box-body">

				<div class="table-responsive">
				<table class='table table-striped table-hover' id='tbl'>
				<thead>
					<tr>						
						<th>Tanggal</th>
						<th>No&nbsp;Invoice</th>
						<th>NIK&nbsp;Pasien</th>
						<th>Nama&nbsp;Pasien</th>
						<!-- <th>Kd Penyakit</th> -->
						<th>Penyakit</th>
						<th>NIK&nbsp;Petugas</th>
						<th>Nama&nbsp;Petugas</th>
						<th width="15%">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no =0;
						foreach($pelayanan->result() as $r){
							$no++;							
						?>
						<tr>							
							<td><?php echo date("d-m-Y", strtotime($r->tgl_pelayanan)) ?></td>
							<td><?php echo $r->no_invoice ?></td>
							<td><?php echo $r->nik ?></td>
							<td><?php echo $r->nama_pasien ?></td>
							<td><?php echo $r->nama_penyakit ?></td>
							<td><?php echo $r->nik_petugas ?></td>
							<td><?php echo $r->nama_petugas?></td>
							<td>
								<a href="#" class="btn btn-primary btn-flat btn-xs btn-update" data-id="<?php echo $r->no_invoice ?>"> <i class="fa fa-edit fa-fw" style="color:#ffffff;"></i> <span style="color:#ffffff;"> Ubah &nbsp;</span></a>
								<a href="#" class="btn btn-danger btn-flat btn-xs hapus-data" data-toggle="modal" data-target="#konfirmasiHapus" data-id="<?php echo $r->no_invoice ?>"><i class="fa fa-trash fa-fw" style="color:#ffffff;"></i>  <span style="color:#ffffff;"> Hapus</span></a>
							</td>
						</tr>
					<?php } ?>
					
				</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
<!-- </div> -->

<!-- <div id="tempat-modal"></div> -->

<script type="text/javascript">
	$(document).on('input', '#biaya_pelayanan', function(){
    	this.value = this.value.replace(/([^0-9])/g,'');
  	})

  	$(document).on('input', '#biaya_lain', function(){
    	this.value = this.value.replace(/([^0-9])/g,'');
  	})

	function hitung_imt()
    {           
        var bb=$("#bb").val();
        var tb=$("#tb").val();
        var imt=parseFloat(bb)/(parseFloat(tb) * parseFloat(tb));
        imt = imt.toFixed(2);
        $("#imt").val(imt);
    }	
    $(document).ready(function() {
    //alert('tes');
     $("#bb").keyup(function() {
        hitung_imt();
        //alert('tes');
    });
    
    $("#tb").keyup(function() {
        //alert('tes');
        hitung_imt();
    });
    
    });
</script>


