<?php
    session_start();
    include 'c:/xampp/htdocs/curhatOnline/pweb/koneksi.php';
    $_SESSION['idd'];
    $idd= $_SESSION['idd'];
    // $nama = $_POST['nama'];
    $idc = $_POST['idc'];
    $idpasien = $_POST['idp'];
    $namap = $_POST['namaP'];
    $isi = $_POST['isi'];
    $tgl = $_POST['tanggal'];
    $query = mysqli_query($koneksi, "INSERT INTO tanggapan VALUES('', '$idd', '$idpasien','$idc','$tgl','$isi')");
    if(isset($query)){
        echo "<script type='text/javascript'>
        alert('Tanggapan anda berhasil terkirim');
        document.location.href='data-curhatan.php';
        </script>";
    }else{
        echo " gagal kirim tanggapan";
    }