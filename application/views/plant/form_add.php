<form class="smart-form" id="frm-add" method="Post">
  <div class="panel panel-info">
  	<div class="panel-heading">
  		<label><b>FORM</b></label>
  	</div>
  <div class="panel-body">    
    <!-- <div class="row"> -->
					
		<div class="form-group">
		    <label><b>Nomor&nbsp;Invoice</b></label>
            <div class="input-group">                        
                <input type="text" class="form-control input-sm" name="no_invoice" id="no_invoice" readonly="">
                <input type="hidden" class="form-control" name="nik" id="nik">
			      <div class="input-group-btn">
			        <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_pelayanan" type="button"><i class="glyphicon glyphicon-search"></i>&nbsp;Cari</button>
			      </div>
            </div>
		</div>
			<div class="form-group">
			    <label>Nama&nbsp;Pasien</label>
			    <input type="text" class="form-control input-sm" name="nama_pasien" id="nama_pasien" readonly="">
			</div>
			<div class="form-group">
			    <label>Keluhan</label>
			    <textarea class="form-control" rows="3" name="keluhan" id="keluhan" readonly=""></textarea>
			</div>
			<!-- <div class="form-group">
			    <label>Nama&nbsp;Penyakit</label>
			    <input type="text" class="form-control" name="nama_penyakit" id="nama_penyakit" readonly="" >
			</div> -->
			<!-- </div> -->
			<div class="row">
				<div class="form-group col-md-6">
				    <label>Biaya&nbsp;admin</label>
				    <input type="text" class="form-control input-sm" value="0" name="ttl" id="ttl" readonly="" >
				</div>
			
				<div class="form-group col-md-6" id="tot_tes">
				    <label>Total&nbsp;Harga</label>
				    <input type="text" class="form-control input-sm" name="totalharga" id="totalharga" 
				    value="<?=$tot; ?>" readonly="" >
				</div>
			</div>
			
		<!-- <footer> -->
            <div class="modal-footer">
                <!-- <fieldset> -->
                <button type="button" class="btn btn-info btn-bayar" id="btn_bayar" onclick="get_total_bayar()" data-toggle="modal" data-target="#modal-bayar" disabled=""><span class="glyphicon glyphicon-refresh"></span>
                    Bayar
                </button>
            </div>
		<!-- </footer> -->
    
  </div>
</div>
 </form>
 