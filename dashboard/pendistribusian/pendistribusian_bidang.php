<?php
    require_once "../_config/config.php";
    if(!isset($_SESSION['username'])){
        echo "<script>window.location='".base_url()."'</script>";
    }else{
        $kode_daerah = $_SESSION['kode_daerah'];
        $sql = "SELECT SUM(jml_distribusi) AS total_pendistribusian FROM view_814 WHERE kode_daerah='$kode_daerah'";
        $hasil = $con->query($sql);
        $row = $hasil->fetch_assoc();
        $total = number_format($row['total_pendistribusian'],0,',','.');
?>
<div class="row">
    <div class="col-lg-12">
        <h3>Bidang Pendistribusian ZISKA</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="glyphicon glyphicon-signal"></i></a></li>
            <li class="active">Grafik Bidang Pendistribusian</li>
            <li class="active"><b>Total Pendistribusian:</b> Rp. <?php echo $total; ?></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div id="data_pendistribusian">

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
            var options = {
                chart: {
                    renderTo: 'data_pendistribusian',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Bidang Pendistribusian Dana ZISKA'
                },
                tooltip: {
                    formatter: function() {
                        return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                    }
                },
                plotOptions: {
                   pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: 'green',
                            formatter: function() 
                            {
                                return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
                            }
                        }, 
                        showInLegend: true
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Bidang Pendsitribusian',
                    data: []
                }]
            }
            
            $.getJSON("pendistribusian/data_pendistribusian_bidang.php", function(json) {
                options.series[0].data = json;
                chart = new Highcharts.Chart(options);
            });
        });
    });
</script>
<?php } ?>