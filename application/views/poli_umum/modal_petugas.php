<div class="modal-header" style="background-color:#3c8dbc; color:white;">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Data Petugas</strong></h4>
</div>
<div class="modal-body">
    <table class="table table-striped table-hover" id="tbl_petugas">
      <thead>
          <tr>
              <th>No</th>
              <th>NIK</th>
              <th>Nama Petugas</th>
              <th>Status</th>
              <th width="10%">Action</th>
          </tr>
      </thead>
      <tbody>
        <?php $no=0;foreach($petugas->result() as $r){ $no++; ?>
          <tr>
              <td><?=$no?></td>
              <td><?=$r->nik_petugas?></td>
              <td><?=$r->nama_petugas?></td>
              <td><?=$r->status?></td>
              <td><a href="javascript:;" onclick="pilih_petugas('<?=$r->nik_petugas?>')" data-nik="<?=$r->nik_petugas?>" data-invoice="<?=$no_invoice?>" title='Pilih Petugas' id="menu_<?=$r->nik_petugas?>" class='btn btn-primary btn-xs btn-flat'><i class='fa fa-check-square-o'></i> Pilih Petugas</a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
</div>

<script type="text/javascript">
  $(function () {
      $("#tbl_petugas").dataTable({
        "iDisplayLength": 10,
      });
  });

  function pilih_petugas(nik){
    var nik = $('#menu_'+nik).attr('data-nik');
    var invoice = $('#menu_'+nik).attr('data-invoice');
    //var nominal = $('#nominal_tindakan'+nik).val();
    
    $.get("<?=base_url()?>poli_umum/pilih_petugas/"+nik+"/"+invoice);
    location.reload();
  }


	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix){	  
        var nrupiah = document.getElementById(prefix);
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split   		= number_string.split(','),
		sisa     		= split[0].length % 3,
		rupiah     		= split[0].substr(0, sisa),
		ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if(ribuan){
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		//return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
        //return (rupiah) ;
        nrupiah.value = rupiah;
	}
</script>
		