<?php
    session_start();
    include 'c:/xampp/htdocs/curhatOnline/pweb/koneksi.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($koneksi, "SELECT * FROM dokter WHERE 
    username='$username' and password='$password'");
    if(mysqli_num_rows($query) == 1){
        $cek = mysqli_fetch_object($query);
        $_SESSION['login']=true;
        $_SESSION['idd'] = $cek->id_dokter;
        $_SESSION['dokter'] = $cek;
        header("location:menu-dokter.php");

    }else{
        echo"Gagal login";
    }
    // $loginob = mysqli_fetch_object($query);
    // $cek = mysqli_num_rows($query);
    // if($cek){
    //     $_SESSION['userame'] = $username;
    //     $_SESSION['passwd'] = $password;
    //     header("location:menu-dokter.php");
    //     exit;
    // }else{
    //     header("location:login-dokter.html");
    // }
?>