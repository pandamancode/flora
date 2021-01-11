<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Nota</title>
<link href="<?php echo base_url(); ?>assets/w3/w3.css" rel="stylesheet">
<body>
<body>

<div class="w3-col w3-container w3-center" >
  <br>
  <p><b>Praktik Klinik Keperawatan Suwanto</b></p>
  <p>Jl. Soekarno Hatta No 04. Dusun IV Desa Sribhawono, Kec. Bandar Sribhawono, Kab LamTim</p>
</div>

<div class="w3-auto">

     <div class="w3-half w3-container" style="font-size: 11px;">
      <p>Tanggal&emsp;&nbsp; : <?php echo date('d-m-Y',strtotime($tgl)); ?></p>
      <p>No&nbsp;Invoice&emsp; : <?=$no;?></p>
      <p>Nama&nbsp;Pasien : <?=$nama_pasien;?></p>
    </div> 
    
  <div class="w3-row">
    <table class="w3-table w3-border-bottom">
      <tr class="w3-border-bottom w3-border-top" style="font-size: 11px;">
        <th>No</th>
        <th>Produk</th>
        <th>Harga</th>
        <th>Qty</th>        
        <th>Total</th>
      </tr>
      <?php $g = 1;
              foreach ($plant as $dk){; ?>
              <tr style="font-size: 11px;">
                  <td><?= $g++?></td>
                  <td><?= $dk['nama_obat']; ?></td>
                  <td>Rp.&nbsp;<?php echo number_format($dk['harga_jual'],0,".","."); ?></td>
                  <td><?= $dk['qty'] ?></td>                  
                  <td style="border-bottom: medium;">Rp.&nbsp;<?php echo number_format($dk['ttl_harga'],0,".","."); ?></td>
              </tr>
            <?php } ?>
    </table>
  </div>
  <div class="w3-row w3-container w3-border-bottom">
    <p style="font-size: 11px" ><b>Biaya&nbsp;Admin&nbsp;<i>Rp.</i>&nbsp;<?= number_format($r['biaya_admin'],0,".",".");?></b>
    </p>
    <p style="font-size: 11px" ><b>Biaya&nbsp;Obat&nbsp;<i>Rp.</i>&nbsp;<?= number_format($r['biaya_obat'],0,".",".");?></b>
    </p>
    <p style="font-size: 11px" ><b>Total&nbsp;Bayar&nbsp;<i>Rp.</i>&nbsp;<?= number_format($r['biaya_obat']+$r['biaya_admin'],0,".",".");?></b>
    </p>

    <p style="font-size: 11px; text-align: center">Terimakasih dan semoga lekas sembuh ...</p>
  </div>

</div>


&nbsp;



</body>
</html>