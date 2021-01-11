<!DOCTYPE html>
<html>
<head>
    <title>Laporan</title>
    <style type="text/css">
        #outtable {
            padding: 20px;
            border: 1px solid #e3e3e3;
            width: 100%;
            border-radius: 5px;
        }

        .short {
            width: 25px;
        }

        .normal {
            width: 50px;
        }

        .lebar {
            width: 100px;
        }

        p {
            line-height: 0.5;
            font-family: Helvetica;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            /*font-family: Arial Narrow;
			src: url('ARIALN.TTF');*/
            font-family: Helvetica;
            font-size: 10pt;
            color: #000000;
            /*margin: 0 auto;*/
        }

        table td {
            border: 1px solid #000000;
            padding: 3px;
            vertical-align: middle;
        }

        thead th {
            border: 1px solid #000000;
            padding: 3px;
            font-weight: bold;
            text-align: center;
            /*background-color: #525659;*/
            color: #000000;
        }

        /*tfoot td {
            border: 0px solid #FFFFFF;
            padding: 3px;
            vertical-align: middle;
        }*/
      
      	hr.style-seven {
    overflow: visible; /* For IE */
    height: 30px;
    border-style: solid;
    border-color: black;
    border-width: 1px 0 0 0;
    border-radius: 20px;
}
hr.style-seven:before { /* Not really supposed to work, but does */
    display: block;
    content: "";
    height: 30px;
    margin-top: -31px;
    border-style: solid;
    border-color: black;
    border-width: 0 0 1px 0;
    border-radius: 20px;
}

    </style>
</head>
<body onload="window.print()">
<table width="100%" border="0">
    <tbody>
    <tr>
        <th align="center" valign="middle" style="font-family: 'Arial Narrow'; color: #000000;">
            <p align="center" style="font-size:17px">LAPORAN PENJUALAN</p>
            <p align="center" style="font-size:17px"><?=$perusahaan->nama_perusahaan?></p>
            <p align="center" style="font-size:15px"><?=$perusahaan->alamat?></p>
            <p align="center" style="font-size:15px"><?=$perusahaan->no_telp?></p></th>
        <td width="75px" style="border: 1px solid #ffffff;">&nbsp;</td>
    </tr>
    </tbody>
</table>
<hr class="style-seven">
<table width="100%" border="0">
    <tbody>
        <tr>
            <th align="left" style="border:0px solid #ffffff; width:25px;">Kasir</th>
            <th align="left" style="border:0px solid #ffffff;">: &nbsp; <?//=$kasir->nama_user?></th>
        </tr>
    </tbody>    
</table>
<br>
<table width="100%" align="center">
    <thead>
        <tr>
            <th align="center" width="5%">No</th>
            <th class="text-center">Nomor Nota</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Produk</th>
            <th class="text-center">Qty</th>
            <th class="text-center">Total Bayar</th>
        </tr>
    </thead>
    <tbody>
    <?php
        if($result->num_rows()>0){
        $no = 0;
        foreach($result->result() as $r){
            $no++;
            $transaksi = $this->db->query("SELECT * FROM tb_penjualan, tb_produk WHERE tb_penjualan.kode_produk=tb_produk.kode_produk AND tb_penjualan.nomor_nota='$r->nomor_nota' ");
    ?>
    
        <tr>
            <td style="vertical-align:middle;" align="center"><?php echo $no; ?></td>
            <td style="vertical-align:middle;"><?=$r->nomor_nota?></td>
            <td style="vertical-align:middle;"><?=tgl_indo(date('Y-m-d',strtotime($r->tgl_bayar)))?></td>
            <td style="vertical-align:middle;"><?php foreach($transaksi->result() as $p){ echo "<p>".$p->nama_produk."</p>";} ?></td>
            <td style="vertical-align:middle;"><?php foreach($transaksi->result() as $p){ echo "<p>".$p->qty." ".$p->satuan_produk."</p>";} ?></td>
            <td style="vertical-align:middle;" align="right"><?=format_rp($r->jumlah_bayar)?>&nbsp;</td>
            
        </tr>
        
    <?php
        }
        }else{ echo "<tr><td colspan='6'><i>Tidak Ada Transaksi</i></td></tr>"; }
    ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5"><b><i>Jumlah Pendapatan</i></b></td>
            <td align="right"><b><i><?php if($total->num_rows()>0){ echo format_rp($total->row()->total); } ?></i></b></td>
        </tr>
    </tfoot>
</table>

</body>
  
</html>