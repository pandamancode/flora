<div class="table-responsive">
    <table class='table table-striped table-hover' id='tbl_petugas'>
      <thead>
        <tr>
        <th width="10%">&nbsp;</th>
        <th>Nik Petugas</th>
        <th>Nama Petugas</th>
        <th>JK</th>
        <th>Status</th>
        
        </tr>
      </thead>
      <tbody>
        <?php
        $no =0;
        foreach($petugas->result() as $r){
          $no++;          
        ?>
        <tr>
          <td>
            <a href="#" class="btn btn-primary btn-flat btn-xs btn-petugas" data-dismiss="modal" data-id="<?php echo $r->nik_petugas ?>"> <i class="fa fa-download fa-fw" style="color:#ffffff;"></i></a>          
          </td>
          <td><?php echo $r->nik_petugas ?></td>
          <td><?php echo $r->nama_petugas ?></td>
          <td><?php echo $r->gender ?></td>
          <td><?php echo $r->status ?></td>
          
        </tr>
        <?php } ?>
        
      </tbody>
    </table>
</div>

<script type="text/javascript">
  $(function () {
      $("#tbl_petugas").dataTable({
        "iDisplayLength": 10,
      });
  });

  $(document).on('click', '.btn-petugas', function(){

    // 
    var id = $(this).attr("data-id");
    var url = '<?php echo base_url(); ?>';

    $.ajax({
          method : 'post',                
          dataType : 'json',
          url: url + 'Pelayanan/get_petugas',
          data : {id:id},
          
          success:function(data){
            $('#nik_petugas').val(data.nik_petugas);
            $('#nama_petugas').val(data.nama_petugas);
          }
      })
      // alert(id);
     });
</script>