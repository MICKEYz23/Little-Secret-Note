<?php
    session_start();
    include 'c:/xampp/htdocs/curhatOnline/pweb/koneksi.php';
    $_SESSION['id'];
    $idpa = $_SESSION['id'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $isi = $_POST['isi'];
    $query = mysqli_query($koneksi, "INSERT INTO review values 
    ('', '$idpa','$isi')");
    if(isset($query)){
        $_SESSION['username'] = $username;
        header("location: menu-pasien.php");
        exit;
    }else{
        echo"gagal";
    }
?>