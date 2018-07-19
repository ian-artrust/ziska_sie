<?php
    require_once "../../_config/config.php";
    if(!isset($_SESSION['username'])){
        echo "<script>window.location='".base_url()."'</script>";
    }else{
        $kode_daerah = $_SESSION['kode_daerah'];
        // Data Penghimpunan Zakat
        $query = mysqli_query($con,"SELECT pendistribusian AS zakat FROM view_813a WHERE kode_daerah='$kode_daerah'");
        $rows = array();
        $rows['name'] = 'zakat';
        while($tmp= mysqli_fetch_array($query)) {
            $rows['data'][] = $tmp['zakat'];
        }

        // Data Penghimpunan Infak
        $query = mysqli_query($con,"SELECT pendistribusian AS infak FROM view_813b WHERE kode_daerah='$kode_daerah'");
        $rows1 = array();
        $rows1['name'] = 'infak';
        while($tmp= mysqli_fetch_array($query)) {
            $rows1['data'][] = $tmp['infak'];
        }

        $result = array();
        array_push($result,$rows);
        array_push($result,$rows1);
        print json_encode($result, JSON_NUMERIC_CHECK);

        mysqli_close($con);
    }
?>