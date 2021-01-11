<div class='row'>
    <div class='col-md-12'>
        <div class="box box-warning" id="mn_trx">        
            <div class="box-body text-center">
                <h2 style="color: orange;"><strong>Klinik Flora</strong></h2>
                <h4>Jl. Pagar Alam, Segala Mider, Kec. Tj. Karang Barat, Kota Bandar Lampung, Lampung 35132</h4>
                <h4>Telp. 0812-7254-3359</h4>
            </div>
        </div>
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <div class="box box-primary" id="mn_grafik">
            <div class="panel-heading">
                <h4><i class='fa fa-bar-chart fa-fw'></i> Grafik Kunjungan Pasien</h4>
            </div>
        
            <div class="box-body">
                <div class="form-group text-center">
                    <div id="containerx" style="margin-right: 10px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

foreach($pelayanan->result() as $r) {
    $data[] = array(
            'name' =>date('d',strtotime($r->tgl_pelayanan)),
            'y' =>intval($r->jml),
            'drilldown' =>'null',
        );
}
?>

<script type="text/javascript">
$('#m_home').addClass('active');

Highcharts.chart('containerx', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Kunjungan Pasien Bulan <?=$bulan?>'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total Kunjungan Pasien'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
    },

    series: [
        {
            name: "Kunjungan",
            colorByPoint: true,
            data: <?=json_encode($data)?>
        }
    ],
});
</script>