<?php
    session_start();
    include 'c:/xampp/htdocs/curhatOnline/pweb/koneksi.php';
    if(!isset($_SESSION['login'])){
        header("location:login-pasien.php");
        exit;
    }
    $_SESSION['id'];
    $user = mysqli_query($koneksi, "SELECT * from pasien where id_pasien='$_SESSION[id]'");
    $cetak = mysqli_fetch_object($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan</title>
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
            /* margin: auto; */
            height: 502px;    
            background-color: #ebd4cf;            
            /* text-align: center; */
        }

        .kotak1{
            width: 650px;
            /* background-color: white; */
            margin: 0px auto;
        }

        .tema{
            font-size: 20pt;
            padding-top: 25pt;
            text-align: center;
            color: #815767;
        
        }

        form{
            margin: auto;
            margin-top: 32px;
            align-items: center;
            /* width: 230px; */
            /* height: 160px; */
        }

        label{
            display: block;
            margin-top: 8px;
            margin-bottom: 10px;
            font-size: 13pt;
            color: #5a3f49;
        }

        .password{
            color:#5a3f49;
            font-size: 13pt;
            font-weight: bold;
        }
        .password:hover{
            text-decoration: underline;
        }
        .input {
            margin: 0px auto;
            width: 650px;
            height:38px;
            font-size: 12.5pt;
            margin-bottom: 15px;
            margin-top: 0px;
            background-color: #f4e8e6;
            border: 0.5px solid #70505c;
        }

        .textarea {
            width: 650px;
            height: 65px;
            font-size: 12.5pt;
            margin-bottom: 15px;
            margin-top: 0px;
            background-color: #f4e8e6;
            border: 0.5px solid #70505c;
        }
        
        .kotak{
            width: 220px;
            height: 27px;
            background-color: white;
            padding: 2px;
            border: 0.5px solid #70505c;
            margin-bottom: 15px;
        }

        /* .input2{
            width: 16px;
            height: 12px;
            margin-top: 7px;
        } */

        span{
            font-size: 12.5pt;
        }
        .kotak2{
            width: 400px;
            /* background-color: white;   */
            margin: auto;
            text-align:center;
            margin-top: 20px;
        }
        .button{            
            height: 28px;
            width: 150px;     
            margin-left: 40px;   
            /* margin-top: 10px; */
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
                <a class="link" href="menu-pasien.php">Beranda</a>
                <a class="link" href="curhatan.php">Curhat</a>
                <a class="link" href="tanggapan.php">Tanggapan</a>
                <a class="link" href="review.php">Ulasan</a>
                <div class="dropdown">
                  <a class="link" href="">Profil</a>
                  <div class="dropdown-content">
                      <a class="link2" href="ubah-nama.php">Ubah Data</a>
                      <a class="link2" href="logout-pasien.php">Keluar</a>
                  </div>
                </div>
              
          </nav>
        </div>
        <div class="konten">
            <p class="tema"><b>ULASAN</b></p>
            <form action="proses-kirim-review.php" method="post">
                <div class="kotak1">
                <label for="">Nama Pengguna</label>
                <input type="text" name="username" class="input" value="<?= $cetak->username;?>" readonly>
                <label for="">Nama</label>
                <input type="text" name="nama" class="input" value="<?= $cetak->nama_pasien;?>" readonly>
                <label for="">Ulasan</label>
                <textarea name="isi" class="textarea" required></textarea>
                <div class="kotak2">
                    <input type="submit" name="Ganti"
                    class="button" value="Kirim">
                    <input type="button" name="" onClick="window.location.href='menu-pasien.php'" 
                    class="button" value="Kembali">
                </div>
                </div>
             </form>
        </div>
        <div class="footer">
            <p><b>Copyright 2023 &copy; Little Secret Note </b></p>
        </div>       
    </div>
</body>
</html>
