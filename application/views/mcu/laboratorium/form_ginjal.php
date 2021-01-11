<div id="respon1"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
<div class="col-md-4"><?php $this->load->view('mcu/laboratorium/kategori') ?></div>
<div class="col-md-8">
 <div class="box box-primary">
    <div class="panel-heading">
      <i class='fa fa-stethoscope fa-fw'></i> Form Kimia Darah - Fungsi Ginjal
      <a href="<?=base_url()?>periksa_fisik" class="pull-right"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
    </div>
    <!--DEFINE VARIABLE -->
    <?php if($periksa->num_rows()>0){
        $get_ureum = explode("|", $periksa->row()->ureum);
        $ureum = $get_ureum[0];
        $ureum_ket = $get_ureum[1];

        $get_kreatinin = explode("|", $periksa->row()->kreatinin);
        $kreatinin = $get_kreatinin[0];
        $kreatinin_ket = $get_kreatinin[1];

        $get_asam_urat = explode("|", $periksa->row()->asam_urat);
        $asam_urat = $get_asam_urat[0];
        $asam_urat_ket = $get_asam_urat[1];

      }else{
        $ureum = false;
        $ureum_ket = false;

        $kreatinin = false;
        $kreatinin_ket = false;

        $asam_urat = false;
        $asam_urat_ket = false;

      }
    ?>
    <!-- END DEFINE VARIABLE -->
    <form method="post" action="<?=base_url()?>Laboratorium/entry_ginjal">
      <div class="box box-body">

        <div class="form-group col-xs-4">
           <label><i>Ureum</i></label>
           <input type="text" value="<?=$ureum?>" name="ureum" class="form-control" placeholder="Ureum" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$ureum_ket?>" name="ureum_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>Kreatinin</i></label>
           <input type="text" value="<?=$kreatinin?>" name="kreatinin" class="form-control" placeholder="Kreatinin" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$kreatinin_ket?>" name="kreatinin_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
        </div>

        <div class="form-group col-xs-4">
           <label><i>Asam Urat</i></label>
           <input type="text" value="<?=$asam_urat?>" name="asam_urat" class="form-control" placeholder="Asam Urat" autocomplete="off">
        </div>

        <div class="form-group col-xs-8">
           <label><i>Keterangan</i></label>
           <input type="text" value="<?=$asam_urat_ket?>" name="asam_urat_ket" class="form-control" placeholder="Keterangan" autocomplete="off">
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
  $('#ktg_fungsi_ginjal').addClass('active');
</script>