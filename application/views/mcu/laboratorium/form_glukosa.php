<div id="respon1"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
<div class="col-md-4"><?php $this->load->view('mcu/laboratorium/kategori') ?></div>
<div class="col-md-8">
 <div class="box box-primary">
    <div class="panel-heading">
      <i class='fa fa-stethoscope fa-fw'></i> Form Kimia Darah - Glukosa Darah
      <a href="<?=base_url()?>periksa_fisik" class="pull-right"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
    </div>
    <!--DEFINE VARIABLE -->
    <?php if($periksa->num_rows()>0){
        $get_sewaktu = explode("|", $periksa->row()->sewaktu);
        $sewaktu = $get_sewaktu[0];
        $sewaktu_ket = $get_sewaktu[1];

        $get_puasa = explode("|", $periksa->row()->puasa);
        $puasa = $get_puasa[0];
        $puasa_ket = $get_puasa[1];

      }else{
        $sewaktu = false;
        $sewaktu_ket = false;

        $puasa = false;
        $puasa_ket = false;

      }
    ?>
    <!-- END DEFINE VARIABLE -->
    <form method="post" action="<?=base_url()?>Laboratorium/entry_glukosa">
      <div class="box box-body">

        <div class="form-group col-xs-4">
           <label><i>Sewaktu</i></label>
           <input type="text" value="<?=$sewaktu?>" name="sewaktu" class="form-control" placeholder="Sewaktu" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$sewaktu_ket?>" name="sewaktu_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>Puasa</i></label>
           <input type="text" value="<?=$puasa?>" name="puasa" class="form-control" placeholder="Puasa" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$puasa_ket?>" name="puasa_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
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
  $('#ktg_glukosa').addClass('active');
</script>