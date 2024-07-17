<?php
    include 'c:/xampp/htdocs/curhatOnline/pweb/koneksi.php';
    $id = $_GET['id_tanggapan'];
    // mysqli_query($koneksi, "DELETE FROM curhatan where id_curhat='$id'") or die (mysqli_error());
    // header("location:data-curhatan.php?pesan=hapus");
    $hapus_data = "DELETE FROM tanggapan WHERE id_tanggapan='$id'";
    $jalan = mysqli_query($koneksi, $hapus_data);
    echo"<script type='text/javascript'>
                document.location.href='tanggapan.php';
                </script>";