<br>
<hr>
<div class="table-responsive">
<table width="100%" align="center" class="table table-strip table-bordered">
    <thead>
        <tr>
            <th class="text-center" width="5%">No</th>
            <th class="text-left">Nik Petugas</th>
            <th class="text-left">Nama Petugas</th>
            <th class="text-left">Divisi</th>
            <th class="text-right" width="15%">Jumlah Bertugas</th> 
            <th class="text-right">Honor Diterima</th>            
        </tr>
    </thead>
    <tbody> 
       
   <?php
        if($pelayanan->num_rows()>0){
        $no = 0;
        $total=0;
        $jml=0;
        foreach($pelayanan->result() as $r){
            $no++;   
            $total += $r->nominal_tindak;         
            $jml += $r->jumlah_tindak;
    ?>
    
        <tr>
            <td style="vertical-align:middle;" class="text-center"><?php echo $no; ?></td>
            <td style="vertical-align:middle;"><?=$r->nik_petugas?></td>            
            <td style="vertical-align:middle;"><?=$r->nama_petugas ?></td>
            <td style="vertical-align:middle;"><?=$r->status?></td>
            <td style="vertical-align:middle;" class="text-right"><?=$r->jumlah_tindak?>x</td>
            <td style="vertical-align:middle;" class="text-right"><?=format_rp($r->nominal_tindak)?></td>
        </tr>        
        
        
    <?php
        } ?>
        <tr>
            <th colspan="4">Total Rekapituasi Pelayanan Divisi <?=$this->divisi?></th>
            <th class="text-right"><?=$jml?>x</th>
            <th class="text-right"><?=format_rp($total)?></th>
        </tr>
    <?php        
        }else{ echo "<tr><td colspan='5'><i>Tidak Ada Transaksi</i></td></tr>"; }
    ?>            
    </tbody>

</table>
</div>

