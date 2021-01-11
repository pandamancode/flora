<div id="respon1"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
<div class="col-md-4"><?php $this->load->view('mcu/laboratorium/kategori') ?></div>
<div class="col-md-8">
 <div class="box box-primary">
    <div class="panel-heading">
      <i class='fa fa-stethoscope fa-fw'></i> Form Kimia Darah - Fungsi Hati
      <a href="<?=base_url()?>periksa_fisik" class="pull-right"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
    </div>
    <!--DEFINE VARIABLE -->
    <?php if($periksa->num_rows()>0){
        $get_sgot = explode("|", $periksa->row()->sgot);
        $sgot = $get_sgot[0];
        $sgot_ket = $get_sgot[1];

        $get_sgpt = explode("|", $periksa->row()->sgpt);
        $sgpt = $get_sgpt[0];
        $sgpt_ket = $get_sgpt[1];

      }else{
        $sgot = false;
        $sgot_ket = false;

        $sgpt = false;
        $sgpt_ket = false;

      }
    ?>
    <!-- END DEFINE VARIABLE -->
    <form method="post" action="<?=base_url()?>Laboratorium/entry_hati">
      <div class="box box-body">

        <div class="form-group col-xs-4">
           <label><i>SGOT</i></label>
           <input type="text" value="<?=$sgot?>" name="sgot" class="form-control" placeholder="SGOT" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$sgot_ket?>" name="sgot_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>SGPT</i></label>
           <input type="text" value="<?=$sgpt?>" name="sgpt" class="form-control" placeholder="SGPT" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$sgpt_ket?>" name="sgpt_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-12 text-right">
            <input type="hidden" value="<?=$no_mcu?>" name="no_mcu">
            <button type="submit" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-save"></i> Simpan Pemeriksaan</button>
        </div>
      </div>    
    </form>
  </div>
  
</div>
</div>
<div id="tempat-modal"></div>

<script type="text/javascript">
  setTimeout(function() {document.getElementById('respon1').innerHTML='';},2000);
  $('#m_mcu').addClass('active');
  $('#m_ekg').addClass('active');
  $('#ktg_fungsi_hati').addClass('active');
</script>