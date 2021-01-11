<hr>
<div class="table-responsive">
<table class="table table-bordered table-striped" id="konfir">
    <thead>
        <tr style="background-color:#00c0ef; color:white;">
            <th class="text-center" width="5%">No</th>
            <th>No. Registrasi</th>
            <th>Nama Pasien</th>
            <th>Tanggal Pelayanan</th>
            <th>Tindakan</th>
            <th>Biaya Tindakan</th>
            <th>Petugas</th>
        </tr>
    </thead>

    <tbody>        
    <?php
        if($pelayanan->num_rows()>0){
        $no = 0;
        $total = 0;
        foreach($pelayanan->result() as $r){    
            $no++;
            $pasien = $this->db->get_where("tb_pasien",array('nik'=>$r->nik))->row();
            $petugas = $this->db->select("*")->from("tb_petugas")->join("tb_petugas_pelayanan","tb_petugas_pelayanan.nik_petugas=tb_petugas.nik_petugas")->where("tb_petugas_pelayanan.no_invoice",$r->no_invoice)->get();
            $total += $r->biaya_tindakan;
    ?>
    
        <tr>
            <td style="vertical-align:middle;" class="text-center"><?php echo $no; ?></td>
            <td style="vertical-align:middle;"><?=$r->no_registrasi?></td>
            <td style="vertical-align:middle;"><?=$pasien->nama_pasien?></td>
            <td style="vertical-align:middle;"><?=tgl_indo(date('Y-m-d',strtotime($r->tgl_pelayanan)))?></td>
            <td style="vertical-align:middle;"><?=tindakan($r->id_ig) ?></td>
            <td style="vertical-align:middle;" class="text-right"><?=format_rp($r->biaya_tindakan) ?></td>
            <td style="vertical-align:middle;">
                <?php foreach($petugas->result() as $p){ 
                    echo "<li style='display:block;'><i class='fa fa-check'></i> ".$p->nama_petugas."</li>";
                } ?>
            </td>            
        </tr>
        
        
        
    <?php } 
        //$grandtotal += $totbyobat +  $totbylayanan + $totbylain;
    ?>
        <tr>
            <th colspan="5"><b> Jumlah Pendapatan</b></th>
            <th class="text-right"><b><?=format_rp($total)?></b></th>
            <th class="text-right"><b>#</b></th>
        </tr>
    <?php    }else{ echo "<tr><td colspan='7'><i>Tidak Ada Transaksi</i></td></tr>"; }
    ?>
    </tbody>

    
</table>
</div>

