<div id="respon1"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
<div class="col-md-4"><?php $this->load->view('mcu/laboratorium/kategori') ?></div>
<div class="col-md-8">
 <div class="box box-primary">
    <div class="panel-heading">
      <i class='fa fa-stethoscope fa-fw'></i> Form Hematologi - Darah Lengkap
      <a href="<?=base_url()?>periksa_fisik" class="pull-right"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
    </div>
    <!--DEFINE VARIABLE -->
    <?php if($periksa->num_rows()>0){
        $get_hemoglobin = explode("|", $periksa->row()->hemoglobin);
        $hemoglobin = $get_hemoglobin[0];
        $hemoglobin_ket = $get_hemoglobin[1];

        $get_eritrosit = explode("|", $periksa->row()->eritrosit);
        $eritrosit = $get_eritrosit[0];
        $eritrosit_ket = $get_eritrosit[1];

        $get_hematokrit = explode("|", $periksa->row()->hematokrit);
        $hematokrit = $get_hematokrit[0];
        $hematokrit_ket = $get_hematokrit[1];

        $get_lekosit = explode("|", $periksa->row()->lekosit);
        $lekosit = $get_lekosit[0];
        $lekosit_ket = $get_lekosit[1];

        $get_trombosit = explode("|", $periksa->row()->trombosit);
        $trombosit = $get_trombosit[0];
        $trombosit_ket = $get_trombosit[1];

        $get_mcv = explode("|", $periksa->row()->mcv);
        $mcv = $get_mcv[0];
        $mcv_ket = $get_mcv[1];

        $get_mch = explode("|", $periksa->row()->mch);
        $mch = $get_mch[0];
        $mch_ket = $get_mch[1];

        $get_mchc = explode("|", $periksa->row()->mchc);
        $mchc = $get_mchc[0];
        $mchc_ket = $get_mchc[1];

      }else{
        $hemoglobin = false;
        $hemoglobin_ket = false;

        $eritrosit = false;
        $eritrosit_ket = false;

        $hematokrit = false;
        $hematokrit_ket = false;

        $lekosit = false;
        $lekosit_ket = false;

        $trombosit = false;
        $trombosit_ket = false;

        $mcv = false;
        $mcv_ket = false;

        $mch = false;
        $mch_ket = false;

        $mchc = false;
        $mchc_ket = false;

      }
    ?>
    <!-- END DEFINE VARIABLE -->
    <form method="post" action="<?=base_url()?>Laboratorium/entry_darah_lengkap">
      <div class="box box-body">

        <div class="form-group col-xs-4">
           <label><i>Hemoglobin</i></label>
           <input type="text" value="<?=$hemoglobin?>" name="hemoglobin" class="form-control" placeholder="Hemoglobin" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$hemoglobin_ket?>" name="hemoglobin_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>Eritrosit</i></label>
           <input type="text" value="<?=$eritrosit?>" name="eritrosit" class="form-control" placeholder="Eritrosit" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$eritrosit_ket?>" name="eritrosit_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>Hematokrit</i></label>
           <input type="text" value="<?=$hematokrit?>" name="hematokrit" class="form-control" placeholder="Hematokrit" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$hematokrit_ket?>" name="hematokrit_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>Lekosit</i></label>
           <input type="text" value="<?=$lekosit?>" name="lekosit" class="form-control" placeholder="Lekosit" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$lekosit_ket?>" name="lekosit_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>Trombosit</i></label>
           <input type="text" value="<?=$trombosit?>" name="trombosit" class="form-control" placeholder="Trombosit" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$trombosit_ket?>" name="trombosit_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>MCV</i></label>
           <input type="text" value="<?=$mcv?>" name="mcv" class="form-control" placeholder="MCV" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$mcv_ket?>" name="mcv_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>MCH</i></label>
           <input type="text" value="<?=$mch?>" name="mch" class="form-control" placeholder="MCH" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$mch_ket?>" name="mch_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>MCHC</i></label>
           <input type="text" value="<?=$mchc?>" name="mchc" class="form-control" placeholder="MCHC" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$mchc_ket?>" name="mchc_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
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
  $('#ktg_lengkap').addClass('active');
</script>