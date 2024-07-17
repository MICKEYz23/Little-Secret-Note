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
        // $cekdokter = mysqli_query($koneksi, "SELECT nama from dokter WHERE username='$_SESSION[userame]'");
        // $cari = mysqli_fetch_array($cekdokter);
    $id= $_GET['id_curhatan'];
    $cekuser = mysqli_query($koneksi, "SELECT data_curhatan.*, pasien.nama_pasien FROM data_curhatan, pasien 
    where data_curhatan.id_pasien = pasien.id_pasien AND data_curhatan.id_curhatan='$id'");
    $querycek = mysqli_fetch_array($cekuser);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TANGGAPAN</title>
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
            padding-top:30px;
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
          .link{
            font-size: 16.5px;
            margin:10px;
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

        form{
            margin: auto;
            margin-top: -5px;
            align-items: center;
            /* width: 470px; */
            padding:20px;
            /* background-color: yellow; */
            /* height: 160px; */
        }
        .layout{
            margin: auto;
            width: 950px;
            height: 360px;
            display:flex;
            /* background-color: black; */
        }
        .satu{
            margin: auto;
            /* margin-right: 20px; */
            /* background-color: white; */
        }
        .dua{
            margin: auto;
            /* margin-right: 20px; */
            /* background-color: white; */
        }
        label{
            display: block;
            margin-bottom: 4px;
            font-size: 13pt;
            color: #5a3f49;
        }
        .id{
            /* margin-bottom:10px; */
            /* margin-top: -15px; */
            margin-bottom: 25px;
        }
        .input {
            width: 430px;
            height: 33px;
            font-size: 12.5pt;
            margin-bottom: 4px;
            margin-top: 0px;
            background-color: #f4e8e6;
            border: 0.5px solid #70505c;
        }

        .textarea {
            width: 430px;
            height: 160px;
            font-size: 12.5pt;
            margin-bottom: 15px;
            margin-top: 0px;
            background-color: #f4e8e6;
            border: 0.5px solid #70505c;
        }
        
        .button{
            height: 25px;
            width: 130px;
            margin-top: 10px;
            margin-right:20px;
            font-size: 11pt;
            /* background-color:#382012; */
            background-color: #a3687e;
            border:0.5px solid #5a3f49;
            border-radius: 13px;
            color: white;
        }

        .button:hover {
	        color: white;
	        background-color: #5a3f49;
	    }
        .button{
            height: 28px;
            width: 150px;
            margin-top: 10px;
            margin-left:20px;
            font-size: 11pt;
            /* background-color:#382012; */
            background-color: #a3687e;
            border:0.5px solid #5a3f49;
            border-radius: 13px;
            color: white;
        }
        .button:hover {
	        color: white;
	        background-color: #5a3f49;
	    }
        .kotak2{
            width: 400px;
            /* background-color: white;   */
            margin: auto;
            text-align:Center;
            margin-top:-4px;
        }
        .footer{
            text-align: center;
            background-color:#dfb9c8;
            padding: 20px;
            box-sizing: border-box;
            color: #231317;
            font-size: 10.5pt;
            height: 55px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
        <nav class="navbar">
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
            <p class="tema"><b>TANGGAPAN</b></p>
            <form action="proses-balas-dokter.php" method="post"> 
                <div class="layout">
                    <div class="satu">
                        <label class="id">ID:  <b><?=$user2->id_dokter;?></b></label> 
                        <label for="">Nama Dokter</label>
                        <input type="text" name="nama" class="input" value="<?=$user2->nama_dokter;?>" readonly>
                        <label for="">ID Curhatan</label>
                        <input type="number" name="idc" class="input"  value="<?php echo $querycek['id_curhatan'];?>" readonly>
                        <label for="">ID Pasien</label>
                        <input type="text" name="idp" class="input" value="<?php echo $querycek['id_pasien'];?>" readonly>
                    </div>
                    <div class="dua">
                        <label for="">Nama Pasien</label>
                        <input type="text" name="namaP" class="input" value="<?= $querycek['nama_pasien'] ;?>" required>
                        <label for="">Tanggal</label>
                        <input type="text" name="tanggal" class="input" value="<?= date('Y-m-d')?>" readonly>
                        <label for="">Tanggapan</label>
                        <textarea name="isi" class="textarea" required></textarea>
                    </div>
                </div>
                <div class="kotak2">
                <input type="submit" value="Kirim" class="button">
                <input type="button" value="Kembali"  onClick="window.location.href='data-curhatan.php'" class="button">
                    </div>
            </form>
        </div>
        <div class="footer">
            <p><b>Copyright 2023 &copy; Little Secret Note </b></p>
        </div>       
    </div>
</body>
<!-- <input type="submit" value="Kirim" class="button"> <a href="data-curhatan.php"><input type="button" name="Registrasi" class="button" value="Kembali"></a></p> -->
</html>