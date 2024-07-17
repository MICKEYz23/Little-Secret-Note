<?php
        session_start();
        include 'c:/xampp/htdocs/curhatOnline/pweb/koneksi.php';
        if(!isset($_SESSION['login'])){
            header("location:login-dokter.php");
            exit;
        }
        $_SESSION['idd'];
        $cekuser = mysqli_query($koneksi, "SELECT * FROM dokter where id_dokter = '$_SESSION[idd]'");
        $tampil = mysqli_fetch_object($cekuser);

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
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
            padding-top: 30pt;
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
            margin-top: 30px;
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
            <p class="tema"><b>UBAH DATA</b></p>    
                <form action="" method="post">
                    <div class="kotak1">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="input" value="<?=$tampil->nama_dokter;?>" >
                    <label for="">Username</label>
                    <input type="text" name="username" class="input" value="<?=$tampil->username;?>" >
                    <label for="">Password</label>
                    <input type="password" name="passwordL" class="input" value="<?=$tampil->password;?>" readonly>
                    <a class="password" href="ubah-pass.php" target="_self">Ingin Ubah Password?</a>
                    <div class="kotak2">
                        <input type="submit" name="Ganti" onclick="confirm('Anda yakin ingin mengubah data anda?')" 
                        class="button" value="Kirim">
                        <input type="button" name="" onClick="window.location.href='menu-dokter.php'" 
                        class="button" value="Kembali">
                  </div>
                    </div>
                </form>
            
            <?php
            if(isset($_POST['Ganti'])){
                $passwordl = $_POST['passwordL'];
                $username= $_POST['username'];
                $nama = $_POST['nama'];
                $update = "UPDATE dokter SET  nama_dokter='$nama', username='$username' where id_dokter='$_SESSION[idd]'";
                $updatequery = mysqli_query($koneksi, $update);
                if(isset($updatequery)){
                    echo"<script type='text/javascript'>
                        alert('Data berhasil diubah');
                        document.location.href='menu-dokter.php';
                        </script>";
            }else{
                echo "error";
            }
            }
            ?>
        </div>
        <div class="footer">
            <p><b>Copyright 2023 &copy; Little Secret Note </b></p>
        </div>       
    </div>
</body>
</html>