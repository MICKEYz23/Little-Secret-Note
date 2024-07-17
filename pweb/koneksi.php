<?php
    $host = "localhost";
    $user = "root";
    $sandi = "";
    $db = "pweb_db";
    $koneksi = mysqli_connect($host, $user, $sandi);
    if($koneksi){
        // echo"oke";
    }else{
    }
    $dbOke = mysqli_select_db($koneksi, $db);
    if($dbOke){
        // echo "oke juga";
    }else{
    }
?>