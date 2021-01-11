<hr>
<div class="table-responsive">
<table width="100%" align="center" class="table table-strip table-bordered">
    <thead>
    
        <tr>
            <th colspan="5"><?=$this->judul?></th>   
        </tr>
        
        <tr>
            <th align="center" width="5%">No</th>
            <th class="text-left">Kode</th>
            <th class="text-left">Diagnosa</th>            
            <th class="text-right">Jumlah Pasien Penderita</th>            
        </tr>
    </thead>
    <tbody> 
       
   <?php
        if($rank_diagnosa->num_rows()>0){
        $no = 0;
        foreach($rank_diagnosa->result() as $r){
            $no++;            
    ?>
    
        <tr>
            <td style="vertical-align:middle;" class="text-center"><?php echo $no; ?></td>
            <td style="vertical-align:middle;"><?=$r->kd_penyakit?></td>            
            <td style="vertical-align:middle;"><?=$r->nama_penyakit ?></td>            
            <td style="vertical-align:middle;" class="text-right"><?=$r->rank_diagnosa?></td>
            
        </tr>        
        
        
    <?php
        } ?>
     
    <?php        
        }else{ echo "<tr><td colspan='6'><i>Tidak Ada Diagnosa</i></td></tr>"; }
    ?>            
    </tbody>

</table>
</div>

