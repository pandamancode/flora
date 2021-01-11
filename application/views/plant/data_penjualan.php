<div class="panel panel-info">
	<div class="panel-heading">
  		<label><b>TABEL</b></label>
  		<div class="pull-right">
  			<a href="#" class="btn btn-sm btn-info btn_modal" data-toggle="modal" data-target="#modal-obat"><span class="glyphicon glyphicon-plus"></span><b>&nbsp;Tambah&nbsp;</b></a>
  			&nbsp;
  		</div>
  	</div>
  	<div class="panel-body" id="data_penjualan">
<div class="table-responsive">
	<table class='table table-striped table-hover' width="100%" style="font-size: 12px">
	<thead>
		<tr>
			<th width="5%">#</th>
			<th>Kode&nbsp;Obat</th>
			<th>Nama&nbsp;Obat</th>
			<th>Qty</th>
			<th>Harga&nbsp;Jual</th>
			<th>Total</th>
			<th width="15%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no =0;
			foreach($penjualan->result() as $r){
				$no++;							
			?>
			<tr>
				<td><?php echo $no ?></td>
				<!-- <td><?php //echo $r->id_plant ?></td> -->
				
				<td><?php echo $r->kd_obat ?></td>
				<td><?php echo $r->nama_obat ?></td>
				<td>
				 <form method="post" id="f_<?=$r->id_penjualan ?>">
            <input type="number" onchange="ubah_qty(<?=$r->id_penjualan ?>)" name="qty" min="1" class="form-control input-sm" value="<?=$r->qty ?>">
        </form>
                  
				</td> 
				<td>Rp&nbsp;<?= number_format($r->harga_jual,0,".",".");?></td>
				<td>Rp&nbsp;<?= number_format($r->tot,0,".","."); ?></td>
				<td>
					<a href="#" class="btn btn-danger btn-flat btn-xs hapus-data" data-id="<?php echo $r->id_penjualan ?>"><i class="fa fa-close fa-fw" style="color:#ffffff;"></i></a>
				</td>
			</tr>
		<?php } ?>
		
	</tbody>
	</table>
</div>
</div>
</div>

