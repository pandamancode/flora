<title>Cetak Nota Pembayaran</title>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/dist/css/app.css">
<link href="<?php echo base_url()?>assets/dist/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<style type="text/css">

    @page {
        size: A58mm Roll Max;
        margin: 0;
    }
    
    @media print{ 
        #harga_list{
            text-align:right;
        }
    }

</style>
<div id="print_button_container" class="section-bill">
        <div class="bill-wrapper epson">
            <span class="img-triangle-top"></span>
            <div class="col-md-12 col-xs-12 bill-body" style="padding-right:15;padding-left:5;">
                <div class="img-receipt"></div>
                <div class="title"></div>

                <div class="text-wrapper clearfix">
                    <ul>
                        <div class="blockx col-sm-12 col-xs-12 text-center company-detailx">
                            <li>
                                <span class="company-namex" style="font-size:15pt;"><?=klinik_info()->nama_klinik?></span><br>
                                <span class="company-addresxs"><?=klinik_info()->alamat?></span><br>
                                <span class="company-phonex">Telp. <?=klinik_info()->telp?></span>
                                <p>&nbsp;</p>
                            </li>
                        </div>
                        <div class="top-bill">
                            <div class="block col-sm-12 col-xs-12">
                                <li>Nomor Nota : <?=$invoice?></li>
                            </div>
                            
                            <div class="block col-sm-12 col-xs-12">
                                <li>Tanggal : <?=date('d-m-Y')?></li>
                            </div>
                            <div class="block col-sm-12 col-xs-12">
                                <li>Customer : <?=pasien($pelayanan->no_registrasi)?></li>
                            </div>
                            <div class="block col-sm-12 col-xs-12">
                                <li>Kasir : <?=$this->session->userdata('nama')?></li>
                            </div>
                            
                        </div>

                        <div class="dashed col-sm-12 col-xs-12"></div>
                        <?php if($plant->num_rows()>0){ foreach($plant->result() as $r){ 
                            $obat = $this->db->get_where("tb_obat",array('kd_obat'=>$r->kd_obat))->row();
                        ?>
                        <div class="block col-sm-12 col-xs-12">
                            <li class="col-sm-8 col-xs-8 no-padding"><?=$obat->nama_obat?></li>
                            <li class="col-sm-1 col-xs-1 no-padding">x<?=$r->qty?></li>
                            <li class="col-sm-3 col-xs-3 text-right"><?=format_rp($r->harga_jual)?>&nbsp;</li>
                        </div>

                        <?php } ?>

                        <div class="dashed col-sm-12 col-xs-12"></div>

                        <div class="block col-sm-12 col-xs-12">
                            <li class="col-sm-9 col-xs-9 no-padding">Subtotal</li>
                            <li class="col-sm-3 col-xs-3 text-right"><?=format_rp($total - $pelayanan->biaya_tindakan)?>&nbsp;</li>
                        </div>
                        <?php } ?>

                        <div class="block col-sm-12 col-xs-12">
                            <li class="col-sm-9 col-xs-9 no-padding">Biaya Tindakan <em>(<?=tindakan($pelayanan->id_ig)?>)</em></li>
                            <li class="col-sm-3 col-xs-3" style="text-align:right;"><?=format_rp($pelayanan->biaya_tindakan)?>&nbsp;</li>
                        </div>

                        <div class="block col-sm-12 col-xs-12">
                            <li class="col-sm-9 col-xs-9 no-padding"><b>Total</b></li>
                            <li class="col-sm-3 col-xs-3 text-right"><b><?=format_rp($total)?>&nbsp;</li>
                        </div>

                        <div class="dashed col-sm-12 col-xs-12"></div>

                        <div class="block col-sm-12 col-xs-12">
                            <li class="col-sm-9 col-xs-9 no-padding">Tunai</li>
                            <li class="col-sm-3 col-xs-3 text-right"><?=format_rp($bayar)?>&nbsp;</li>
                        </div>

                        <div class="block col-sm-12 col-xs-12">
                            <li class="col-sm-9 col-xs-9 no-padding">Kembali</li>
                            <li class="col-sm-3 col-xs-3 text-right"><?=format_rp($kembalian)?>&nbsp;</li>
                        </div>

                        <!--div class="block col-sm-12 col-xs-12 text-left note-bill">
                            <li id="get-note" style="display:block;"><i class="fa fa-whatsapp"></i> 082282872569</li>
                            <li id="get-note" style="display:block;"><i class="fa fa-instagram"></i> yummypie.id</li>
                        </div-->

                        <div class="dashed dashed-block-social col-sm-12 col-xs-12" style="display: none;"></div>

                        <div class="bill-footer col-md-12 col-xs-12" style=""><strong id="get-watermark">Powered by Kalo Klinik</strong></div>
                    </ul>
                </div>
            </div>
            <span class="img-triangle-bottom"></span>
        </div>
</div>

<script>
    window.print();
</script>