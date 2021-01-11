<div id="respon1"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
<div class="col-md-8">
 <div class="box box-primary">
    <div class="panel-heading">
      <i class='fa fa-stethoscope fa-fw'></i> Form EKG
      <a href="<?=base_url()?>periksa_fisik" class="pull-right"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
    </div>
    <!--DEFINE VARIABLE -->
    <?php if($periksa->num_rows()>0){
        $heart_rate = $periksa->row()->heart_rate;
        $axis = $periksa->row()->axis;
        $rhythm = $periksa->row()->rhythm;
        $pr_interval = $periksa->row()->pr_interval;
        $resting_ecg = $periksa->row()->resting_ecg;
        $suggestion = $periksa->row()->suggestion;
        $saran = $periksa->row()->saran;
      }else{
        $heart_rate = false;
        $axis = false;
        $rhythm = false;
        $pr_interval = false;
        $resting_ecg = false;
        $suggestion = false;
        $saran = false;
      }
    ?>
    <!-- END DEFINE VARIABLE -->
    <form method="post" action="<?=base_url()?>ekg/entry_data">
      <div class="box box-body">

        <div class="form-group col-md-4">
           <label><i>Heart Rate</i></label>
           <input type="text" value="<?=$heart_rate?>" name="heart_rate" class="form-control" placeholder="Heart Rate" required autocomplete="off">
        </div>

        <div class="form-group col-md-4">
           <label><i>Axis</i></label>
           <input type="text" value="<?=$axis?>" name="axis" class="form-control" placeholder="Axis" required autocomplete="off">
        </div>

        <div class="form-group col-md-4">
           <label><i>Rhythm</i></label>
           <input type="text" value="<?=$rhythm?>" name="rhythm" class="form-control" placeholder="Rhythm" required autocomplete="off">
        </div>

        <div class="form-group col-md-4">
           <label><i>P.R.Interval</i></label>
           <input type="text" value="<?=$pr_interval?>" name="pr_interval" class="form-control" placeholder="P.R.Interval" required autocomplete="off">
        </div>

        <div class="form-group col-md-4">
           <label><i>Resting ECG</i></label>
           <input type="text" value="<?=$resting_ecg?>" name="resting_ecg" class="form-control" placeholder="Resting ECG" required autocomplete="off">
        </div>

        <div class="form-group col-md-4">
           <label><i>Suggestion</i></label>
           <input type="text" value="<?=$suggestion?>" name="suggestion" class="form-control" placeholder="Suggestion" required autocomplete="off">
        </div>

        <div class="form-group col-md-12">
           <label><i>Saran</i></label>
           <textarea name="saran" class="form-control" id="saran" placeholder="Saran" rows="5" required><?=$saran?></textarea>
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