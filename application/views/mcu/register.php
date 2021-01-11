<div id="respon1"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
  <div class="col-md-5">
   <div class="box box-primary">
      <div class="panel-heading">
        <i class='fa fa-edit fa-fw'></i> Form Registrasi MCU</strong>
      </div>
      <form method="post" action="<?=base_url()?>Register_mcu/entry_data">
        <div class="box box-body">

          <div class="form-group col-md-6">
             <label><i>No. MCU</i></label>
             <input type="text" name="no_mcu" id="no_mcu" class="form-control" placeholder="No. MCU" required autocomplete="off">
          </div>
           
          <div class="form-group col-md-6">
              <label><i>NIK / NRP</i></label>
              <div class="input-group">
                <input type="text" name="nik" id="nik" placeholder="NIK / NRP" class="form-control" readonly>
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-success btn-flat btn-browse"><i class="fa fa-folder-open"></i></button>
                    </span>
              </div>
          </div>
          <div class="form-group col-md-12">
             <label><i>Nama Pasien</i></label>
             <input type="text" name="nama_pasien" id="nama" class="form-control" placeholder="Nama Pasien" autocomplete="off" readonly>
          </div>
          <div class="form-group col-md-6">
             <label><i>Tgl Lahir</i></label>
             <input type="text" name="tgl_lahir" id="tgl" class="form-control" placeholder="Tanggal Lahir" readonly autocomplete="off">
          </div>
          <div class="form-group col-md-6">
             <label><i>No.Telp</i></label>
             <input type="text" name="no_telp" id="telp" class="form-control" placeholder="No. Telp" readonly autocomplete="off">
          </div>
          <div class="form-group col-md-12">
             <label><i>Alamat</i></label>
             <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat" readonly autocomplete="off"></textarea>
          </div>
                    
          <div class="form-group col-md-12 text-right">
              <button type="submit" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-edit"></i> Register</button>
          </div>
        </div> 
      </form>
    </div>
  </div>

  <div class="col-md-7"><?php $this->load->view('mcu/data_register') ?></div>

</div>

<div id="tempat-modal"></div>

<script type="text/javascript">
  setTimeout(function() {document.getElementById('respon1').innerHTML='';},2000);
  $('#m_mcu').addClass('active');
  $('#m_mcu_reg').addClass('active');
  $('#no_mcu').focus();

  $(function () {
      $("#tbl").dataTable({
        "iDisplayLength": 10,
      });
  });

  $(document).on("click", ".btn-browse", function() {
    var id = $(this).attr("data-id");
    
    $.ajax({
      method: "POST",
      url: "<?php echo base_url('Register_mcu/mod_pasien'); ?>",
      data: "id=" +id
    })
    .done(function(data) {
      $('#tempat-modal').html(data);
      $('.modal-dialog').attr('class','modal-dialog modal-lg');        
      $('#md_pasien').modal('show');
    })
  })

  function get_pasien(nik,nama,alamat,tgl,telp){
    $('#nik').val(nik);
    $('#nama').val(nama);
    $('#tgl').val(tgl);
    $('#alamat').val(alamat);
    $('#telp').val(telp);

    $('#md_pasien').modal('hide');
  }

  $('body').on('keydown', 'input', function(e) {
    if (e.key === "Enter") {
        var self = $(this), form = self.parents('form:eq(0)'), focusable, next;
        focusable = form.find('button').filter(':visible');
        next = focusable.eq(focusable.index(this)+1);
        if (next.length) {
            next.focus();
        } else {
            form.submit();
        }
        return false;
    }
  });
</script>