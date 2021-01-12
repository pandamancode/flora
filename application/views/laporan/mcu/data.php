<hr>
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <thead>
        <tr style="background-color:#00c0ef; color:white;">
            <th class="text-center" width="5%">No</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">No. MCU</th>
            <th class="text-center">NIK/NRP</th>
            <th class="text-center">Nama Pasien</th>
            <th class="text-center">Unit Pemeriksa</th>
        </tr>
    </thead>
    <tbody>        
    <?php
        if($mcu->num_rows()>0){
        $no = 0;
        $total = 0;
        foreach($mcu->result() as $r){    
            $no++;
            $pasien = $this->db->select("nik,nama_pasien")->from("pasien")->where("nik",$r->nik)->get();

            //cek ekg
            $ekg = $this->db->get_where("ekg",array('no_mcu'=>$r->no_mcu));
            if($ekg->num_rows()>0){
                $unit_ekg = "<li style='display:block;'><i class='fa fa-check'></i> EKG</li>";
            }else{
                $unit_ekg = "";
            }

            $rontgen = $this->db->get_where("rontgen",array('no_mcu'=>$r->no_mcu));
            if($rontgen->num_rows()>0){
                $unit_rontgen = "<li style='display:block;'><i class='fa fa-check'></i> RONTGEN</li>";
            }else{
                $unit_rontgen = "";
            }

            $lab1 = $this->db->get_where("hematologi",array('no_mcu'=>$r->no_mcu));
            if($lab1->num_rows()>0){
                $unit_lab1 = "<li style='display:block;'><i class='fa fa-check'></i> LAB Hematologi</li>";
            }else{
                $unit_lab1 = "";
            }

            $lab2 = $this->db->get_where("kimia_darah",array('no_mcu'=>$r->no_mcu));
            if($lab2->num_rows()>0){
                $unit_lab2 = "<li style='display:block;'><i class='fa fa-check'></i> LAB Kimia Darah</li>";
            }else{
                $unit_lab2 = "";
            }

            $lab3 = $this->db->get_where("immunologi",array('no_mcu'=>$r->no_mcu));
            if($lab3->num_rows()>0){
                $unit_lab3 = "<li style='display:block;'><i class='fa fa-check'></i> LAB Immunologi</li>";
            }else{
                $unit_lab3 = "";
            }

            $fisioterapi = $this->db->get_where("fisioterapi",array('no_mcu'=>$r->no_mcu));
            if($fisioterapi->num_rows()>0){
                $unit_fisioterapi = "<li style='display:block;'><i class='fa fa-check'></i> Fisioterapi</li>";
            }else{
                $unit_fisioterapi = "";
            }
    ?>
        <tr>
            <td class="text-center"><?php echo $no; ?></td>
            <td><?=tgl_indo($r->tgl_mcu)?></td> 
            <td><?=$r->no_mcu?></td>
            <td><?=$pasien->row()->nik?></td>
            <td><?=$pasien->row()->nama_pasien?></td>
            <td>
                <?=$unit_ekg.''.$unit_rontgen.''.$unit_lab1.''.$unit_lab2.''.$unit_lab3.''.$unit_fisioterapi?>
            </td>
        </tr>
    <?php }  }else{ echo "<tr><td colspan='5'><i>Tidak Ada Transaksi</i></td></tr>"; } ?>
    </tbody>
</table>
</div>

