<?php
    require_once "../../_config/config.php";
    if(!isset($_SESSION['username'])){
        echo "<script>window.location='".base_url()."'</script>";
    }else{
        $kode_daerah = $_SESSION['kode_daerah'];
        // Data Penghimpunan
        $query = mysqli_query($con,"SELECT pendistribusian FROM view_813 WHERE kode_daerah='$kode_daerah'");
        $rows = array();
        $rows['name'] = 'pendistribusian';
        while($tmp= mysqli_fetch_array($query)) {
            $rows['data'][] = $tmp['pendistribusian'];
        }

        $result = array();
        array_push($result,$rows);
        print json_encode($result, JSON_NUMERIC_CHECK);

        mysqli_close($con);
    }
?>