<div id="respon1"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
   <div class="col-md-8">
      <div class="box box-primary">
         <div class="panel-heading">
            <i class='fa fa-stethoscope fa-fw'></i> Form Pemeriksaan Fisik
            <a href="<?=base_url()?>periksa_fisik" class="pull-right"><i class="fa fa-arrow-circle-left"></i>
               Kembali</a>
         </div>
         <!--DEFINE VARIABLE -->
         <?php 
            if($periksa->num_rows()>0){
               $keluhan = $periksa->row()->keluhan;
               $operasi = $periksa->row()->operasi;
               $pengobatan = $periksa->row()->pengobatan;
               $konsumsi_obat = $periksa->row()->konsumsi_obat;
               $tb = $periksa->row()->tb;
               $bb = $periksa->row()->bb;
               $bi = $periksa->row()->bb_ideal;
               $lp = $periksa->row()->lp;
               $imt = $periksa->row()->imt;
               $persen_lemak = $periksa->row()->persen_lemak;
               $tekanan_darah = $periksa->row()->tekanan_darah;
               $suhu = $periksa->row()->suhu;
               $nadi = $periksa->row()->nadi;
               $penglihatan = $periksa->row()->penglihatan;
               $saran = $periksa->row()->saran;
            }else{
               $keluhan = false;
               $operasi = false;
               $pengobatan = false;
               $konsumsi_obat = false;
               $tb = false;
               $bb = false;
               $bi = false;
               $lp = false;
               $imt = false;
               $persen_lemak = false;
               $tekanan_darah = false;
               $suhu = false;
               $nadi = false;
               $penglihatan = false;
               $saran = false;
            }
         ?>
         <!-- END DEFINE VARIABLE -->
         <form method="post" action="<?=base_url()?>periksa_fisik/entry_data">
            <div class="box box-body">

               <div class="form-group col-md-12">
                  <label><i>Keluhan</i></label>
                  <textarea class="form-control" name="keluhan" id="keluhan"
                     placeholder="Keluhan"><?=$keluhan?></textarea>
               </div>

               <div class="form-group col-md-4">
                  <label><i>Riwayat Operasi</i></label>
                  <input type="text" value="<?=$operasi?>" name="operasi" class="form-control"
                     placeholder="Riwayat Operasi" required autocomplete="off">
               </div>

               <div class="form-group col-md-4">
                  <label><i>Riwayat Pengobatan</i></label>
                  <input type="text" value="<?=$pengobatan?>" name="pengobatan" class="form-control"
                     placeholder="Riwayat Pengobatan" required autocomplete="off">
               </div>

               <div class="form-group col-md-4">
                  <label><i>Riwayat Konsumsi Obat</i></label>
                  <input type="text" value="<?=$konsumsi_obat?>" name="konsumsi_obat" class="form-control"
                     placeholder="Riwayat Konsumsi Obat" required autocomplete="off">
               </div>

               <div class="form-group col-md-3">
                  <label><i>Tinggi Badan</i></label>
                  <input type="text" value="<?=$tb?>" name="tb" onchange="hitung_imt()" id="tb" class="form-control"
                     placeholder="Tinggi Badan" required autocomplete="off">
               </div>

               <div class="form-group col-md-3">
                  <label><i>Berat Badan</i></label>
                  <input type="text" value="<?=$bb?>" name="bb" onchange="hitung_imt()" id="bb" class="form-control"
                     placeholder="Berat Badan" required autocomplete="off">
               </div>

               <div class="form-group col-md-3">
                  <label><i>Berat Badan Ideal</i></label>
                  <input type="text" value="<?=$bb?>" name="bb_ideal" class="form-control"
                     placeholder="Berat Badan Ideal" required autocomplete="off">
               </div>

               <div class="form-group col-md-3">
                  <label><i>Lingkar Perut</i></label>
                  <input type="text" value="<?=$lp?>" name="lp" id="lp" class="form-control" placeholder="Lingkar Perut"
                     required autocomplete="off">
               </div>

               <div class="form-group col-md-3">
                  <label><i>IMT</i></label>
                  <input type="text" value="<?=$imt?>" name="imt" id="imt" class="form-control" placeholder="IMT"
                     readonly autocomplete="off">
               </div>

               <div class="form-group col-md-3">
                  <label><i>Persen Lemak</i></label>
                  <input type="text" value="<?=$persen_lemak?>" name="persen_lemak" class="form-control"
                     placeholder="Persen Lemak" required autocomplete="off">
               </div>

               <div class="form-group col-md-3">
                  <label><i>Tekanan Darah</i></label>
                  <input type="text" value="<?=$tekanan_darah?>" name="tekanan_darah" id="tekanan_darah" class="form-control"
                     placeholder="Tekanan Darah" required autocomplete="off">
               </div>

               <div class="form-group col-md-3">
                  <label><i>Suhu</i></label>
                  <input type="text" value="<?=$suhu?>" name="suhu" id="suhu" class="form-control"
                     placeholder="Suhu" required autocomplete="off">
               </div>

               <div class="form-group col-md-6">
                  <label><i>Nadi</i></label>
                  <input type="text" value="<?=$nadi?>" name="nadi" class="form-control" placeholder="Nadi" required
                     autocomplete="off">
               </div>

               <div class="form-group col-md-6">
                  <label><i>Penglihatan</i></label>
                  <input type="text" value="<?=$penglihatan?>" name="penglihatan" class="form-control"
                     placeholder="Penglihatan Tanpa kacamata" required autocomplete="off">
               </div>

               <div class="form-group col-md-12">
                  <label><i>Saran</i></label>
                  <textarea name="saran" class="form-control" id="saran" placeholder="Saran" rows="5"
                     required><?=$saran?></textarea>
               </div>

               <div class="form-group col-md-12 text-right">
                  <input type="hidden" value="<?=$no_mcu?>" name="no_mcu">
                  <button type="submit" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-save"></i> Simpan
                     Pemeriksaan</button>
               </div>
            </div>
         </form>
      </div>

   </div>
   <div class="col-md-4"><?php $this->load->view('mcu/identitas')?></div>
</div>
<div id="tempat-modal"></div>

<script type="text/javascript">
   setTimeout(function () {
      document.getElementById('respon1').innerHTML = '';
   }, 2000);
   $('#m_mcu').addClass('active');
   $('#m_pemeriksaan_fisik').addClass('active');

   $('#saran').wysihtml5();

   function hitung_imt() {
      var tb = $('#tb').val();
      var bb = $('#bb').val();


      if (tb == null || tb == '') {
         return false;
      }

      if (bb == null || tb == '') {
         return false;
      }

      var convert = (tb / 100);
      var hitung = bb / (convert * convert);

      $('#imt').val(Math.floor(hitung));

   }
</script>