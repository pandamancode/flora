<div class="modal modal-info fade" id="modal-bayar">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
         
      </div>          
          <div class="box box-success">
            <div class="box-body">
              <form>
                <!-- <div class="row"> -->
                  <div class="form-group">
                      <label>Total&nbsp;Bayar</label>
                      <input type="text" class="form-control" name="total_bayar" id="total_bayar" value="0" readonly="" >
                  </div>
                  <div class="form-group">
                      <label>Bayar</label>
                      <input type="text" class="form-control" id="txt_bayar" value="0" >
                  </div>
                  <div class="form-group">
                      <label>Kembali</label>
                      <input type="text" class="form-control" id="txt_kembali" value="0" readonly="" >
                  </div>
                <!-- </div> -->
              </form>
              
            </div>
          </div>
      <div class="modal-footer">
        <button type="submit" id="btn_simpan_plant" class="btn btn-flat btn-sm btn-default" disabled=""><span class="glyphicon glyphicon-saved"></span>&nbsp;Bayar</button>
        <button type="button" id="btn-close-modal" class="btn btn-flat btn-sm btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-refresh"></span>&nbsp;Close</button>
      </div>
    </div>
  </div>
</div>