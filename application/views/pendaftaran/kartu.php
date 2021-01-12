<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kartu Registrasi</title>
  <link href="<?php echo base_url(); ?>assets/w3/w3.css" rel="stylesheet">

<body>

  <body>
    &nbsp;
    <div class="w3-auto" style="border-bottom: double;">
      <div class="w3-col w3-container w3-center" style="border-bottom: double;">
        <h2><b>Klinik Flora</b></h2>
        <p>Jl. Pagar Alam, Segala Mider, Kec. Tj. Karang Barat, Kota Bandar Lampung</p>
        <p>Telp. 0812-7254-3359</p>
      </div>
      <p align="center"><br><b>IDENTITAS PASIEN</b></p>
      <table class="w3-table" style="font-size:12px">
        <tr>
          <th>No Registrasi</th>
          <th>:</th>
          <td><?= $dk->no_registrasi;?></td>
          <td width="25%">Tanggal : <?=tgl_indo(date('Y-m-d',strtotime($dk->date_created)))?></td>
        </tr>
        <tr>
          <th>No.&nbsp;RM</th>
          <th>:</th>
          <td>RM<?=$dk->no_registrasi;?></td>
        </tr>
        <tr>
          <th>Tanggal&nbsp;Registrasi</th>
          <th>:</th>
          <td><?=tgl_indo(date('Y-m-d',strtotime($dk->date_created)))?></td>
        </tr>
        <tr>
          <th>NIK/No&nbsp;KTP</th>
          <th>:</th>
          <td><?= $dk->nik?></td>
        </tr>
        <tr>
          <th>Nama&nbsp;Pasien</th>
          <th>:</th>
          <td><?= $dk->nama_pasien; ?></td>
        </tr>
        <tr>
          <th>No&nbsp;Telpon/HP</th>
          <th>:</th>
          <td><?= $dk->no_telp; ?></td>
        </tr>
        <tr>
          <th>Tempat/Tgl Lahir</th>
          <th>:</th>
          <td><?php echo date('d-m-Y',strtotime($dk->tgl_lahir)); ?></td>
        </tr>
        <tr>
          <th>Jenis Kelamin</th>
          <th>:</th>
          <td><?= $dk->gender; ?></td>
        </tr>
        <tr>
          <th>Alamat</th>
          <th>:</th>
          <td><?= $dk->alamat?></td>
        </tr>

      </table>
    </div>

    <script type="text/javascript">
      window.print();
    </script>
  </body>

</html>