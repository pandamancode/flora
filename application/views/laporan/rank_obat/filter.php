
<div id="respon1"></div>
<?php echo $this->session->flashdata('msg');?>
<div class="row">
  <div class="col-md-12">
      <div class="box box-primary box-solid">
        <div class="box-header with-border">
        <i class="fa fa-filter "></i>
          <h3 class="box-title">Filter Data </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        <!--form id="form-filter" method="post" action="<?=base_url()?>laporan/cetak" target="_blank"-->
        <form id="form-filter" method="post">
          

          <div class="col-md-3">
            <div class="form-group">
              <input type="date" name="tanggal" class="form-control" placeHolder="Dari Tanggal">
            </div>
          </div>
          
          <div class="col-md-3">
            <div class="form-group">
              <input type="date" name="sampai_tanggal" class="form-control" placeHolder="Sampai Tanggal">
            </div>
          </div>
          
          <div class="col-md-3">
            <div class="form-group">
              <select class="form-control" required="" name="jenis">
                <option selected="" disabled="" value="">-Pilih Jenis-</option>
                <?php foreach($obat->result() as $r){ ?>
                <option value="<?php echo $r->jenis ?>"><?php echo $r->jenis ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="col-md-3">
            <button type="button" onclick="preview()" id="btn_tampil" class="btn btn-primary btn-flat"><i class="fa fa-filter fa-fw"></i> Filter</button>
            <!--button type="submit" id="btn_tampil" class="btn btn-info btn-flat"><i class="fa fa-print fa-fw"></i> Cetak &nbsp;</button-->
          </div>
          
        </form>
        <br>
        <div id="show"></div>
        
        </div>
      </div>
  </div>
</div>



<div id="tempat-modal"></div>
<script type="text/javascript">
//Active Menu Sidebars
// $('#prod').chained("#fak");

$(document).ready(function() { 
    $('#laporan').addClass('active');
});

function preview() {
    dataString = $("#form-filter").serialize();   
    $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>Laporan/filter_rank_obat",
        data:dataString,
        
        success: function(msg){
            $('#show').html(msg);
        },
    });
    event.preventDefault();
}

</script>