<div class="table-responsive">
    <table class='table table-striped table-hover' id='tbl_pasien'>
      <thead>
        <tr>
        <th width="20%">#</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Telpon</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no =0;
        foreach($pasien->result() as $r){
          $no++;
          
        ?>
        <tr>
          <td>
              <a href="#" class="btn btn-primary btn-flat btn-xs btn-pasien" data-dismiss="modal" data-id="<?php echo $r->nik ?>"> <i class="fa fa-download fa-fw"></i></a>  
          </td>
          <td><?php echo $r->nik ?></td>
          <td><?php echo $r->nama_pasien ?></td>
          <td><?php echo $r->alamat ?></td>
          <td><?php echo $r->no_telp ?></td>
        </tr>
        <?php } ?>
        
      </tbody>
    </table>
</div>

<script type="text/javascript">
  $(function () {
      $("#tbl_pasien").dataTable({
        "iDisplayLength": 10,
      });
  });

  // Ambil data Pasien
  $(document).on('click', '.btn-pasien', function(){

    // 
    var id = $(this).attr("data-id");
    var url = '<?php echo base_url(); ?>';

    $.ajax({
          method : 'post',                
          dataType : 'json',
          url: url + 'Pelayanan/get_pasien',
          data : {id:id},
          
          success:function(data){
            $('#nik').val(data.nik);
            $('#nama_pasien').val(data.nama_pasien);
          }

      })
      // alert(id);
     })
</script>