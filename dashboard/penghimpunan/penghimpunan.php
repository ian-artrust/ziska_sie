<?php
    require_once "../_config/config.php";
    if(!isset($_SESSION['username'])){
        echo "<script>window.location='".base_url()."'</script>";
    }else{
        $sql = "SELECT SUM(penghimpunan) AS total_penghimpunan FROM view_811";
        $hasil = $con->query($sql);
        $row = $hasil->fetch_assoc();
        $total = number_format($row['total_penghimpunan'],0,',','.');
?>
<div class="row">
    <div class="col-lg-12">
        <h3>Global Penghimpunan ZISKA</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="glyphicon glyphicon-signal"></i></a></li>
            <li class="active">Grafik Global Penghimpunan</li>
            <li class="active"><b>Total Penghimpunan:</b> Rp. <?php echo $total; ?></li>
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
            $.getJSON("penghimpunan/data_penghimpunan.php", function(json) {
                grafik = new Highcharts.Chart({
                    chart: {
                        renderTo: 'data_penghimpunan',
                        type: 'column'
                    },
                    title: {
                        text: 'Penghimpunan ZISKA Berdasar Periode Bulanan'
                        
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
                            width: 0,
                            color: '#808080'
                        }],
                    },
                    tooltip: {
                        useHTML: true,
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