<?php 
session_start();

session_destroy();

echo "<script>alert('Anda telah keluar dari dashboard'); window.location='../auth/login.php'</script>";

?>