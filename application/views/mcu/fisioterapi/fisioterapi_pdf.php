<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fisioterapi</title>
  <link href="<?php echo base_url(); ?>assets/w3/w3.css" rel="stylesheet">
<body>

  <body>
    <div class="w3-auto">
      
      <p align="center"><br><b>KARTU PASIEN FISIOTERAPI</b></p>
      <br><br>
      <table style="width:100%; border-collapse: collapse; font-size:12px;">
        <tr>
          <td width="15%">NAMA</td>
          <td width="2%">:</td>
          <td><?=$pasien->nama_pasien;?></td>
        </tr>
        <tr>
          <td>UMUR</td>
          <td>:</td>
          <td>
              <?php
                $tgl = date('Y',strtotime($pasien->tgl_lahir));
                $now = date('Y');

                echo $now-$tgl.' Tahun';
              ?>
          </td>
        </tr>
        <tr>
          <td>ALAMAT</td>
          <td>:</td>
          <td><?= $pasien->alamat?></td>
        </tr>
        <tr>
          <td>NO. HP</td>
          <td>:</td>
          <td><?= $pasien->no_telp; ?></td>
        </tr>
      </table>

      <br>

      <table style="width:100%; border-collapse: collapse; font-size:12px;" border="1">
        <tr>
            <td align="center"><strong>No</strong></td>
            <td align="center"><strong>Tanggal</strong></td>
            <td align="center"><strong>Keterangan</strong></td>
            <td align="center"><strong>Diagnosa</strong></td>
            <td align="center"><strong>Tindakan</strong></td>
            <td align="center"><strong>Evaluasi</strong></td>
        </tr>
        <?php $no=0; foreach($fisioterapi->result() as $r){ $no++; ?>
        <tr>
            <td align="center"><?=$no?></td>
            <td align="center"><?=date('d-m-Y',strtotime($r->tgl_mcu))?></td>
            <td>&nbsp;<?=$r->keterangan?></td>
            <td>&nbsp;<?=$r->diagnosa?></td>
            <td>&nbsp;<?=$r->tindakan?></td>
            <td>&nbsp;<?=$r->evaluasi?></td>
        </tr>
        <?php } ?>
      </table>

      <br><br>
      
    </div>

    <script type="text/javascript">
      window.print();
    </script>
  </body>

</html>