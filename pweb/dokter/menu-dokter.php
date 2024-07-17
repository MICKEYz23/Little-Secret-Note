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
    // if(!isset($_SESSION['id'])){
    //     header("location:login-dokter.html");
    //     exit;
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama</title>
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
            background-color: #ebd4cf;
            height:550px;
            /* text-align: center; */
        }
        .user{
            font-size: 20pt;
            padding-top: 25pt;
            text-align: center;
            color: #815767;
        }
        .menuutama{
            margin: auto;
            width: 1250px;
            height: 480px;
        }
        .kalimat1{
            margin-top: 10px;
            font-size: 20px;
            text-align: justify;
            padding:15px;
        }
        .kalimat2{
            margin-top: 25px;
            font-size: 20px;
            text-align: justify;
            padding:15px;
        }
        .gambar1{
            float: left;
            margin-left: 20px;
            margin-right:15px;
            margin-top: 10px;
        }
        .gambar2{
            float: right;
            margin-right: 20px;
            margin-left:15px;
            /* margin-bottom: 100px; */
        }
        /* .gambar1:hover, .gambar2:hover{
            opacity: 0.5;
        } */
        .kotak2{
            background-color: white;
            width:650px;
            padding:12px;
            text-align: justify;
            float: right;
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
            box-shadow: 3px 2px 2px gray;
            font-size: 17px;
        }
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
            height: 57px;
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
            <p class="user"><b>Halo, </b> <?php echo $user2->username;?></p>
            <div class="menuutama">
                    <!-- <div class="foto1"> -->
                        <img src="../gambar/gb2.jpg" width="215px" height="215px" class="gambar1">
                        <p class="kalimat1">Little Secret Note atau yang dalam bahasa Indonesia adalah Catatan Rahasia Kecil adalah 
                            aplikasi berbasis web yang dibuat dengan tujuan membantu banyak orang yang membutuhkan 
                            tempat untuk bercerita. Little Secret Note tidak membatasi setiap cerita yang ingin dicurahkan, 
                            setiap orang bebas bercerita baik itu mengenai pekerjaan, keluarga, hubungan dan lain-lain. 
                            Little Secret Note menyediakan beberapa teman profesional yang siap sedia membalas cerita-cerita 
                            yang dicurahkan dan terjamin aman atau dalam kata lain, hanya sang teman yang telah dipilih 
                            yang tau cerita tersebut.
                            Jika ingin bercerita dalam jangka waktu yang lama, Little Secret Note memberikan kesempatan agar setiap
                            orang dapat mencantumkan nomor teleponnya saat registrasi.                            
                        </p> 
                    <!-- </div> -->
                    <!-- <div class="foto2"> -->
                    <img src="../gambar/gb3.jpg" width="215px" height="215px" class="gambar2">
                    <p class="kalimat2">Tujuan utama dari aplikasi ini adalah bersedia menjadi wadah untuk siapapun yang membutuhkan 
                            teman untuk bercerita, karena banyak orang yang stres atau depresi karena masalah yang dialaminya 
                            dan tidak memiliki teman untuk bercerita.
                            Dengan motto "NYAMAN, BEBAS & RAHASIA", Little Secret Note berharap dapat sangat membantu semua 
                            orang dengan teman-teman hebat yang bergabung didalamnya.
                        </p>
                        <p class="kalimat2"><b>"Keterbukaan adalah awal pemulihan"</b></p> 
                    <!-- </div> -->
            </div>
        </div>
        <div class="footer">
            <p><b>Copyright 2023 &copy; Little Secret Note </b></p>
        </div>
    </div>
</body>
</html>