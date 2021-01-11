<div class="modal-header" style="background-color:#3c8dbc; color:white;">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Data Plant</strong></h4>
</div>
            
<div class="modal-body">
  <div class="row">
    <div class="col-md-8" style="margin-top:5px;">
      <div class="box box-primary">
          <div class="panel-heading text-center">
              <input type="text" name="search" id="s_keyword" class="form-control" placeholder="Cari Kode / Nama" style="border-radius: 10px;text-align: center;" autocomplete="off">
          </div>
          <div class="box box-body">
            <table class="table table-striped table-hover">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama Obat</th>
                      <th>Jenis</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody id="result_obat">
                
              </tbody>
            </table>
          </div>
      </div>
    </div>
    <div class="col-md-4" style="border-left:solid 1px #E8E6E6; margin-top:5px;">
        <div class="box box-primary">
          <div class="panel-heading">
            Form Plant
          </div>
          <form method="post" action="<?=base_url()?>pelayanan/save_plant">
            <div class="box box-body">
              <div class="form-group">
                <label>Kode Obat</label>
                <input type="text" name="kd_obat" id="kd_obat" class="form-control" placeholder="Kode Obat" readonly>
              </div>
              <div class="form-group">
                <label>Nama Obat</label>
                <input type="text" name="nama_obat" id="nama_obat" class="form-control" placeholder="Nama Obat" readonly>
              </div>
              <div class="form-group">
                <label>Qty</label>
                <input type="number" name="qty" id="qty" class="form-control" placeholder="Qty" autocomplete="off">
              </div>
              <div class="form-group">
                <label>Harga Jual</label>
                <input type="number" name="harga" id="hargax" class="form-control" placeholder="Harga Jual" readonly="true" autocomplete="off">
              </div>
            </div>
            <div class="box box-footer text-right">
              <input type="hidden" name="no_invoice" value="<?=$no_invoice?>">
              <button class="btn btn-primary btn-sm btn-flat"><i class="fa fa-save"></i> Simpan</button>
            </div>
          </form>
        </div>
    </div>
  </div> 
</div>

<script type="text/javascript">
  $(document).ready(function(){
    load_data_obat();
  });

  function load_data_obat(keyword)
  {
    $.ajax({
      method:"POST",
      url:"<?=base_url()?>pelayanan/load_data_obat",
      data: {keyword:keyword},
      success:function(hasil)
      {
        $('#result_obat').html(hasil);
      }
    });
  }
  $('#s_keyword').keyup(function(){
      var keyword = $("#s_keyword").val();
      load_data_obat(keyword);
  });

  function pilih_obat(kd,nama,harga,jenis){
    if(jenis=='non-obat'){
      document.getElementById('hargax').readOnly = false;
      $('#hargax').val('');
    }else{
      $('#hargax').val(harga);
      document.getElementById('hargax').readOnly = true;
    }

    $('#kd_obat').val(kd);
    $('#nama_obat').val(nama);
    $('#qty').focus();

  }

</script>