
<div class="box box-primary">
    <div class="panel-heading">
      <i class='fa fa-history fa-fw'></i> Rekam Medis
      <a href="<?=base_url()?>poli_umum/cetak_rm/<?=$pasien->nik?>" target="_blank" class="pull-right"><i class="fa fa-print fa-fw"></i> Cetak Riwayat Cek</a>
    </div>

	<div class="box box-body">
	    <div class="table-responsive">
			<table class="table table-hover table-stripped" id="tbl_rm">
				<thead class="table-header">
					<tr>
						<th width="5%">No.</th>
						<th>No. RM</th>
						<th>Tanggal</th>
						<th>Keluhan</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$rekam_medis = $this->db->select("*")->from("poli_umum")->join("registrasi","registrasi.no_registrasi=poli_umum.no_registrasi")->where("registrasi.nik",$pasien->nik)->where("poli_umum.status_pelayanan","selesai")->order_by("registrasi.no_registrasi","desc")->get();
					$no=0;foreach($rekam_medis->result() as $p){ $no++; ?>
					<tr>
						<td><?=$no?></td>
						<td><?=$p->no_rm?></td>
						<td><?=tgl_indo(date('Y-m-d',strtotime($p->tgl_pelayanan)))?></td>
						<td><?=$p->keluhan?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
