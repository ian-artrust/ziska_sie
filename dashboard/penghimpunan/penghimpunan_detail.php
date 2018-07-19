<?php
    require_once "../_config/config.php";
    if(!isset($_SESSION['username'])){
        echo "<script>window.location='".base_url()."'</script>";
    }else{
        $sql_zakat = "SELECT SUM(zakat) AS total_zakat FROM view_812a";
        $hasil_zakat = $con->query($sql_zakat);
        $row_zakat = $hasil_zakat->fetch_assoc();
        $total_zakat = number_format($row_zakat['total_zakat'],0,',','.');

        $sql_infak = "SELECT SUM(infak) AS total_infak FROM view_812b";
        $hasil_infak = $con->query($sql_infak);
        $row_infak = $hasil_infak->fetch_assoc();
        $total_infak = number_format($row_infak['total_infak'],0,',','.');
?>
<div class="row">
    <div class="col-lg-12">
        <h3>Detail Penghimpunan ZISKA</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="glyphicon glyphicon-signal"></i></a></li>
            <li class="active">Grafik Detail Penghimpunan</li>
            <li class="active"><b>Zakat:</b> Rp. <?php echo $total_zakat; ?></li>
            <li class="active"><b>Infak:</b> Rp. <?php echo $total_infak; ?></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div id="data_penghimpunan">

        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        var moneyFormat = wNumb({
             mark: ',',
             decimals: 0,
             thousand: '.',
             prefix: '',
             suffix: ''
        });
        var grafik;
        $(document).ready(function() {
            $.getJSON("penghimpunan/data_penghimpunan_detail.php", function(json) {
                grafik = new Highcharts.Chart({
                    chart: {
                        renderTo: 'data_penghimpunan',
                        type: 'column'
                    },
                    title: {
                        text: 'Detail Penghimpunan ZISKA Berdasar Periode Bulanan'
                        
                    },
                    subtitle: {
                        text: '(Tahun Berjalan)'
                    
                    },
                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    },
                    yAxis: {
                        title: {
                            text: 'Price (Rp)'
                        },
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                    },
                    tooltip: {
                        formatter: function() {
                                return '<b>'+ this.series.name +'</b><br/>'+
                                this.x +': '+ moneyFormat.to(this.y);
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -10,
                        y: 120,
                        borderWidth: 0
                    },
                    series:json
                });
            });
        });
    });
</script>
<?php } ?>