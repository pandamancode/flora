<div class="modal modal-primary fade" id="modal-petugas">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" id="btn-close-modal-petugas" class="btn btn-sm btn-default btn-flat pull-right" data-dismiss="modal"><i class="fa fa-close fa-fw"></i></button>
         <button type="button" class="btn btn-flat btn-default btn-form-petugas"><i class="fa fa-plus"></i>&nbsp; Tambah Data Petugas  </button>
      </div>          
          <div class="box box-success">
            <div class="box-body">
              <div class="col-md-12 kecret_petugas" id="tempat_tabel_petugas">
                 <?php $this->load->view('pelayanan/data_petugas');?>
              </div>
              <div class="col-md-12" id="tempat_form_petugas" hidden="">
                <?php $this->load->view('pelayanan/form_petugas');?>
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
  $(document).on('click', '.btn-form-petugas', function(){
      $('#tempat_form_petugas').show();
      $('#tempat_tabel_petugas').hide();
      $('#btn-close-modal-petugas').hide();
    })

      $(document).on('click', '.btn-close-form-petugas', function(){
      $('#tempat_form_petugas').hide();
      $('#tempat_tabel_petugas').show();
      $('#btn-close-modal-petugas').show();
    })

  function load_data_petugas(){
        // var st = $('#status').val();
        $.get("<?=base_url()?>Pelayanan/tampil_petugas/", function( data ) {
          $(".kecret_petugas").html(data);
          $('#btn-close-modal-petugas').show();
        });
    }

    // simpan Pasien
  $('#btn_simpan_petugas').on('click', function(){
      var url = '<?php echo base_url(); ?>';    
      var nik_petugas=$('#nik_petugas_add').val();
      var nama_petugas=$('#nama_petugas_add').val();
      var status=$('#status').val();
      var gender=$('#gender').val();
      var no_telp=$('#no_telp').val();
      var alamat=$('#alamat_petugas').val();

      $.ajax({
        type : 'POST',                
            dataType : 'json',
            url: url + 'Pelayanan/simpan_petugas',
            data : {nik_petugas:nik_petugas,nama_petugas:nama_petugas,gender:gender,alamat:alamat,no_telp:no_telp,status:status},
            success : function(data){
              if(data.error){
                if(data.nik_petugas_error != ''){
                      $('#nik_petugas_error').html(data.nik_petugas_error);
                  }else{
                      $('#nik_petugas_error').html('');
                  }                   
              }

              if(data.success){
                $('#tempat_form_petugas').hide();
                $('#tempat_tabel_petugas').show();
                $('#frm_petugas')[0].reset();       
                load_data_petugas();
              }
            }
      }); 
  })
</script>