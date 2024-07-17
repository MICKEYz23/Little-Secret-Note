<?php
    session_start();
    include 'c:/xampp/htdocs/curhatOnline/pweb/koneksi.php';
    if(!isset($_SESSION['login'])){
        header("location:login-dokter.php");
        exit;
    }
    $_SESSION['idd'];
    $user = mysqli_query($koneksi, "SELECT * from dokter where id_dokter='$_SESSION[idd]'");
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
    <title>Data Curhatan</title>
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
            /* margin-top: 10px; */
            display: none;
            position: absolute;
            background-color: #ebd4cf;
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
          .link3{
            margin-right:90px;
            color:black;
          }

        .konten{
            height: 502px;    
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
        /* .data:hover{
            background-color: #a3687e;
            color:white;
        } */
        .tombol{
            display: flex;
            justify-content: center;
            padding-bottom:15px;
            margin-right:21px;
        }
        .button{
            height: 25px;
            width: 110px;
            margin-top: 10px;
            margin-left:30px;
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
            <!-- <p>Halo <?php echo $user2->nama_dokter?></p>S -->
                <a class="link" href="menu-dokter.php">Beranda</a>
                <a class="link" href="data-curhatan.php">Data Curhatan</a>
                <div class="dropdown">
                  <a class="link" href="">Profil</a>
                  <div class="dropdown-content">
                      <a class="link2" href="ubah-nama.php">Ubah Data</a>
                      <a class="link2" href="logout-dokter.php">Keluar</a>
                  </div>
                </div>
              
          </nav>
        </div>
        <div class="konten">
            <p class="tema"><b> DATA CURHATAN</b></p>
            <table class="table">
        <tr>
            <th>Nama Pengguna</th>
            <th>Nama Pasien</th>
            <th>No Telepon</th>
            <th>Jam</th>
            <th>Tanggal</th>
            <th>Isi Curhatan</th>
            <th>Aksi</th>
        </tr>
        <?php
        
            $jumlahDataPerHalaman = 2;
            $jumlahData = count(query("SELECT data_curhatan.*, pasien.nama_pasien, pasien.username, pasien.no_telp FROM data_curhatan, pasien, dokter 
            WHERE data_curhatan.id_dokter = dokter.id_dokter AND dokter.id_dokter='$_SESSION[idd]'"));
            $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
            $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
            $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;



            $tampil = mysqli_query($koneksi, "SELECT data_curhatan.*, pasien.nama_pasien, pasien.username, pasien.no_telp FROM data_curhatan, pasien ,dokter 
            WHERE data_curhatan.id_dokter = dokter.id_dokter AND dokter.id_dokter='$_SESSION[idd]' LIMIT $awalData, $jumlahDataPerHalaman");
            while($hasil = mysqli_fetch_assoc($tampil)){
                $url= "https://wa.me/".$hasil['no_telp'];
                $tlp = $hasil['no_telp'];
                $id=$hasil['id_curhatan'];
                $username = $hasil['username'];
        ?>
        <tr class="data">
            <td><?php echo $hasil['username']; ?></td>
            <td><?php echo $hasil['nama_pasien']; ?></td>
            <td><?php echo "<a href=$url>$tlp</a>"; ?></td>
            <td><?php echo $hasil['jam']; ?></td>
            <td><?php echo $hasil["tanggal"]; ?></td>
            <td><?php echo $hasil['isi_curhatan']; ?></td>
            <td><a href="hapus.php?&id_curhatan=<?php echo $hasil['id_curhatan'];?>" onClick="return confirm('Yakin Dihapus')">Hapus</a> 
                 | <a href="balasan.php?&id_curhatan=<?php echo $hasil['id_curhatan'];?>&username=<?php echo $hasil['username'];?>">Balas</a>
            </td>
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
        <input type="button" name="" onClick="window.location.href='menu-dokter.php'" class="button" value="Kembali">
    </div>
        </div>
        <div class="footer">
            <p><b>Copyright 2023 &copy; Little Secret Note </b></p>
        </div>       
    </div>
</body>
</html>