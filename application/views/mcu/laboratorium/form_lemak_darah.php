<div id="respon1"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
<div class="col-md-4"><?php $this->load->view('mcu/laboratorium/kategori') ?></div>
<div class="col-md-8">
 <div class="box box-primary">
    <div class="panel-heading">
      <i class='fa fa-stethoscope fa-fw'></i> Form Kimia Darah - Lemak Darah
      <a href="<?=base_url()?>periksa_fisik" class="pull-right"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
    </div>
    <!--DEFINE VARIABLE -->
    <?php if($periksa->num_rows()>0){
        $get_kolesterol = explode("|", $periksa->row()->kolesterol);
        $kolesterol = $get_kolesterol[0];
        $kolesterol_ket = $get_kolesterol[1];

        $get_hdl = explode("|", $periksa->row()->hdl);
        $hdl = $get_hdl[0];
        $hdl_ket = $get_hdl[1];

        $get_ldl = explode("|", $periksa->row()->ldl);
        $ldl = $get_ldl[0];
        $ldl_ket = $get_ldl[1];

        $get_trigliserida = explode("|", $periksa->row()->trigliserida);
        $trigliserida = $get_trigliserida[0];
        $trigliserida_ket = $get_trigliserida[1];

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
        $kolesterol = false;
        $kolesterol_ket = false;

        $hdl = false;
        $hdl_ket = false;

        $ldl = false;
        $ldl_ket = false;

        $trigliserida = false;
        $trigliserida_ket = false;

        $limfosit = false;
        $limfosit_ket = false;

        $monosit = false;
        $monosit_ket = false;

        $led = false;
        $led_ket = false;

      }
    ?>
    <!-- END DEFINE VARIABLE -->
    <form method="post" action="<?=base_url()?>Laboratorium/entry_lemak_darah">
      <div class="box box-body">

        <div class="form-group col-xs-4">
           <label><i>Kolesterol</i></label>
           <input type="text" value="<?=$kolesterol?>" name="kolesterol" class="form-control" placeholder="Kolesterol" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$kolesterol_ket?>" name="kolesterol_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>HDL</i></label>
           <input type="text" value="<?=$hdl?>" name="hdl" class="form-control" placeholder="HDL" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$hdl_ket?>" name="hdl_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>LDL</i></label>
           <input type="text" value="<?=$ldl?>" name="ldl" class="form-control" placeholder="LDL" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$ldl_ket?>" name="ldl_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>Trigliserida</i></label>
           <input type="text" value="<?=$trigliserida?>" name="trigliserida" class="form-control" placeholder="Trigliserida" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$trigliserida_ket?>" name="trigliserida_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
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
  $('#ktg_lemak_darah').addClass('active');
</script>