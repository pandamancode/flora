<script type="text/javascript">
	
	$('#m_pelayanan').addClass('active');

	$(function () {
	    $("#tbl").dataTable({
	      "iDisplayLength": 10,
	    });

	    // $("#tbl_obat").dataTable({
	    //   "iDisplayLength": 10,
	    // });
	});

	function reset(){
	  $('#frm-add')[0].reset();
      document.getElementById('btn_edit').disabled=true;
	  document.getElementById('btn_simpan').disabled=false;
	  document.getElementById('nomor').readOnly=false;
	}

	// Simpan Data
	$(document).on("click", ".btn-view", function() {

	  $('#tempat_form_tambah').hide();
      $('#tempat_data').show();
      reset();	  
	})

	$(document).on('click', '.btn-add', function(){
		$('#tempat_form_tambah').show();
      	$('#tempat_data').hide();
	})

	// Ubah data
	$(document).on("click", ".btn-update", function() {
	  	var id = $(this).attr("data-id");
	    var url = '<?php echo base_url(); ?>';
	    $.ajax({
	          method : 'post',                
	          dataType : 'json',
	          url: url + 'Pelayanan/get_pelayanan',
	          data : {id:id},
	          
	          success:function(data){
	          	$('#tempat_form_tambah').show();
      			$('#tempat_data').hide();
      			document.getElementById('btn_edit').disabled=false;
				document.getElementById('btn_simpan').disabled=true;
				document.getElementById('nomor').readOnly=true;

	          	$('#nomor').val(data.no_invoice);
	          	$('#nik').val(data.nik);
	          	$('#nama_pasien').val(data.nama_pasien);
	          	$('#keluhan').val(data.keluhan);
	          	$('#tb').val(data.tb);
	          	$('#bb').val(data.bb);
	          	$('#lp').val(data.lp);
	          	$('#imt').val(data.imt);
	          	$('#sistole').val(data.sistole);
	          	$('#diastole').val(data.diastole);
	          	$('#respiratory_rate').val(data.respiratory_rate);
	          	$('#heart_rate').val(data.heart_rate);
	          	$('#pemeriksaan_fisik').val(data.pemeriksaan_fisik);
	          	$('#kd_penyakit').val(data.kd_penyakit);
	          	$('#nama_penyakit').val(data.nama_penyakit);
	          	$('#biaya_pelayanan').val(data.biaya_pelayanan);
	          	$('#biaya_lain').val(data.biaya_lain);
	            $('#nik_petugas').val(data.nik_petugas);
	            $('#nama_petugas').val(data.nama_petugas);
	          }
	      })
	})

	// hapus
	$(document).on("click", ".hapus-data", function() {
		id = $(this).attr("data-id");
		$('#id_').val(id);
	})

	function hitung(){
		var bb = $('#bb').val();
		var tb = $('#tb').val();

		var tb_meter = tb / 100;

		var hasil = bb / (tb_meter*tb_meter);

		var imt = Math.floor(hasil);
		$('#imt').val(imt);

	}
                   
            
</script>

