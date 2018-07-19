<?php
    require_once "../../_config/config.php";
    if(!isset($_SESSION['username'])){
        echo "<script>window.location='".base_url()."'</script>";
    }else{

        $kode_daerah = $_SESSION['kode_daerah'];
        
        // Data Penghimpunan Zakat
        $query = mysqli_query($con,"SELECT asnaf, jml_distribusi FROM view_814a WHERE kode_daerah='$kode_daerah'");
        $rows = array();
        while($tmp= mysqli_fetch_array($query)) {
            $row['0'] = $tmp['0'];
            $row['1'] = $tmp['1'];
            array_push($rows,$row);
        }
        print json_encode($rows, JSON_NUMERIC_CHECK);

        mysqli_close($con);
    }
?>