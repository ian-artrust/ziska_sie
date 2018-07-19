<?php
    require_once "../../_config/config.php";
    if(!isset($_SESSION['username'])){
        echo "<script>window.location='".base_url()."'</script>";
    }else{

        $kode_daerah = $_SESSION['kode_daerah'];
        
        // Data Penghimpunan Zakat
        $query = mysqli_query($con,"SELECT 'Aktif' AS aktif, COUNT(npwz) AS jml_aktif FROM view_231 WHERE kode_daerah='$kode_daerah'");
        $query_dua = mysqli_query($con,"SELECT 'Non Aktif' AS non_aktif, COUNT(npwz) AS jml_non_aktif FROM view_231a WHERE kode_daerah='$kode_daerah'");
        $rows = array();
        while($tmp= mysqli_fetch_array($query)) {
            $row['0'] = $tmp['0']; 
            $row['1'] = $tmp['1']; 
            array_push($rows,$row);
        }

        while($tmp_dua= mysqli_fetch_array($query_dua)) {
            $row_dua['0'] = $tmp_dua['0'];
            $row_dua['1'] = $tmp_dua['1']; 
            array_push($rows,$row_dua);
        }

        print json_encode($rows, JSON_NUMERIC_CHECK);

        mysqli_close($con);
    }
?>