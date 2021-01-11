<hr>
<div class="table-responsive">
<table width="100%" align="center" class="table table-strip table-bordered">
    <thead>
    
        <tr>
            <th colspan="5"><?=$this->judul?></th>   
        </tr>
        
        <tr>
            <th align="center" width="5%">No</th>
            <th class="text-left">Kode Obat</th>
            <th class="text-left">Nama <?=$this->jenis?></th>
            <th class="text-left">Jenis</th>
            <th class="text-right">Jumlah</th>            
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
            <td style="vertical-align:middle;" class="text-center"><?php echo $no; ?></td>
            <td style="vertical-align:middle;"><?=$r->kd_obat?></td>            
            <td style="vertical-align:middle;"><?=$r->nama_obat ?></td>
            <td style="vertical-align:middle;"><?=$r->jenis?></td>
            <td style="vertical-align:middle;" class="text-right"><?=$r->rank_obat?></td>
            
        </tr>        
        
        
    <?php
        } ?>
     
    <?php        
        }else{ echo "<tr><td colspan='6'><i>Tidak Ada Transaksi</i></td></tr>"; }
    ?>            
    </tbody>

</table>
</div>

