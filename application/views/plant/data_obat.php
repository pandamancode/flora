<form id="frm-jual" hidden="">
  <input type="text" class="form-control" id="kd_obat_jual" readonly="">
  <input type="text" class="form-control" id="nama_obat_jual" readonly="">
  <input type="text" class="form-control" id="harga_jual" readonly="">
</form>
<div class="table-responsive">
    
    <table class='table table-striped table-hover' id='tbl_obat' width="100%" style="font-size: 12px">
      <thead>
        <tr>
        <th width="5%">#</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Jenis</th>
        <!-- <th width="15%">&nbsp;</th> -->
        </tr>
      </thead>
      <tbody>
        <?php
        $no =0;
        foreach($obat->result() as $r){
          $no++;
          
        ?>
        <tr>
          <td>
            <a href="#" class="btn btn-primary btn-flat btn-xs btn-obat" data-id="<?php echo $r->kd_obat ?>"> <i class="fa fa-download fa-fw" style="color:#ffffff;"></i> <span style="color:#ffffff;"></span></a>
          </td>
          <td><?php echo $r->kd_obat ?></td>
          <td><?php echo $r->nama_obat ?></td>
          <td>Rp <?= format_rp($r->harga_obat);?></td>
          <td><?php echo $r->jenis ?></td>
        </tr>
        <?php } ?>
        
      </tbody>
    </table>
</div>

