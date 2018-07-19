<?php
    date_default_timezone_set('Asia/Jakarta');
    
    session_start();

    $con = mysqli_connect('localhost','root','dbadmin','dbziska');

    // $con = mysqli_connect('156.67.221.151','root','dbadmin','dbziska');

    if (mysqli_connect_errno()) {
        
        echo mysqli_connect_error();
    }

    function base_url($url=null){

        $base_url = "http://localhost/ziska_sie";

        // $base_url = "http://156.67.221.151/ziska_sie";

        if ($base_url!=null) {
            
            return $base_url."/".$url;

        } else {

            return $base_url;
        
        }

    }


?>