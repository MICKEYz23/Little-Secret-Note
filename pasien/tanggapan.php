<?php
    session_start();
    include 'c:/xampp/htdocs/curhatOnline/pweb/koneksi.php';
    if(!isset($_SESSION['login'])){
        header("location:login-pasien.php");
        exit;
    }
    $_SESSION['id'];
    $id= $_SESSION['id'];
    $user = mysqli_query($koneksi, "SELECT * from pasien where id_pasien='$id'");
    $user2 = mysqli_fetch_object($user);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanggapan Teman</title>
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
          .link3{
            margin-right:90px;
            color:black;
          }

        .konten{
            height:499px;  
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
            margin-bottom:15px;
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
            margin:auto;
            display:flex;
            justify-content:center;
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
            height: 60px;
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
            <p class="tema"><b>TANGGAPAN RESPONDEN</b></p>
            <table class="table">
                <tr>
                    <th>Nama Teman</th>
                    <th>Tanggal</th>
                    <th>Tanggapan</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $idp = $user2->id_pasien;
                $tampil = mysqli_query($koneksi, "SELECT tanggapan.id_tanggapan, dokter.nama_dokter, tanggapan.tanggal, tanggapan.tanggapan FROM tanggapan INNER JOIN dokter 
                on dokter.id_dokter = tanggapan.id_dokter where id_pasien='$idp' order by id_tanggapan DESC;");
                while($hasil = mysqli_fetch_assoc($tampil)){
                    $id=$hasil['id_tanggapan'];
                ?>
                <tr class="data">
                    <td><?php echo $hasil['nama_dokter']; ?></td>
                    <td><?php echo $hasil['tanggal']; ?></td>
                    <td><?php echo $hasil['tanggapan']; ?></td>
                    <td><a href="hapus-datacurhat.php?&id_tanggapan=<?php echo $hasil['id_tanggapan'];?>" onClick="return confirm('Yakin Dihapus')">Hapus</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <input type="button" name="" onClick="window.location.href='menu-pasien.php'" 
                    class="button" value="Kembali">
        </div>
        <div class="footer">
            <p><b>Copyright 2023 &copy; Little Secret Note </b></p>
        </div>       
    </div>

</body>
</html>