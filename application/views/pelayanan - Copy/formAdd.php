<div class='row' id="tempat_form_tambah">
	<div class='col-md-12'>
	<div class="box box-primary">
		<div class="panel-heading">
			Data <?= $title;?> <i class='fa fa-angle-right fa-fw'></i>&nbsp;Form Tambah
			<a href="#" class="pull-right btn-view"><i class="fa fa-plus fa-fw"></i> View Data&nbsp;</a>
			
		</div>
		<div class="box box-body">
			<?php echo $this->session->flashdata('msg'); ?>
			<form method="post" id="frm-add" action="<?php echo base_url() ?>Pelayanan/store" enctype="multipart/form-data">
	     	<div class="row">
	      
		      <div class="form-group col-md-6">
		          <label>NO&nbsp;Invoice :</label>
		          <input type="text"  name="nomor" id="nomor" class="form-control" placeholder="No Invoice" required autocomplete="off">          
		      </div>
	    <!-- </div> -->
		      <div class="form-group col-md-6">
		        <label> Nama Pasien :</label>
		        <div class="input-group input-group">
		          <input type="hidden" name="nik" id="nik">
		          <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" readonly="">
		            <span class="input-group-btn">
		              <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-pasien">&nbsp;Pilih</button>
		            </span>
		        </div>  
		      </div>
	      <!-- <div class="row"> -->
		        <div class="form-group col-md-12">
		          <label>Keluhan :</label>
		          <input type="text" name="keluhan" id="keluhan" class="form-control">
		        </div>
		        <div class="form-group col-md-3">
		          <label>Tinggi&nbsp;Badan&nbsp;(m) :</label>
		          <input type="text" name="tb" id="tb" class="form-control" autocomplete="off"/>
		        </div>     
		        <div class="form-group col-md-3">
		          <label>Berat&nbsp;Badan&nbsp;(kg):</label>
		          <input type="text" name="bb" id="bb" onchange="hitung()" class="form-control" autocomplete="off">
		        </div>
		        <div class="form-group col-md-3">
		          <label>Lingkar&nbsp;Perut&nbsp;:</label>
		          <input type="text" name="lp" class="form-control">
		        </div>
		        <div class="form-group col-md-3">
		          <label>IMT:</label>
		          <input type="text" name="imt" id="imt" class="form-control" readonly>
		        </div>
		        <div class="form-group col-md-3">
		          <label>Sistole</label>
		          <input type="text" name="sistole" id="sistole" class="form-control">
		        </div>     
		        <div class="form-group col-md-3">
		          <label>Diastole&nbsp;:</label>
		          <input type="text" name="diastole" id="diastole" class="form-control">
		        </div>
		        <div class="form-group col-md-3">
		          <label>Respiratory&nbsp;Rate&nbsp;:</label>
		          <input type="text" name="respiratory_rate" id="respiratory_rate" class="form-control">
		        </div>
		        <div class="form-group col-md-3">
		          <label>Heart_Rate:</label>
		          <input type="text" name="heart_rate" id="heart_rate" class="form-control">
		        </div>
		        <div class="form-group col-md-6">
		          <label>Pemerikasaan Fisik:</label>
		          <input type="text" name="pemeriksaan_fisik" id="pemeriksaan_fisik" class="form-control">
		        </div>
		        <div class="form-group col-md-6">
		          <label> Data Penyakit :</label>
		          <div class="input-group input-group">
		            <input type="hidden" name="kd_penyakit" id="kd_penyakit">
		            <input type="text" class="form-control" name="nama_penyakit" id="nama_penyakit" readonly="">
		              <span class="input-group-btn">
		                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-penyakit">&nbsp;Pilih</button>
		              </span>
		          </div>  
	        	</div>
	        	<div class="form-group col-md-6">
		          <label> Data Petugas :</label>
		          <div class="input-group input-group">
		            <input type="hidden" name="nik_petugas" id="nik_petugas">
		            <input type="text" class="form-control" name="nama_petugas" id="nama_petugas" readonly="">
		              <span class="input-group-btn">
		                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-petugas">&nbsp;Pilih</button>
		              </span>
		          </div>  
	        	</div>
		        <div class="form-group col-md-3">
		          <label>Biaya Pelayanan:</label>
		          <input type="text" name="biaya_pelayanan" id="biaya_pelayanan" class="form-control">
		        </div>
		        <div class="form-group col-md-3">
		          <label>Biaya Lain Lain:</label>
		          <input type="text" name="biaya_lain" id="biaya_lain" class="form-control">
		        </div>
	      </div>
		  <div class="pull-right">
		  	<button type="button" class="btn btn-default" onclick="reset()"><i class="fa fa-save fa-fw"></i>
                Cancel
            </button>
		    <button type="submit" name="btn_simpan" id="btn_simpan" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
		    <button type="submit" name="btn_edit" id="btn_edit" class="btn btn-sm btn-warning" disabled=""><span class="glyphicon glyphicon-edit"></span> Ubah Data</button>
		  </div>
	</form>
				
			</div>
		</div>
	</div>
</div>

<div class="row" id="tempat_data" hidden="">
	<?php $this->load->view('pelayanan/data');?>
</div>

<!-- <div id="tempat-modal"></div> -->

<!-- <?php //$this->load->view('pelayanan/modal_update');?> -->
<?php $this->load->view('pelayanan/modal_hapus');?>
<?php $this->load->view('pelayanan/modal_pasien');?>
<?php $this->load->view('pelayanan/modal_penyakit');?>
<?php $this->load->view('pelayanan/modal_petugas');?>
<?php $this->load->view('pelayanan/js');?>


