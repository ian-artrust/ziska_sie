<?php
    require_once "../_config/config.php";
    if(!isset($_SESSION['username'])){
        echo "<script>window.location='".base_url()."'</script>";
    }else{
        $sql = "SELECT SUM(pendistribusian) AS total_pendistribusian FROM view_813";
        $hasil = $con->query($sql);
        $row = $hasil->fetch_assoc();
        $total = number_format($row['total_pendistribusian'],0,',','.');
?>
<div class="row">
    <div class="col-lg-12">
        <h3>Global Pendistribusian ZISKA</h3>
        <ol class="breadcrumb">
            <li><a href=""><i class="glyphicon glyphicon-signal"></i></a></li>
            <li class="active">Grafik Global Pendistribusian</li>
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
            $.getJSON("pendistribusian/data_pendistribusian.php", function(json) {
                grafik = new Highcharts.Chart({
                    chart: {
                        renderTo: 'data_pendistribusian',
                        type: 'column'
                    },
                    title: {
                        text: 'Pendistribusian ZISKA Berdasar Periode Bulanan'
                        
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