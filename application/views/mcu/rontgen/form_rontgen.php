<div id="respon1"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
<div class="col-md-8">
 <div class="box box-primary">
    <div class="panel-heading">
      <i class='fa fa-stethoscope fa-fw'></i> Form Rontgen
      <a href="<?=base_url()?>periksa_fisik" class="pull-right"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
    </div>
    <!--DEFINE VARIABLE -->
    <?php if($periksa->num_rows()>0){
        $cor = $periksa->row()->cor;
        $pulmo = $periksa->row()->pulmo;
        $kesan = $periksa->row()->kesan;
        $jenis_periksa = $periksa->row()->jenis_periksa;
        $tgl_periksa = $periksa->row()->tgl_periksa;
        $saran = $periksa->row()->saran;
      }else{
        $cor = false;
        $pulmo = false;
        $kesan = false;
        $jenis_periksa = false;
        $tgl_periksa = false;
        $saran = false;
      }
    ?>
    <!-- END DEFINE VARIABLE -->
    <form method="post" action="<?=base_url()?>Rontgen/entry_data">
      <div class="box box-body">

        <div class="form-group col-md-12">
           <label><i>COR</i></label>
           <input type="text" value="<?=$cor?>" name="cor" class="form-control" placeholder="COR" required autocomplete="off">
        </div>

        <div class="form-group col-md-12">
           <label><i>Pulmo</i></label>
           <input type="text" value="<?=$pulmo?>" name="pulmo" class="form-control" placeholder="Pulmo" required autocomplete="off">
        </div>

        <div class="form-group col-md-12">
           <label><i>Kesan</i></label>
           <input type="text" value="<?=$kesan?>" name="kesan" class="form-control" placeholder="Kesan" required autocomplete="off">
        </div>

        <div class="form-group col-md-6">
           <label><i>Jenis Periksa</i></label>
           <input type="text" value="<?=$jenis_periksa?>" name="jenis_periksa" class="form-control" placeholder="Jenis Periksa" required autocomplete="off">
        </div>

        <div class="form-group col-md-6">
           <label><i>Tanggal Periksa</i></label>
           <input type="date" value="<?=$tgl_periksa?>" name="tgl_periksa" class="form-control" placeholder="Tanggal Periksa" required autocomplete="off">
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
  $('#m_rontgen').addClass('active');

  $('#saran').wysihtml5();
</script>