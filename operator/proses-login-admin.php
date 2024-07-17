<?php
    session_start();
    include 'c:/xampp/htdocs/curhatOnline/pweb/koneksi.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($koneksi, "SELECT * FROM operator WHERE 
    username='$username' and password='$password'");
    if(mysqli_num_rows($query) == 1){
        $cek = mysqli_fetch_object($query);
        $_SESSION['login']=true;
        $_SESSION['ida'] = $cek->id_operator;
        $_SESSION['admin'] = $cek;
        header("location:review.php");

    }