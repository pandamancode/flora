<div class="modal modal-primary fade" id="modal-penyakit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn-close-modal-penyakit" class="btn btn-flat btn-default pull-right" data-dismiss="modal"><i class="fa fa-close fa-fw"></i></button>
         <button type="button" class="btn btn-flat btn-default btn-form-penyakit"><i class="fa fa-plus"></i>&nbsp; Tambah Data Penyakit  </button>
      </div>          
          <div class="box box-success">
            <div class="box-body">
              <div class="col-md-12 kecret_penyakit" id="tempat_tabel_penyakit">
                 <?php $this->load->view('pelayanan/data_penyakit');?>
              </div>
              <div class="col-md-12" id="tempat_form_penyakit" hidden="">
                <?php $this->load->view('pelayanan/form_penyakit');?>
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
  $(document).on('click', '.btn-form-penyakit', function(){
      $('#tempat_form_penyakit').show();
      $('#tempat_tabel_penyakit').hide();
      $('#btn-close-modal-penyakit').hide();
    })

  $(document).on('click', '.btn-close-form-penyakit', function(){
      $('#tempat_form_penyakit').hide();
      $('#tempat_tabel_penyakit').show();
      $('#btn-close-modal-penyakit').show();
  })

  function load_data_penyakit(){
        // var st = $('#status').val();
        $.get("<?=base_url()?>Pelayanan/tampil_penyakit/", function( data ) {
          $(".kecret_penyakit").html(data);
          $('#btn-close-modal-penyakit').show();
        });
    }

    // simpan Pasien
  $('#btn_simpan_penyakit').on('click', function(){
      var url = '<?php echo base_url(); ?>';    
      var kd_penyakit=$('#kd_penyakit_add').val();
      var nama_penyakit=$('#nama_penyakit_add').val();

      $.ajax({
        type : 'POST',                
            dataType : 'json',
            url: url + 'Pelayanan/simpan_penyakit',
            data : {kd_penyakit:kd_penyakit,nama_penyakit:nama_penyakit},
            success : function(data){
              if(data.error){
                if(data.kd_penyakit_error != ''){
                      $('#kd_penyakit_error').html(data.kd_penyakit_error);
                  }else{
                      $('#kd_penyakit_error').html('');
                  }                   
              }

              if(data.success){
                $('#tempat_form_penyakit').hide();
                $('#tempat_tabel_penyakit').show();
                $('#frm_penyakit')[0].reset();       
                load_data_penyakit();
              }
            }
      }); 
  })
</script>