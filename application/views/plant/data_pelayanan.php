<div class="table-responsive">
    <table class='table table-striped table-hover' id='tbl_2' width="100%" style="font-size: 12px">
      <thead>
        <tr>
          <!-- <th width="5%">#</th> -->
          <th>No&nbsp;Invoice</th>
          <th>Nik</th>
          <th>Nama&nbsp;Pasien</th>
          <th>Keluhan</th>
          <!-- <th>Kode&nbsp;Penyakit</th> -->
          <th>Nama&nbsp;Penyakit</th>
          <!-- <th>Biaya&nbsp;Pelayanan</th>
          <th>Biaya&nbsp;Lain-Lain</th> -->
          <th width="15%">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no =0;
        foreach($pelayanan->result() as $r){
          $no++;
          
        ?>
        <tr>
          
          <td><?php echo $r->no_invoice ?></td>
          <td><?php echo $r->nik ?></td>
          <td><?php echo $r->nama_pasien ?></td>
          <td><?=$r->keluhan?></td>
          <!-- <td><?=$r->kd_penyakit?></td> -->
          <td><?=$r->nama_penyakit?></td>
          <!-- <td>Rp.&nbsp;<?php //echo number_format($r->biaya_pelayanan,0,".","."); ?></td> -->
          <!-- <td>Rp.&nbsp;<?php //echo number_format($r->biaya_lain,0,".","."); ?></td> -->
          <td>
          <a href="#" class="btn btn-primary btn-flat btn-xs btn-pel" data-dismiss="modal" data-id="<?php echo $r->no_invoice ?>"> <i class="fa fa-edit fa-fw" style="color:#ffffff;"></i> <span style="color:#ffffff;">&nbsp;Pilih</span></a>
          
          </td>
        </tr>
        <?php } ?>
        
      </tbody>
    </table>
</div>

