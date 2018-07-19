<?php include_once "../_header.php"; ?>

    <div class="row">
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
        <div class="col-lg-12">
        <?php 
            if(isset($_GET['page'])){
                $page = $_GET['page'];
        
                switch ($page) {
                    case 'home':
                        include "home.php";
                        break;
                    case 'penghimpunan':
                        include "penghimpunan/penghimpunan.php";
                        break;
                    case 'penghimpunan_detail':
                        include "penghimpunan/penghimpunan_detail.php";
                        break;
                    case 'pendistribusian':
                        include "pendistribusian/pendistribusian.php";
                        break;
                    case 'pendistribusian_detail':
                        include "pendistribusian/pendistribusian_detail.php";
                        break;
                    case 'pendistribusian_bidang':
                        include "pendistribusian/pendistribusian_bidang.php";
                        break;
                    case 'pendistribusian_asnaf':
                        include "pendistribusian/pendistribusian_asnaf.php";
                        break;
                    case 'muzaki':
                        include "datapokok/muzaki.php";
                        break;				
                    default:
                        echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                        break;
                }
            }else{
                include "home.php";
            }
	    ?>
        </div>
    </div>

<?php include_once "../_footer.php"; ?>