<?php
    extract($_POST);
    extract($_GET);
    include 'c:/xampp/htdocs/curhatOnline/pweb/koneksi.php';
    $id = $_GET['id_curhat'];
    // mysqli_query($koneksi, "DELETE FROM curhatan where id_curhat='$id'") or die (mysqli_error());
    // header("location:data-curhatan.php?pesan=hapus");
    $hapus_data = "DELETE FROM curhatan WHERE id_curhat='$id'";
    $jalan = mysqli_query($koneksi, $hapus_data);
    if($jalan){
        echo "berhasil terhapus";
    echo"<script type='text/javascript'>
                document.location.href='data-curhatan.php';
                </script>";
    }else{
        echo "tidak terhapus";
    }
    // if(isset($_GET['id_curhat'])){
    //     $id = $_GET['id_curhat'];
    //     $query = "SELECT * FROM curhatan WHERE id_curhat = '$id'";
    //     $hasil = mysqli_query($koneksi, $query);
    // }else{
    //     echo "error";
    // }
    // if(!empty($id) && $id!=""){
    //     $hapus = "DELETE FROM curhatan where id_curhat='$id'";
    //     $sql = mysqli_query($koneksi, $hapus);
    //     if($sql){
    //         echo"berhasil hapus";
    //     }else{
    //         echo "gagal hapus";
    //     }
    // }