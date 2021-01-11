<div class="table-responsive">
    <table class='table table-striped table-hover' id='tbl_penyakit'>
      <thead>
        <tr>
        <th width="15%">&nbsp;</th>
        <th>Kode Penyakit</th>
        <th>Nama Penyakit</th>        
        </tr>
      </thead>
      <tbody>
        <?php
        $no =0;
        foreach($penyakit->result() as $r){
          $no++;          
        ?>
        <tr>
          <td>
            <a href="#" class="btn btn-primary btn-flat btn-xs btn-penyakit" data-dismiss="modal" data-id="<?php echo $r->kd_penyakit ?>"> <i class="fa fa-download fa-fw" style="color:#ffffff;"></i></a>
          </td>
          <td><?php echo $r->kd_penyakit ?></td>
          <td><?php echo $r->nama_penyakit ?></td>          
        </tr>
        <?php } ?>
        
      </tbody>
    </table>
</div>

<script type="text/javascript">
  $(function () {
      $("#tbl_penyakit").dataTable({
        "iDisplayLength": 10,
      });
  });

  $(document).on('click', '.btn-penyakit', function(){

    // 
    var id = $(this).attr("data-id");
    var url = '<?php echo base_url(); ?>';

    $.ajax({
          method : 'post',                
          dataType : 'json',
          url: url + 'Pelayanan/get_penyakit',
          data : {id:id},
          
          success:function(data){
            $('#kd_penyakit').val(data.kd_penyakit);
            $('#nama_penyakit').val(data.nama_penyakit);
          }

      })
      // alert(id);
     });
</script>