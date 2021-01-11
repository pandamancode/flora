<script type="text/javascript">

	
	
	$('#m_plant').addClass('active');
	$(function () {
	      $("#tbl_obat").dataTable({
	        "iDisplayLength": 10,
	      });
	  });

	$(function () {
	      $("#tbl_2").dataTable({
	        "iDisplayLength": 10,
	      });
	  });

	

	$(document).on('click', '.btn-form', function(){
		$('#tempat_form').show();
		$('#tempat_tabel').hide();
		$('#btn-close-modal').hide();
	})

	$(document).on('click', '.btn-close-form', function(){
		$('#tempat_form').hide();
		$('#tempat_tabel').show();
		$('#btn-close-modal').show();
	})

	function load_data_obat(){
	    // var st = $('#status').val();
	    $.get("<?=base_url()?>Plant/obat_get_data/", function( data ) {
	      $(".kecret").html(data);
	    });
	}

	// simpan obat
	$('#btn_simpan_obat').on('click', function(){
	   	var url = '<?php echo base_url(); ?>';	  
	    var kd_obat=$('#kd_obat1').val();
        var nama_obat=$('#nama_obat1').val();
        var harga_obat=$('#harga_obat').val();
        var jenis=$('#jenis').val();

    	$.ajax({
    		type : 'POST',                
            dataType : 'json',
            url: url + 'Plant/simpan_obat',
            data : {kd_obat:kd_obat,nama_obat:nama_obat, harga_obat:harga_obat, jenis:jenis},
            success : function(data){
            	if(data.error){
                if(data.kd_obat_error != ''){
                      $('#kd_obat_error').html(data.kd_obat_error);
                  }else{
                      $('#kd_obat_error').html('');
                  }                   
              }

              if(data.success){
                $('#tempat_form').hide();
        				$('#tempat_tabel').show();
        				$('#frm')[0].reset();				
        				load_data_obat();
                
              }
            }
    	});	
	})
	
	function get_total_bayar(){
		var biaya_admin = parseInt($('#ttl').val());
		var totalharga = parseInt($('#totalharga').val());

		tby = biaya_admin + totalharga;
		document.getElementById('total_bayar').value = tby;

		// tombol_bayar();
	}
	

	$(document).on('click', '.btn-pel', function(){
    var id = $(this).attr("data-id");
    var url = '<?php echo base_url(); ?>';

    $.ajax({
          method : 'post',                
          dataType : 'json',
          url: url + 'Plant/get_pelayanan',
          data : {id:id},
          
          success:function(data){
            $('#no_invoice').val(data.no_invoice);
            $('#nama_pasien').val(data.nama_pasien);
            $('#nik').val(data.nik);
            $('#keluhan').val(data.keluhan);
            $('#ttl').val(data.ttl);

            atur_tombol();
          }

      });
     })

	
	
	$('#btn_simpan_plant').on('click', function(){
		var url = '<?php echo base_url(); ?>';
		var no_invoice=$('#no_invoice').val();

		$.ajax({
			type : 'Post',
			dataType : 'Json',
			url : url + 'Plant/simpan_data_plant',
			data : {no_invoice:no_invoice},

			success : function(data){
				$('#frm-add')[0].reset();
				window.open(url+'Plant/cetak_nota');
        window.location.reload();
			}
		})
	})

	// Penjualan
	$(document).on('click', '.btn-obat', function(){
    var id = $(this).attr("data-id");
    var url = '<?php echo base_url(); ?>';

    $.ajax({
          method : 'post',                
          dataType : 'json',
          url: url + 'Plant/get_obat',
          data : {id:id},
          
          success:function(data){
            $('#kd_obat_jual').val(data.kd_obat);
            $('#nama_obat_jual').val(data.nama_obat);
            $('#harga_jual').val(data.harga_obat);

            simpan_data_jual();
          }

      });
     });

  function simpan_data_jual(){
    	var url = '<?php echo base_url(); ?>';
        var kd_obat=$('#kd_obat_jual').val();
        // var harga_beli=$('#harga_beli').val();
        var harga_jual=$('#harga_jual').val();
        var qty = $('#qty').val();
        // var cat_penjualan = $('#catatan').val();

        $.ajax({
            type : 'POST',                
                dataType : 'json',
                url: url + 'Plant/simpan_penjualan',
                data : {kd_obat:kd_obat , harga_jual:harga_jual, qty:qty},
                beforeSend:function(){
                  // $('#btn_tes').click();
                },
        success:function(data){
           $('#frm-jual')[0].reset();
           $("#data_penjualan").load(" #data_penjualan > *");
           $('#tot_tes').load(" #tot_tes > *");

           
        }

      });
        
  }

  	function ubah_qty(id){
        var idp = id;
        // alert(id);exit();
        var nama_form = '#f_'+id;
        // alert(nama_form);exit();
        dataString = $('#f_'+id).serialize();
        // alert(dataString);
        $.ajax({
            type:"POST",
            url:"<?php echo base_url(); ?>Plant/ubah",
            data : "id="+idp + "&"+dataString,
            success:function(x){
                $("#data_penjualan").load(" #data_penjualan > *");
            	  $('#tot_tes').load(" #tot_tes > *");
                
            },
        });
    }

	$(document).on('click', '.hapus-data', function(){
    var id = $(this).attr("data-id");
    var url = '<?php echo base_url(); ?>';
    // var totalharga = parseInt($('#totalharga').val());
    // atur_tombol();
    $.ajax({
          method : 'post',                
          dataType : 'json',
          url: url + 'Plant/hapus',
          data : {id:id},
          
          success:function(data){
            $("#data_penjualan").load(" #data_penjualan > *");
            $('#tot_tes').load(" #tot_tes > *");
          }
      });
    	
     })

 
  function atur_tombol(){
    var biaya_admin = parseInt($('#ttl').val());
    var totalharga = parseInt($('#totalharga').val());

    if (biaya_admin <= 0 || totalharga <= 0){
     // alert('kosong');
      document.getElementById('btn_bayar').disabled=true;
    }else if (biaya_admin > 0 || totalharga > 0){
      document.getElementById('btn_bayar').disabled=false;
      // alert('ada');
    }
  }

  $(document).on('input', '#txt_bayar', function(){
    this.value = this.value.replace(/([^0-9])/g,'');
  })

  $(document).on('input', '#harga_obat', function(){
    this.value = this.value.replace(/([^0-9])/g,'');
  })

  $('#txt_bayar').keyup(function(){
    var jml_bayar = $(this).val();
    var total_bayar = parseInt($('#total_bayar').val());   

    if (jml_bayar == 0) {
      document.getElementById('btn_simpan_plant').disabled=true;    
    }else{
      var kmb = jml_bayar-total_bayar;      
      document.getElementById('txt_kembali').value = kmb;
      if (kmb < 0) {
        document.getElementById('btn_simpan_plant').disabled=true;
      } else {
        document.getElementById('btn_simpan_plant').disabled=false;
      }

      
    }
    
  })

  
            
</script>