<div class='row'>
	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header">
				<i class="fa fa-list-alt"></i>
			    <h3 class="box-title">Detail Pembayaran</h3>
			 </div>
			<div class="box box-body">
				<table class='table table-striped table-hover' id='tbl'>
					<!--thead>
						<tr>
							<th width="5%">No</th>
							<th>Kode Obat</th>
							<th>Nama Obat</th>
							<th>Qty</th>
							<th>Harga</th>
							<th width="15%" class="text-right">Total Harga</th>
						</tr>
					</thead>
					<tbody-->
						<?php $sub=0; $no=0; foreach($plant->result() as $p){ 
							$no++;
							$obat = $this->db->get_where("tb_obat",array('kd_obat'=>$p->kd_obat))->row();
							$sub += $p->qty * $p->harga_jual;
						?>
						<!--tr>
							<td><?=$no?></td>
							<td><?=$obat->kd_obat?></td>
							<td><?=$obat->nama_obat?></td>
							<td><?=$p->qty?></td>
							<td><?=format_rp($p->harga_jual)?></td>
							<td class="text-right"><?=format_rp($p->qty * $p->harga_jual) ?></td>
						</tr-->
						<?php } ?>
					<!--/tbody-->

					<tfoot>
						<!--tr>
							<th colspan="5"><em>Sub Total</em></th>
							<th class="text-right"><em><?=format_rp($sub)?></em></th>
						</tr-->
						<tr>
							<th colspan="5"><em>Biaya Tindakan (<?=tindakan($pelayanan->id_ig)?>)</em></th>
							<th class="text-right"><em><?=format_rp($pelayanan->biaya_tindakan)?></em></th>
						</tr>
						<tr>
							<th colspan="5"><em>Total Seluruh</em></th>
							<th class="text-right"><em style="color:red;"><?=format_rp($sub+$pelayanan->biaya_tindakan)?></em></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-header">
			    <h3 class="box-title">Form Pembayaran</h3>
			 </div>
			<div class="box box-body">
				<form method="post" id="form-pembayaran" target="_blank" action="<?=base_url()?>pembayaran/cetak_nota">
				<div class="form-group">
					<h3 class="font-weight-bold" style="margin-top: 0px;">Total:</h3>
                	<h1 class="font-weight-bold mb-5" style="margin-top: 0px;">Rp. <?=format_rp($sub+$pelayanan->biaya_tindakan)?></h1>
                	<input type="hidden" name="total" id="total" value="<?=($sub+$pelayanan->biaya_tindakan)?>" class="form-control" placeholder="Bayar" readonly>
				</div>

				<div class="form-group">
					<label>Input Nominal</label>
					<input type="number" name="bayar" id="bayar" class="form-control" placeholder="Bayar">

					<h3 class="font-weight-bold">Bayar:</h3>
                	<h1 class="font-weight-bold mb-5" style="margin-top: 0px;" id="pembayaran">Rp. 0,-</h1>
				</div>

				<div class="form-group">
					<h3 class="font-weight-bold">Kembalian:</h3>
                	<h1 class="font-weight-bold mb-5" style="margin-top: 0px;" id="lbl_kembalian">Rp. 0,-</h1>
					<input type="hidden" name="kembalian" id="kembalian" class="form-control" placeholder="Kembalian" readonly>
				</div>

				<div class="form-group text-right">
					<input type="hidden" value="<?=$pelayanan->no_invoice?>" name="no_invoice">
					<button id="printButton" class="btn btn-primary btn-flat" style="border-radius: 15px;" type="submit" disabled>Cetak</button>
					<button id="saveButton" onclick="bayar_tagihan()" class="btn btn-success btn-flat" style="border-radius: 15px;" type="button" disabled>Bayar</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#m_pembayaran').addClass('active');

	function HitungTotalKembalian()
	{
		var Cash = $('#bayar').val();
		var TotalBayar = $('#total').val();
		//alert(Cash);

		if(parseInt(Cash) >= parseInt(TotalBayar)){
			var Selisih = parseInt(Cash) - parseInt(TotalBayar);
			$('#kembalian').val(Selisih);
		}else {
			$('#kembalian').val('');
			//alert('Hasil Tidak Ada '+TotalBayar);
			$.gritter.add({
		            title: 'Failed',
		            text: 'Nilai Bayar Tidak Sesuai',
		            sticky: false,
	            	class_name: 'danger',
	            	time: 500,
		        });
		}
		return false;
	}

	bayar.oninput = function () {
        let jumlah = parseInt(document.getElementById('total').value) ? parseInt(document.getElementById('total').value) : 0;
        let bayar = parseInt(document.getElementById('bayar').value) ? parseInt(document.getElementById('bayar').value) : 0;
        let hasil = bayar - jumlah;
        document.getElementById("pembayaran").innerHTML = bayar ? 'Rp. ' + rupiah(bayar) + ',-' : 'Rp. ' + 0 +
            ',-';
        $("#kembalian").val(hasil);
        document.getElementById("lbl_kembalian").innerHTML = hasil ? 'Rp. ' + rupiah(hasil) + ',-' : 'Rp. ' + 0 +',-';

        cek(bayar, jumlah);
        const saveButton = document.getElementById("saveButton");  
        const printButton = document.getElementById("printButton");   

        if(jumlah === 0){
            saveButton.disabled = true;
            printButton.disabled = true;
        }

    };

    function cek(bayar, jumlah) {
        const saveButton = document.getElementById("saveButton");   

        if (bayar < jumlah) {
            saveButton.disabled = true;
            printButton.disabled = true;
        } else {
            saveButton.disabled = false;
            printButton.disabled = false;
        }
    }

    function rupiah(bilangan) {
        var number_string = bilangan.toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        return rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    }

    function bayar_tagihan(){
	    dataString = $("#form-pembayaran").serialize();
	    $.ajax({
	        type:"POST",
	        url:"<?=base_url()?>pembayaran/bayar",
	        data:dataString,
	        success: function(msg){
	            $.gritter.add({
	                title: "Sukses",
	                text: msg,
	                sticky: false,
	                class_name: "success",
	                time: 500,
	            });

	            location.href="<?=base_url()?>pembayaran";
	            return false;
	        },
	    });
	    event.preventDefault();
	}
</script>