<?php
    require_once "../_config/config.php";
    if(isset($_SESSION['username'])){
        echo "<script>window.location='".base_url()."'</script>";
    }else{
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Ziska SIE</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('_assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <div class="container">
            <br>
            <center><img src="<?=base_url('_assets/images/logo_login.png');?>" alt=""></center>
            <div align="center" style="margin-top:50px;">
                <?php
                    if (isset($_POST['login'])) {
                        $username   = trim(mysqli_real_escape_string($con, $_POST['username']));
                        $password   = base64_encode(trim(mysqli_real_escape_string($con, $_POST['password'])));
                        $sql        = "SELECT 
                                        * 
                        FROM sys_users 
                        WHERE username='$username' AND password='$password' AND active='Yes' AND level='AD'
                        OR username='$username' AND password='$password' AND active='Yes' AND level='Direktur'
                        OR username='$username' AND password='$password' AND active='Yes' AND level='Pengurus'";
                        $exe_login  = $con->query($sql);
                        $row 		= $exe_login->fetch_assoc();
                        if (mysqli_num_rows($exe_login)>0) {
                            $_SESSION['id_user']		= $row['id_user'];
                            $_SESSION['username'] 		= $row['username'];
                            $_SESSION['password']		= $row['password'];                        
                            $_SESSION['level'] 			= $row['level'];
                            $_SESSION['kode_petugas']	= $row['kode_petugas'];
                            $_SESSION['kode_daerah']	= $row['kode_daerah'];
                            $_SESSION['no_kantor']		= $row['no_kantor'];
                            $_SESSION['status']			= 'LOGIN';
                            echo "<script>window.location='".base_url()."'</script>";
                        } else {?>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="alert alert-danger alert-dismissable" role="alert">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">
                                            &times;
                                        </a>
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <strong>Login Gagal..!</strong>Uername / Password Salah
                                    </div>
                                </div>
                            </div>
                        <?php } 
                        
                    }
                ?>
                <form action="" method="post" class="navbar-form">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="username" id="username" 
                        placeholder="Username..." class="form-control" required autofocus>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <input type="password" name="password" id="password" 
                        placeholder="Password..." class="form-control" required>
                    </div>
                    <div class="input-group">
                        <input type="submit" name="login" class="btn btn-success" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="<?=base_url('_assets/js/jquery.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>

</body>

</html>
<?php
}
?>
