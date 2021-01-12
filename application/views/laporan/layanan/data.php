<hr>
<div class="table-responsive">
<table class="table table-bordered table-striped" id="konfir">
    <thead>
        <tr style="background-color:#00c0ef; color:white;">
            <th class="text-center" width="5%">No</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">No. Registrasi</th>
            <th class="text-center">No. RM</th>
            <th class="text-center">Nama Pasien</th>
            <th class="text-center">Keluhan</th>
            <th class="text-center">Saran</th>
        </tr>
    </thead>
    <tbody>        
    <?php
        if($pelayanan->num_rows()>0){
        $no = 0;
        $total = 0;
        foreach($pelayanan->result() as $r){    
            $no++;
            $pasien = $this->db->select("pasien.nama_pasien")->from("pasien")->join("registrasi","registrasi.nik=pasien.nik")->where("registrasi.no_registrasi",$r->no_registrasi)->get();
    ?>
        <tr>
            <td style="vertical-align:middle;" class="text-center"><?php echo $no; ?></td>
            <td><?=tgl_indo(date('Y-m-d',strtotime($r->tgl_pelayanan)))?></td> 
            <td><?=$r->no_registrasi?></td>
            <td><?=$r->no_rm?></td>
            <td><?=$pasien->row()->nama_pasien?></td>
            <td><?=$r->keluhan?></td>
            <td><?=$r->saran?></td>        
        </tr>
    <?php }  }else{ echo "<tr><td colspan='7'><i>Tidak Ada Transaksi</i></td></tr>"; } ?>
    </tbody>
</table>
</div>

