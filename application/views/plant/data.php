<!-- <div class="box box-default"> -->
<!-- <div class='row'> -->
	<!-- <div class="box-header with-border"> -->
		<div class="box box-primary">
			<div class="panel-heading">
				<i class='fa fa-shopping-cart fa-fw'></i> Master <i class='fa fa-angle-right fa-fw'></i> Data <?= $title;?> <i class='fa fa-angle-right fa-fw'></i><i id="nota_judul"></i>
			</div>
			<div class="box box-body">
				<div class='col-md-8'>
					<?php $this->load->view('plant/data_penjualan');?>
				</div>
			<div class='col-md-4'>
				<?php $this->load->view('plant/form_add');?>
			</div>
		</div>
		</div>
		
	<!-- </div> -->
<!-- </div> -->

<?php $this->load->view('plant/modal_bayar');?>
<?php $this->load->view('plant/modal_obat');?>
<?php $this->load->view('plant/modal_pelayanan');?>

<?php $this->load->view('plant/js');?>
