<!DOCTYPE html>
<html>
<head>
	<title>Barcode</title>
	<link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		.A4-cetak {
  background: white;
  width: 21cm;
  height: 29.7cm;
  display: block;
  margin: 0 auto;
  padding: 10px 25px;
  margin-bottom: 0.5cm;
  box-sizing: border-box;
}
.A4 {
  background: white;
  width: 21cm;
  height: 29.7cm;
  display: block;
  margin: 0 auto;
  padding: 10px 25px;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
  overflow-y: scroll;
  box-sizing: border-box;
}

@media print {
  .page-break {
    display: block;
    page-break-before: always;
  }

  size: A4 portrait;
}

@media print {
  body {
    margin: 0;
    padding: 0;
  }

  .A4 {
    box-shadow: none;
    margin: 0;
    width: auto;
    height: auto;
  }

  .noprint {
    display: none;
  }

  .enable-print {
    display: block;
  }
}
	</style>
	<script src="<?php echo base_url() ?>assets/JsBarcode.all.min.js"></script>
</head>
<body>
	<div class="A4-cetak">
	<div class="row">
		<?php 
		for($i=1;$i<=$jumlah;$i++){
      for($j=1;$j<=10;$j++){
        $generate = $kode.'-'.$i;
      
		?>
		<div class="col-xs-3" style="border:1px solid black;margin-bottom: 2px;padding-top: 2px;padding-bottom: 2px;">
			<img  class="barcode128"
			  jsbarcode-format="CODE128"
			  jsbarcode-value="<?=$generate?>"
			  jsbarcode-textmargin="0"
			  jsbarcode-height="40"
			  jsbarcode-fontSize="10"/>
		</div>
		<?php }  } ?>
	</div>
</div>
	<script type="text/javascript">
		JsBarcode(".barcode128").init();
    window.print();
	</script>
</body>
</html>


