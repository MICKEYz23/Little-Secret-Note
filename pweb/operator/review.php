<?php
    session_start();
    include 'c:/xampp/htdocs/curhatOnline/pweb/koneksi.php';
    if(!isset($_SESSION['login'])){
        header("location:login-admin.php");
        exit;
    }
    $_SESSION['ida'];
    $user = mysqli_query($koneksi, "SELECT * from operator where id_operator='$_SESSION[ida]'");
    $user2 = mysqli_fetch_object($user);
    function query($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows [] = $row;
        }
        return $rows;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ulasan</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Urbanist:wght@300&display=swap');
        *{
            margin: 0px;
            font-family: 'Urbanist', sans-serif;
            text-decoration: none;
        }

        .container{
            margin: 0px auto;
            
        }

        body{
            background-color: #3f2e34;
        }
        .header{
            background-image: url("../logo.png");
            background-repeat: no-repeat;
            height:100px;
            background-color:#dfb9c8;
        }
        .navbar{
            margin-right:110px;
            display: flex;
            justify-content:right;
            padding-top:33px;
        } 
          .dropdown {
            margin:10px;
            position: relative;
            display: inline-block;
          }
          
          .dropdown-content {
            display: none;
            position: absolute;
            background-color: none;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
          }
          
          .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
          }
          
          .dropdown-content a:hover {background-color: #f1f1f1}
          

          .dropdown:hover .dropdown-content {
            display: block;
          }
          .link{margin:10px;
            margin-right:30px;
            color:black;
            }
          .link2{
            margin-top:5px;
            font-size: 24px;
            color:#815767;
            font-weight: bold;
          }
          .link3{
            margin-right:90px;
            color:black;
          }

        .konten{
            height: 502px;    
            padding-bottom:15px;
            background-color: #ebd4cf;
            /* text-align: center; */
        }

        .tema{
            font-size: 20pt;
            padding-top: 25pt;
            text-align: center;
            color: #815767;
        }
        .table{
            width:540px;
            color: #232323;
            border-collapse:collapse;
            margin:auto;
            margin-top:20px;
            align-items: center;
        }
        .table, th, td{
            width:1250px;
            text-align: center;
            border: 1px solid #999;
            padding:8px 20px;
        }
        .data:hover{
            background-color: #a3687e;
            color:white;
        }
        .tombol{
            width:378px;
            margin:auto;
            display: flex;
            justify-content: center;}
        .button{
            height: 25px;
            width: 110px;
            margin-top: 10px;
            font-size: 11pt;
            /* background-color:#382012; */
            background-color: #a3687e;
            border:0.5px solid #5a3f49;
            border-radius: 13px;
            color: white;
        }
        .button2{
            margin-right:10px;
        }

        .button:hover {
	        color: white;
	        background-color: #5a3f49;
	    }

        .footer{
            text-align: center;
            background-color:#dfb9c8;
            padding: 20px;
            box-sizing: border-box;
            color: #231317;
            font-size: 9.5pt;
            height: 55px;
        }
        .user{
            display:flex;
            justify-content:space-between;
            padding-top:10px;
            margin-right:20px;
            margin-left:20px;
        }
        .nmuser{
            font-size:13pt;
            margin-top:15px;
            color: #815767;
        }
        .page{
            margin-top:12px;
            text-align:center;
            color:black;
            font-size:14pt;
        }
        
    </style>
</head>
<body>
<div class="container">
        <div class="header">
        <nav class="navbar">
            <a class="link link2">Halo, <?=$user2->nama_operator?></a>
            <a class="link" href="review.php">Data Ulasan</a>
            <a class="link" href="data-curhat.php">Data Curhatan</a>
            <a class="link" href="logout-admin.php">Keluar</a>
        </nav>
    </div>
    <div class="konten">
        <p class="tema"><b>DATA ULASAN</b></p>
            <table class="table">
        <tr>
            <th>Nomor</th>
            <th>Nama Pengguna</th>
            <th>Nama</th>
            <th>Isi Ulasan</th>
        </tr>
        <?php
        
            $jumlahDataPerHalaman = 3;
            $jumlahData = count(query("SELECT tanggapan.*, pasien.nama_pasien, pasien.username FROM tanggapan, pasien 
            WHERE tanggapan.id_pasien = pasien.id_pasien;"));
            $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
            $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
            $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;



            // $tampil = mysqli_query($koneksi, "SELECT id_curhat, usernamep, nama_pasien, notelp, jam, tanggal, isi_cuhat FROM curhatan, dokter
            // WHERE curhatan.teman = dokter.id_dokter AND dokter.id_dokter='$_SESSION[idd]' LIMIT $awalData, $jumlahDataPerHalaman");
            // while($hasil = mysqli_fetch_assoc($tampil)){
            //     $url= "https://wa.me/".$hasil['notelp'];
            //     $tlp = $hasil['notelp'];
            //     $id=$hasil['id_curhat'];
            //     $username = $hasil['usernamep'];
        ?>
        <?php
            $tampil = mysqli_query($koneksi, "SELECT tanggapan.*, pasien.nama_pasien, pasien.username FROM tanggapan, pasien 
            WHERE tanggapan.id_pasien = pasien.id_pasien LIMIT $awalData, $jumlahDataPerHalaman");
            while($hasil = mysqli_fetch_assoc($tampil)){
        ?>
        <tr class="data">
            <td><?php echo $hasil['id_tanggapan']; ?></td>
            <td><?php echo $hasil['username']; ?></td>
            <td><?php echo $hasil['nama_pasien'] ; ?></td>
            <td><?php echo $hasil['tanggapan'] ?></td>
        </tr>
        <?php
            }
        ?>
    </table>
    <div class="page">
        <?php if($halamanAktif > 1 ) : ?>
            <a class="page" href="?halaman=<?= $halamanAktif - 1 ; ?>">&laquo;</a>
        <?php endif ; ?>
    
        <?php for($i = 1; $i <=$jumlahHalaman; $i++) : ?>
            <?php if($i == $halamanAktif) : ?>
            <a class="page" href="?halaman=<?=$i;?>" style=" font-weight:bold; color:maroon"><?= $i ;?></a>
            <?php  else : ?>
                <a class="page" href="?halaman=<?=$i;?>"><?= $i ;?></a>
            <?php endif ;?>
        <?php endfor; ?>
    
        <?php if($halamanAktif < $jumlahHalaman ) : ?>
            <a class="page" href="?halaman=<?= $halamanAktif + 1 ; ?>">&raquo;</a>
        <?php endif ; ?>
    </div>
        </div>
        <div class="footer">
            <p><b>Copyright 2023 &copy; Little Secret Note </b></p>
        </div>       
    </div>
</body>
</html>