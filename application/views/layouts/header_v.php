<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container-fluid">
    <div class="navbar-header">
      <a href="javascript:;" class="navbar-brand"><b>Kalo </b> Klinik</a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <i class="fa fa-bars"></i>
      </button>
    </div>
    
    <div class="collapse navbar-collapse" id="navbar-collapse">
      <ul class="nav navbar-nav">
        <li id="m_home"><a href="<?=base_url()?>home"><i class="fa fa-home"></i> Home</a></li>

        <li class="dropdown" id="m_master">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bookmark"></i> Master Data <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li id="m_pasien"><a href="<?=base_url()?>pasien"><i class="fa fa-user"></i> Pasien</a></li>
            <!-- <li id="m_petugas"><a href="<?=base_url()?>petugas"><i class="fa fa-user-md"></i> Petugas</a></li>
            <li id="m_obat"><a href="<?=base_url()?>obat"><i class="fa fa-tag"></i> Obat</a></li> -->
            <li id="m_barcode"><a href="<?=base_url()?>home/barcode"><i class="fa fa-barcode"></i> Buat Barcode</a></li>
          </ul>
        </li>

        <li class="dropdown" id="m_poliumum">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-md"></i> Poli Umum <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li id="m_reg_poliumum"><a href="<?=base_url()?>pendaftaran"><i class="fa fa-edit"></i> Register Poli Umum</a></li>
            <li id="m_rekamedis"><a href="<?=base_url()?>poli_umum"><i class="fa fa-stethoscope"></i> Rekam Medis</a></li>
          </ul>
        </li>

        <li class="dropdown" id="m_mcu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bed"></i> MCU <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li id="m_mcu_reg"><a href="<?=base_url()?>register_mcu"><i class="fa fa-edit"></i> Register MCU</a></li>
            <li id="m_pemeriksaan_fisik"><a href="<?=base_url()?>periksa_fisik"><i class="fa fa-file-text-o"></i> Entry Hasil MCU</a></li>
          </ul>
        </li>

        <li><a href="<?=base_url()?>home"><i class="fa fa-bed"></i> Fisioterapi</a></li>

        <li class="dropdown" id="m_laporan">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-text-o"></i> Laporan <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li id="m_lap_kunjungan"><a href="<?=base_url()?>laporan">Pasien Poli Umum</a></li>
            <li id="m_lap_mcu"><a href="<?=base_url()?>laporan/mcu">Pasien MCU</a></li>
          </ul>
        </li>

      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><input type="hidden" class="form-control" value="<?= $this->session->userdata('id_user'); ?>" id="txtstatus"></li>
        <li><a href="<?=base_url()?>logout"><i class="fa fa-sign-out"></i> Logout</a></li>
      </ul>
    </div>
    </div>
  </nav>
</header>
