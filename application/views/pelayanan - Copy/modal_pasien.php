<div class="modal modal-primary fade" id="modal-pasien">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
         <button type="button" id="btn-close-modal" class="btn btn-sm btn-flat btn-default pull-right" data-dismiss="modal"><i class="fa fa-close fa-fw"></i>&nbsp;</button>
         <button type="button" class="btn btn-flat btn-default btn-form"><i class="fa fa-plus"></i>&nbsp; Tambah Data Pasien  </button>
      </div>          
          <div class="box box-success">
            <div class="box-body">
              <div class="col-md-12 kecret" id="tempat_tabel">
                 <?php $this->load->view('pelayanan/data_pasien');?>
              </div>
              <div class="col-md-12" id="tempat_form" hidden="">
                <?php $this->load->view('pelayanan/form_pasien');?>
              </div>
          </div>
          </div>
      <div class="modal-footer">
        &nbsp;
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
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

    function load_data_pasien(){
        // var st = $('#status').val();
        $.get("<?=base_url()?>Pelayanan/tampil_pasien/", function( data ) {
          $(".kecret").html(data);
          $('#btn-close-modal').show();
        });
    }

    // simpan Pasien
  $('#btn_simpan_pasien').on('click', function(){
      var url = '<?php echo base_url(); ?>';    
      var nik=$('#nik_pasien_add').val();
      var nama_pasien=$('#nama_pasien_add').val();
      var tanggal=$('#tanggal').val();
      var jenis=$('#jenis').val();
      var telp=$('#telp').val();
      var alamat=$('#alamat').val();

      $.ajax({
        type : 'POST',                
            dataType : 'json',
            url: url + 'Pelayanan/simpan_pasien',
            data : {nik:nik,nama_pasien:nama_pasien, tanggal:tanggal, jenis:jenis,telp:telp,alamat:alamat},
            success : function(data){
              if(data.error){
                if(data.nik_error != ''){
                      $('#nik_error').html(data.nik_error);
                  }else{
                      $('#nik_error').html('');
                  }                   
              }

              if(data.success){
                $('#tempat_form').hide();
                $('#tempat_tabel').show();
                $('#frm_pasien')[0].reset();       
                load_data_pasien();
              }
            }
      }); 
  })
</script>