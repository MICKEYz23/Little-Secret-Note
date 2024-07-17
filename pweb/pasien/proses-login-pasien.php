<?php
    session_start();
    include 'c:/xampp/htdocs/curhatOnline/pweb/koneksi.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($koneksi, "SELECT * FROM pasien WHERE 
    username ='$username' and password ='$password'");
    if(mysqli_num_rows($query) == 1){
        $cek = mysqli_fetch_object($query);
        $_SESSION['login']=true;
        $_SESSION['id'] = $cek->id_pasien;
        $_SESSION['pasien'] = $cek;
        header("location:menu-pasien.php");

    }