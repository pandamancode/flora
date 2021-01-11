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
            <p align="center" style="font-size:17px">LAPORAN RANKING PEMAIKAN OBAT</p>
            <p align="center" style="font-size:17px"><?=$perusahaan->nama_perusahaan?></p>
            <p align="center" style="font-size:15px"><?=$perusahaan->alamat?></p>
            <p align="center" style="font-size:15px"><?=$perusahaan->no_telp?></p></th>
        <td width="75px" style="border: 1px solid #ffffff;">&nbsp;</td>
    </tr>
    </tbody>
</table>
<hr class="style-seven">

<table width="100%" align="center">
    <thead>
        <tr>
            <th align="center" width="5%">No</th>
            <th class="text-center">Kode Obat</th>
            <th class="text-center">Nama Obat</th>
            <th class="text-center">Jenis</th>
            <th class="text-center">Jumlah</th>            
        </tr>
    </thead>
    <tbody>
    <?php
        if($rank_obat->num_rows()>0){
        $no = 0;
        foreach($rank_obat->result() as $r){
            $no++;            
    ?>
    
        <tr>
            <td style="vertical-align:middle;" align="center"><?php echo $no; ?></td>
            <td style="vertical-align:middle;"><?=$r->kode_obat?></td>            
            <td style="vertical-align:middle;"><?=$r->nama_obat ?></td>
            <td style="vertical-align:middle;"><?=$r->jenis?></td>
            <td style="vertical-align:middle;" align="right"><?=$r->rank_obat?>&nbsp;</td>
            
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