<div class="modal modal-primary fade" id="modal_pelayanan">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>         
      </div>          
          <div class="box box-success">
            <div class="box-body">
                <?php $this->load->view('plant/data_pelayanan');?>
          </div>
          </div>
      <div class="modal-footer">
        <button type="button" id="btn-close-modal" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>