<hr>
<div class="table-responsive">
<table class="table table-bordered table-striped" id="konfir">
    <thead>
     <tr>
            <th colspan="100000"><?=$this->judul?></th>   
     </tr>
        <tr style="background-color:#00c0ef; color:white;">
            <th class="text-center" width="5%">#</th>
            <th class="text-left">Nomor Registrasi</th>
            <th class="text-left">Nama Pasien</th>
            <th class="text-center">Tanggal Pelayanan</th>
            <th class="text-right">Biaya Obat</th>
            <th class="text-right">Biaya Layanan</th>
            <th class="text-right">Biaya Lain-lain</th>
            <th class="text-right">Sub Total Biaya Layanan</th>
            <th class="text-right">Jumlah Petugas</th>
            
        </tr>
    </thead>

    <tbody>        
    <?php
        if($dt_biaya->num_rows()>0){
        $no = 0;
        $totbyobat= 0;
        $totbylayanan = 0; 
        $totbylain = 0;
        $grandtotal=0;
        foreach($dt_biaya->result() as $r){            
    ?>
    
        <tr>
            <td style="vertical-align:middle;" class="text-center"><?php echo $no; ?></td>
            <td style="vertical-align:middle;"><?=$r->no_registrasi?></td>
            <td style="vertical-align:middle;"><?=$r->nama_pasien?></td>
            <td style="vertical-align:middle;"><?=tgl_indo(date('Y-m-d',strtotime($r->tgl_pelayanan)))?></td>
            <td style="vertical-align:middle;" class="text-right"><?=format_rp($r->jumlah_jual) ?></td>
            <td style="vertical-align:middle;" class="text-right"><?=format_rp($r->biaya_pelayanan) ?></td>
            <td style="vertical-align:middle;" class="text-right"><?=format_rp($r->biaya_lain)?></td>
            <td style="vertical-align:middle;" class="text-right"><?=format_rp($r->sub_total_pendapatan)?></td>
            <td style="vertical-align:middle;" class="text-right"><?=$r->jumlah_petugas?></td>            
        </tr>
        
        
        
    <?php
        $totbyobat +=  $r->jumlah_jual ;
        $totbylayanan +=  $r->biaya_pelayanan ;
        $totbylain +=  $r->biaya_lain ;
              
    } 
        $grandtotal += $totbyobat +  $totbylayanan + $totbylain;
    ?>
        <tr>
            <th colspan="4"><b> Jumlah Pendapatan</b></th>
            <th class="text-right"><b><?=format_rp($totbyobat)?></b></th>
            <th class="text-right"><b><?=format_rp($totbylayanan)?></b></th>
            <th class="text-right"><b><?=format_rp($totbylain)?></b></th>
            <th class="text-right"><b><?=format_rp($grandtotal)?></b></th>
            <th class="text-right"><b>#</b></th>
        </tr>
    <?php    }else{ echo "<tr><td colspan='6'><i>Tidak Ada Transaksi</i></td></tr>"; }
    ?>
    </tbody>

    
</table>
</div>

