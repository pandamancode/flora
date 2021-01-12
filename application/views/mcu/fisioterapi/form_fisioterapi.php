<div id="respon1"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
<div class="col-md-8">
 <div class="box box-primary">
    <div class="panel-heading">
      <i class='fa fa-stethoscope fa-fw'></i> Form Fisioterapi
      <a href="<?=base_url()?>periksa_fisik" class="pull-right"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
    </div>
    <!--DEFINE VARIABLE -->
    <?php if($periksa->num_rows()>0){
        $keterangan = $periksa->row()->keterangan;
        $diagnosa = $periksa->row()->diagnosa;
        $tindakan = $periksa->row()->tindakan;
        $evaluasi = $periksa->row()->evaluasi;
      }else{
        $keterangan = false;
        $diagnosa = false;
        $tindakan = false;
        $evaluasi = false;
      }
    ?>
    <!-- END DEFINE VARIABLE -->
    <form method="post" action="<?=base_url()?>fisioterapi/entry_data">
      <div class="box box-body">

        <div class="form-group col-md-12">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$keterangan?>" name="keterangan" class="form-control" placeholder="Keterangan" required autocomplete="off">
        </div>

        <div class="form-group col-md-12">
           <label><i>Diagnosa</i></label>
           <input type="text" value="<?=$diagnosa?>" name="diagnosa" class="form-control" placeholder="Diagnosa" required autocomplete="off">
        </div>

        <div class="form-group col-md-12">
           <label><i>Tindakan</i></label>
           <input type="text" value="<?=$tindakan?>" name="tindakan" class="form-control" placeholder="Tindakan" required autocomplete="off">
        </div>

        <div class="form-group col-md-12">
           <label><i>Evaluasi</i></label>
           <input type="text" value="<?=$evaluasi?>" name="evaluasi" class="form-control" placeholder="Evaluasi" required autocomplete="off">
        </div>

        <div class="form-group col-md-12 text-right">
            <input type="hidden" value="<?=$no_mcu?>" name="no_mcu">
            <button type="submit" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-save"></i> Simpan Pemeriksaan</button>
        </div>
      </div>    
    </form>
  </div>
  
</div>
<div class="col-md-4"><?php $this->load->view('mcu/identitas')?></div>
</div>
<div id="tempat-modal"></div>

<script type="text/javascript">
  setTimeout(function() {document.getElementById('respon1').innerHTML='';},2000);
  $('#m_mcu').addClass('active');
  $('#m_ekg').addClass('active');

  $('#saran').wysihtml5();

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
</script>