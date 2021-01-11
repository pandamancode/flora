<div class="modal modal-primary fade" id="modal-obat" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        
         <button type="button" class="btn btn-flat btn-sm btn-default btn-form"><i class="fa fa-plus"></i>&nbsp; Tambah Data Obat </button>
         <button type="button" id="btn-close-modal" onclick="atur_tombol()" class="btn btn-default pull-right btn-flat btn-xs" data-dismiss="modal"><i class="fa fa-close fa-fw"></i></button>
      </div>          
          <div class="box box-success">
            <div class="box-body">
              <div class="col-md-12 kecret" id="tempat_tabel">
                 <?php $this->load->view('plant/data_obat');?>
              </div>
              <div class="col-md-12" id="tempat_form" hidden="">
                <?php $this->load->view('plant/form_obat');?>
              </div>
          </div>
          </div>
      <div class="modal-footer">
        &nbsp;
      </div>
    </div>
  </div>
</div>