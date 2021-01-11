<div id="respon1"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
<div class="col-md-4"><?php $this->load->view('mcu/laboratorium/kategori') ?></div>
<div class="col-md-8">
 <div class="box box-primary">
    <div class="panel-heading">
      <i class='fa fa-stethoscope fa-fw'></i> Form Hematologi - Leokosit
      <a href="<?=base_url()?>periksa_fisik" class="pull-right"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
    </div>
    <!--DEFINE VARIABLE -->
    <?php if($periksa->num_rows()>0){
        $get_basofil = explode("|", $periksa->row()->basofil);
        $basofil = $get_basofil[0];
        $basofil_ket = $get_basofil[1];

        $get_eosinofil = explode("|", $periksa->row()->eosinofil);
        $eosinofil = $get_eosinofil[0];
        $eosinofil_ket = $get_eosinofil[1];

        $get_netrofil_batang = explode("|", $periksa->row()->netrofil_batang);
        $netrofil_batang = $get_netrofil_batang[0];
        $netrofil_batang_ket = $get_netrofil_batang[1];

        $get_netrofil_segmen = explode("|", $periksa->row()->netrofil_segmen);
        $netrofil_segmen = $get_netrofil_segmen[0];
        $netrofil_segmen_ket = $get_netrofil_segmen[1];

        $get_limfosit = explode("|", $periksa->row()->limfosit);
        $limfosit = $get_limfosit[0];
        $limfosit_ket = $get_limfosit[1];

        $get_monosit = explode("|", $periksa->row()->monosit);
        $monosit = $get_monosit[0];
        $monosit_ket = $get_monosit[1];

        $get_led = explode("|", $periksa->row()->led);
        $led = $get_led[0];
        $led_ket = $get_led[1];

      }else{
        $basofil = false;
        $basofil_ket = false;

        $eosinofil = false;
        $eosinofil_ket = false;

        $netrofil_batang = false;
        $netrofil_batang_ket = false;

        $netrofil_segmen = false;
        $netrofil_segmen_ket = false;

        $limfosit = false;
        $limfosit_ket = false;

        $monosit = false;
        $monosit_ket = false;

        $led = false;
        $led_ket = false;

      }
    ?>
    <!-- END DEFINE VARIABLE -->
    <form method="post" action="<?=base_url()?>Laboratorium/entry_leokosit">
      <div class="box box-body">

        <div class="form-group col-xs-4">
           <label><i>Basofil</i></label>
           <input type="text" value="<?=$basofil?>" name="basofil" class="form-control" placeholder="Basofil" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$basofil_ket?>" name="basofil_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>Eosinofil</i></label>
           <input type="text" value="<?=$eosinofil?>" name="eosinofil" class="form-control" placeholder="Eosinofil" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$eosinofil_ket?>" name="eosinofil_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>Netrofil Batang</i></label>
           <input type="text" value="<?=$netrofil_batang?>" name="netrofil_batang" class="form-control" placeholder="Netrofil Batang" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$netrofil_batang_ket?>" name="netrofil_batang_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>Netrofil Segmen</i></label>
           <input type="text" value="<?=$netrofil_segmen?>" name="netrofil_segmen" class="form-control" placeholder="Netrofil Segmen" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$netrofil_segmen_ket?>" name="netrofil_segmen_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>Limfosit</i></label>
           <input type="text" value="<?=$limfosit?>" name="limfosit" class="form-control" placeholder="Limfosit" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$limfosit_ket?>" name="limfosit_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>Monosit</i></label>
           <input type="text" value="<?=$monosit?>" name="monosit" class="form-control" placeholder="Monosit" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$monosit_ket?>" name="monosit_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>LED</i></label>
           <input type="text" value="<?=$led?>" name="led" class="form-control" placeholder="LED" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$led_ket?>" name="led_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
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
  $('#ktg_leokosit').addClass('active');
</script>