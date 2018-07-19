<?php
    require_once "../_config/config.php";
    if(!isset($_SESSION['username'])){
        echo "<script>window.location='".base_url()."'</script>";
    }else{
        $kode_daerah = $_SESSION['kode_daerah'];
        $sql = "SELECT COUNT(npwz) AS jml_donatur FROM tm_donatur WHERE kode_daerah='$kode_daerah'";
        $hasil = $con->query($sql);
        $row = $hasil->fetch_assoc();
        $total = $row['jml_donatur'];

        $sql_satu = "SELECT COUNT(npwz) AS jml_aktif FROM view_231 WHERE kode_daerah='$kode_daerah'";
        $hasil_satu = $con->query($sql_satu);
        $row_satu = $hasil_satu->fetch_assoc();
        $total_aktif = $row_satu['jml_aktif'];

        $sql_dua = "SELECT COUNT(npwz) AS jml_non_aktif FROM view_231a WHERE kode_daerah='$kode_daerah'";
        $hasil_dua = $con->query($sql_dua);
        $row_dua = $hasil_dua->fetch_assoc();
        $total_non_aktif = $row_dua['jml_non_aktif'];
?>
<div class="row">
    <div class="col-lg-12">
        <h3>Info Grafis Muzaki</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="glyphicon glyphicon-signal"></i></a></li>
            <li class="active">Grafik Muzaki</li>
            <li class="active"><b>Total Muzaki:<?php echo " ".$total; ?> </b></li>
            <li class="active"><b>Muzaki Aktif:<?php echo " ".$total_aktif." Muzaki"; ?> </b></li>
            <li class="active"><b>Muzaki Non Aktif:<?php echo " ".$total_non_aktif." Muzaki"; ?> </b></li>
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
                    text: 'Info Grafis Muzaki'
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
                    name: 'Data Muzaki',
                    data: []
                }]
            }
            
            $.getJSON("datapokok/data_muzaki.php", function(json) {
                options.series[0].data = json;
                chart = new Highcharts.Chart(options);
            });
        });
    });
</script>
<?php } ?>