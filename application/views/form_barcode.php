<div class="box box-primary box-solid" id="jabatan">
    <div class="box-header">
        <i class="fa fa-print fa-fw"></i>
        <h3 class="box-title">Cetak Barcode</h3>
    </div>
    <div class="box-body">
        <form method="post" action="<?=base_url()?>home/cetak_barcode" target="_blank">
            <div class="col-md-3">
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Jumlah Barcode" name="jumlah" required>
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-flat" ><i class="fa fa-print"></i> Cetak Barcode</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $('#m_master').addClass('active');
    $('#m_barcode').addClass('active');
</script>