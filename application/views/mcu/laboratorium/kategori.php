<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Hematologi</h3>
    <div class="box-tools">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="box-body no-padding">
    <ul class="nav nav-pills nav-stacked">
      <li id="ktg_lengkap"><a href="<?=base_url()?>laboratorium/hasil/<?=$no_mcu?>"><i class="fa fa-circle-o text-yellow"></i> Darah Lengkap</a></li>
      <li id="ktg_leokosit"><a href="<?=base_url()?>laboratorium/leokosit/<?=$no_mcu?>"><i class="fa fa-circle-o text-yellow"></i> Jenis Leokosit</a></li>
    </ul>
  </div>
</div>

<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Kimia Darah</h3>
    <div class="box-tools">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="box-body no-padding">
    <ul class="nav nav-pills nav-stacked">
      <li id="ktg_lemak_darah"><a href="<?=base_url()?>laboratorium/lemak/<?=$no_mcu?>"><i class="fa fa-circle-o text-yellow"></i> Lemak Darah</a></li>
      <li id="ktg_fungsi_ginjal"><a href="<?=base_url()?>laboratorium/ginjal/<?=$no_mcu?>"><i class="fa fa-circle-o text-yellow"></i> Fungsi Ginjal</a></li>
      <li id="ktg_fungsi_hati"><a href="<?=base_url()?>laboratorium/hati/<?=$no_mcu?>"><i class="fa fa-circle-o text-yellow"></i> Fungsi Hati</a></li>
      <li id="ktg_glukosa"><a href="<?=base_url()?>laboratorium/glukosa/<?=$no_mcu?>"><i class="fa fa-circle-o text-yellow"></i> Glukosa Darah</a></li>
    </ul>
  </div>
</div>


<?php $this->load->view('mcu/identitas')?>