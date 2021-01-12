<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-list-alt fa-fw"></i>&nbsp;Data Pasien</h4>
</div>
<div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
  <div class="table-responsive">
    <div class="panel-heading text-center">
      <input type="text" name="search" id="s_pasien" class="form-control" placeholder="Cari NIK / NRP / Nama Pasien"
        style="border-radius: 10px;text-align: center;" autocomplete="off">
    </div>
    <table class='table table-striped table-hover'>
      <thead>
        <tr>
          <th width="5%">No</th>
          <th>NIK/NRP</th>
          <th>Nama Pasien</th>
          <th>Gender</th>
          <th>Tgl Lahir</th>
          <th>No.Telp</th>
          <th width="8%">Aksi</th>
        </tr>
      </thead>
      <tbody id="result_pasien"></tbody>
    </table>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-danger " data-dismiss="modal"> <i class="fa fa-close fa-fw"></i>Close</button>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    load_data_pasien();
  });

  function load_data_pasien(keyword) {
    $.ajax({
      method: "POST",
      url: "<?=base_url()?>Register_mcu/load_data",
      data: {
        keyword: keyword
      },
      success: function (hasil) {
        $('#result_pasien').html(hasil);
      }
    });
  }
  $('#s_pasien').keyup(function () {
    var keyword = $("#s_pasien").val();
    load_data_pasien(keyword);
  });
</script>