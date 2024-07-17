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
   date_default_timezone_set('Asia/Jakarta'); 
//    $jam = date('G:i:s');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curhatan</title>
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
            height: 380px;
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
            margin-top: -4px;
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
            <p class="tema"><b>CURHATAN</b></p>
            <form action="proses-kirim-curhat.php" method="post">
                <div class="layout">
                    <div class="satu">
                        <label class="id">ID:  <b><?=$cetak->id_pasien;?></b></label> 
                        <label for="">Nama Pengguna</label>
                        <p><input type="text" name="username" class="input" value="<?php echo $cetak->username;?>" readonly></p><br>
                        <label for="">Nama</label>
                        <p><input type="text" name="nama" class="input" value="<?= $cetak->nama_pasien;?>"></p><br>
                        <label for="">No Telepon</label>
                        <p><input type="tel" name="telp" class="input" value="<?= $cetak->no_telp;?>"></p><br>
                        <label for="">Jam</label>
                        <p><input type="text" name="jam" class="input" value="<?php echo date('G:i:s') ;?>" readonly></p><br>
                    </div>
                    <div class="dua">
                        <label for="">Tanggal</label>
                        <p><input type="text" name="tgl" class="input" value="<?php echo date('Y-m-d');?>" readonly></p><br>
                        <label for="">Pilih Temanmu</label>
                        <p><select name="teman" class="input">

                        <?php
                            $tampil = mysqli_query($koneksi, "SELECT id_dokter, nama_dokter FROM dokter");
                            while($result = mysqli_fetch_object($tampil)){

                        ?>

                            <option value="<?php echo $result->id_dokter?>"><?php echo $result->nama_dokter?></option>
                            <?php }?>
                        </select></p><br>
                        <label for="">Isi</label>
                        <textarea name="isi" class="textarea" required></textarea>
                    </div>
                </div>
                <div class="kotak2">
                    <input type="submit" name="Ganti" 
                    class="button" value="Kirim">
                    <input type="button" name="" onClick="window.location.href='menu-pasien.php'" 
                    class="button" value="Kembali">
                    </div>
            </form>
        </div>
        <div class="footer">
            <p><b>Copyright 2023 &copy; Little Secret Note </b></p>
        </div>       
    </div>
</body>
</html>