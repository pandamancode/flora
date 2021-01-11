<div id="respon1"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
<div class="col-md-4"><?php $this->load->view('mcu/laboratorium/kategori') ?></div>
<div class="col-md-8">
 <div class="box box-primary">
    <div class="panel-heading">
      <i class='fa fa-stethoscope fa-fw'></i> Form Immunologi
      <a href="<?=base_url()?>periksa_fisik" class="pull-right"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
    </div>
    <!--DEFINE VARIABLE -->
    <?php if($periksa->num_rows()>0){
        $get_widal = explode("|", $periksa->row()->widal);
        $widal = $get_widal[0];
        $widal_ket = $get_widal[1];

        $get_salmonela = explode("|", $periksa->row()->salmonela);
        $salmonela = $get_salmonela[0];
        $salmonela_ket = $get_salmonela[1];

        $get_malaria = explode("|", $periksa->row()->malaria);
        $malaria = $get_malaria[0];
        $malaria_ket = $get_malaria[1];

        $get_dhf = explode("|", $periksa->row()->dhf);
        $dhf = $get_dhf[0];
        $dhf_ket = $get_dhf[1];

        $get_hbsag = explode("|", $periksa->row()->hbsag);
        $hbsag = $get_hbsag[0];
        $hbsag_ket = $get_hbsag[1];

        $get_narkoba = explode("|", $periksa->row()->narkoba);
        $narkoba = $get_narkoba[0];
        $narkoba_ket = $get_narkoba[1];

        $get_sifilis = explode("|", $periksa->row()->sifilis);
        $sifilis = $get_sifilis[0];
        $sifilis_ket = $get_sifilis[1];

        $get_hiv = explode("|", $periksa->row()->hiv);
        $hiv = $get_hiv[0];
        $hiv_ket = $get_hiv[1];

      }else{
        $widal = false;
        $widal_ket = false;

        $salmonela = false;
        $salmonela_ket = false;

        $malaria = false;
        $malaria_ket = false;

        $dhf = false;
        $dhf_ket = false;

        $hbsag = false;
        $hbsag_ket = false;

        $narkoba = false;
        $narkoba_ket = false;

        $sifilis = false;
        $sifilis_ket = false;

        $hiv = false;
        $hiv_ket = false;

      }
    ?>
    <!-- END DEFINE VARIABLE -->
    <form method="post" action="<?=base_url()?>Laboratorium/entry_immunologi">
      <div class="box box-body">

        <div class="form-group col-xs-4">
           <label><i>Widal</i></label>
           <input type="text" value="<?=$widal?>" name="widal" class="form-control" placeholder="Widal" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$widal_ket?>" name="widal_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>Salmonela</i></label>
           <input type="text" value="<?=$salmonela?>" name="salmonela" class="form-control" placeholder="Salmonela" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$salmonela_ket?>" name="salmonela_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>Malaria</i></label>
           <input type="text" value="<?=$malaria?>" name="malaria" class="form-control" placeholder="Malaria" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$malaria_ket?>" name="malaria_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>DHF</i></label>
           <input type="text" value="<?=$dhf?>" name="dhf" class="form-control" placeholder="DHF" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$dhf_ket?>" name="dhf_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>HBsag</i></label>
           <input type="text" value="<?=$hbsag?>" name="hbsag" class="form-control" placeholder="HBsag" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$hbsag_ket?>" name="hbsag_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>Narkoba</i></label>
           <input type="text" value="<?=$narkoba?>" name="narkoba" class="form-control" placeholder="Narkoba" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$narkoba_ket?>" name="narkoba_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>Sifilis</i></label>
           <input type="text" value="<?=$sifilis?>" name="sifilis" class="form-control" placeholder="Sifilis" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$sifilis_ket?>" name="sifilis_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>HIV</i></label>
           <input type="text" value="<?=$hiv?>" name="hiv" class="form-control" placeholder="HIV" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$hiv_ket?>" name="hiv_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
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
  $('#ktg_imun').addClass('active');
</script>