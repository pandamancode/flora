<div id="respon1"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
<div class="col-md-7">
 <div class="box box-primary">
    <div class="panel-heading">
      <i class='fa fa-stethoscope fa-fw'></i> Form Pelayanan
      <strong>[Pasien : (<?=$pasien->nik?> - <?=$pasien->nama_pasien?>)]</strong>
    </div>
    <form method="post" action="<?=base_url()?>poli_umum/entry_data">
      <div class="box box-body">

        <div class="form-group col-md-6">
           <label><i>No. Rekam Medis</i></label>
           <input type="text" value="<?=$pelayanan->no_registrasi?>" name="no_rm" class="form-control" placeholder="No. Rekam Medis" readonly autocomplete="off">
        </div>

        <div class="form-group col-md-6">
           <label><i>Tanggal</i></label>
           <input type="date" value="<?=$pelayanan->tgl_pelayanan?>" name="tgl_pelayanan" class="form-control" placeholder="Tanggal" required autocomplete="off">
        </div>

        <div class="form-group col-md-3">
           <label><i>Tinggi Badan</i></label>
           <input type="text" value="<?=$pelayanan->tb?>" name="tb" onchange="hitung_imt()" id="tb" class="form-control" placeholder="Tinggi Badan" required autocomplete="off">
        </div>

        <div class="form-group col-md-3">
           <label><i>Berat Badan</i></label>
           <input type="text" value="<?=$pelayanan->bb?>" name="bb" onchange="hitung_imt()" id="bb" class="form-control" placeholder="Berat Badan" required autocomplete="off">
        </div>
         
        <div class="form-group col-md-3">
           <label><i>Lingkar Perut</i></label>
           <input type="text" value="<?=$pelayanan->lp?>" name="lp" id="lp" class="form-control" placeholder="Lingkar Perut" required autocomplete="off">
        </div>
          
        <div class="form-group col-md-3">
            <label><i>IMT</i></label>
            <input type="text" value="<?=$pelayanan->imt?>" name="imt" id="imt" class="form-control" placeholder="IMT" readonly autocomplete="off">
        </div>

        <div class="form-group col-md-3">
           <label><i>Sistole</i></label>
           <input type="text" value="<?=$pelayanan->sistole?>" name="sistole" id="sistole" class="form-control" placeholder="Sistole" required autocomplete="off">
        </div>

        <div class="form-group col-md-3">
           <label><i>Diastole</i></label>
           <input type="text" value="<?=$pelayanan->diastole?>" name="diastole" id="diastole" class="form-control" placeholder="Diastole" required autocomplete="off">
        </div>
         
        <div class="form-group col-md-3">
           <label><i>Respiratory Rate</i></label>
           <input type="text" value="<?=$pelayanan->respiratory_rate?>" name="rr" id="rr" class="form-control" placeholder="Respiratory Rate" required autocomplete="off">
        </div>
          
        <div class="form-group col-md-3">
            <label><i>Heart Rate</i></label>
            <input type="text" value="<?=$pelayanan->heart_rate?>" name="hr" id="hr" class="form-control" placeholder="Heart Rate" required autocomplete="off">
        </div>

        <div class="form-group col-md-12">
           <label><i>Keluhan</i></label>
           <textarea class="form-control" name="keluhan" id="keluhan" placeholder="Keluhan"><?=$pelayanan->keluhan?></textarea>
        </div> 

        <div class="form-group col-md-12">
           <label><i>Saran</i></label>
           <textarea name="saran" class="form-control" id="saran" placeholder="Saran" rows="5" required><?=$pelayanan->saran?></textarea>
        </div>
          
        <div class="form-group col-md-12 text-right">
            <input type="hidden" value="<?=$no_invoice?>" name="no_invoice">
            <button type="submit" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-save"></i> Simpan Pemeriksaan</button>
        </div>
      </div>    
    </form>
  </div>
    
    <!--div class="box box-body">
      <div class="col-md-12 text-right">
        <a href="javascript:;" class="btn btn-success btn-flat btn-konfirm"><i class="fa fa-check-square-o"></i> Konfirmasi Pelayanan</a>
      </div>
    </div-->

</div>

<?php //if(!empty($pelayanan->id_ig)){ ?>
<div class="col-md-5"><?php $this->load->view('poli_umum/transaksi') ?></div>
<?php //} ?>
</div>

<div id="tempat-modal"></div>

<div class="modal fade" id="konfirmasiPelayanan" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
        <h3 style="display:block; text-align:center;">Apakah pelayanan telah selesai?</h3>
        <form method="post" action="<?php echo base_url() ?>poli_umum/konfirmasi">
          <input type="hidden" name="id" value="<?=$no_invoice?>">
          <div class="col-md-6">
            <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Ya, Pelayanan Selesai</button>
          </div>
          <div class="col-md-6">
            <button class="form-control btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Belum</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  setTimeout(function() {document.getElementById('respon1').innerHTML='';},2000);
  $('#m_poliumum').addClass('active');
  $('#m_poli').addClass('active');

  $(function () {
      $("#tbl_rm").dataTable({
        "iDisplayLength": 10,
      });

      $('#saran').wysihtml5();
  });

  $(function() {
        $("#tindakan").change(function(){
            var dataid = $('option:selected', this).attr('data-id');

            $('#biaya_tindakan').val(dataid);
        });
    });

  $(document).on("click", ".btn-petugas", function() {
    var id = "<?=$no_invoice?>";
    
    $.ajax({
      method: "POST",
      url: "<?php echo base_url('poli_umum/mod_petugas'); ?>",
      data: "id=" +id
    })
    .done(function(data) {
      $('#tempat-modal').html(data);
      $('.modal-dialog').attr('class','modal-dialog modal-lg');        
      $('#md_petugas').modal('show');
    })
  })

  $(document).on("click", ".btn-diagnosa", function() {
    var id = "<?=$no_invoice?>";
    
    $.ajax({
      method: "POST",
      url: "<?php echo base_url('poli_umum/mod_diagnosa'); ?>",
      data: "id=" +id
    })
    .done(function(data) {
      $('#tempat-modal').html(data);
      //$('.modal-dialog').attr('class','modal-dialog modal-lg');        
      $('#md_diagnosa').modal('show');
    })
  })

  $(document).on("click", ".btn-plant", function() {
    var id = "<?=$no_invoice?>";
    
    $.ajax({
      method: "POST",
      url: "<?php echo base_url('poli_umum/mod_plant'); ?>",
      data: "id=" +id
    })
    .done(function(data) {
      $('#tempat-modal').html(data);
      $('.modal-dialog').attr('class','modal-dialog modal-lg');        
      $('#md_plant').modal('show');
    })
  })

  function hitung_imt(){
    var tb = $('#tb').val();
    var bb = $('#bb').val();


    if(tb==null || tb==''){
      return false;
    }

    if(bb==null || tb==''){
      return false;
    }

    var convert = (tb / 100);
    var hitung = bb / (convert*convert);

    $('#imt').val(Math.floor(hitung));

  }




  $(document).on("click", ".btn-konfirm", function() {
    var tb = $('#tb').val();
    var bb = $('#bb').val();
    var lp = $('#lp').val();
    var imt = $('#imt').val();
    var sistole = $('#sistole').val();
    var diastole = $('#diastole').val();
    var rr = $('#rr').val();
    var hr = $('#hr').val();
    var keluhan = $('#keluhan').val();
    //var tindakan = $('#tindakan').val();
    //var pf = $('#pemeriksaan_fisik').val();
    //var bp = $('#biaya_pelayanan').val();
    //var bl = $('#biaya_lain').val();

    if(tb=='' || tb==null){
      $.gritter.add({
          title: "Error",
          text: "Tinggi Badan Harus di Isi",
          sticky: false,
          class_name: "error",
          time: 500,
      });
      return false;
    }

    if(bb=='' || bb==null){
      $.gritter.add({
          title: "Error",
          text: "Berat Badan Harus di Isi",
          sticky: false,
          class_name: "error",
          time: 500,
      });
      return false;
    }

    if(lp=='' || lp==null){
      $.gritter.add({
          title: "Error",
          text: "Lingkar Perut Harus di Isi",
          sticky: false,
          class_name: "error",
          time: 500,
      });
      return false;
    }

    if(imt=='' || imt==null){
      $.gritter.add({
          title: "Error",
          text: "IMT Harus di Isi",
          sticky: false,
          class_name: "error",
          time: 500,
      });
      return false;
    }

    if(sistole=='' || sistole==null){
      $.gritter.add({
          title: "Error",
          text: "Sistole Harus di Isi",
          sticky: false,
          class_name: "error",
          time: 500,
      });
      return false;
    }

    if(diastole=='' || diastole==null){
      $.gritter.add({
          title: "Error",
          text: "Diastole Harus di Isi",
          sticky: false,
          class_name: "error",
          time: 500,
      });
      return false;
    }

    if(rr=='' || rr==null){
      $.gritter.add({
          title: "Error",
          text: "Respiratory Rate Harus di Isi",
          sticky: false,
          class_name: "error",
          time: 500,
      });
      return false;
    }

    if(hr=='' || hr==null){
      $.gritter.add({
          title: "Error",
          text: "Heart Rate Harus di Isi",
          sticky: false,
          class_name: "error",
          time: 500,
      });
      return false;
    }

    if(keluhan=='' || keluhan==null){
      $.gritter.add({
          title: "Error",
          text: "Keluhan Harus di Isi",
          sticky: false,
          class_name: "error",
          time: 500,
      });
      return false;
    }

    /*if(pf=='' || pf==null){
      $.gritter.add({
          title: "Error",
          text: "Pemeriksaan Fisik Harus di Isi",
          sticky: false,
          class_name: "error",
          time: 500,
      });
      return false;
    }

    if(bp=='' || bp==null){
      $.gritter.add({
          title: "Error",
          text: "Biaya Pelayanan Harus di Isi",
          sticky: false,
          class_name: "error",
          time: 500,
      });
      return false;
    }

    if(bl=='' || bl==null){
      $.gritter.add({
          title: "Error",
          text: "Biaya Lain-lain Harus di Isi",
          sticky: false,
          class_name: "error",
          time: 500,
      });
      return false;
    }*/

    $('#konfirmasiPelayanan').modal('show');

  });
</script>