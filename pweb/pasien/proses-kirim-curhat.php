<?php
    session_start();
    include 'c:/xampp/htdocs/curhatOnline/pweb/koneksi.php';
    $_SESSION['id'];
    $idp=$_SESSION['id'];
    // $username = $_POST['username'];
    // $nama = $_POST['nama'];
    $jam = $_POST['jam'];
    $tanggal = $_POST['tgl'];
    $isi = $_POST['isi'];
    $teman = $_POST['teman'];
    // $telp = $_POST['telp'];
    $query = mysqli_query($koneksi, "INSERT INTO data_curhatan values 
    ('', '$idp', '$teman','$jam', '$tanggal', '$isi')");
    if(isset($query)){
        // echo"berhasil cuy!";
        // $query2 = mysqli_query($koneksi, "SELECT tanggal, isi_curhat from curhatan where username='$username' and jam ='$jam'");
        echo "<script type='text/javascript'>
        alert('Curhatan berhasil terkirim. Mohon untuk menunggu pesan dari kami.');
        document.location.href='menu-pasien.php';
        </script>";
        // $tampil = mysqli_fetch_array($query2);
    }else{
        echo "gagal";
    }
    
    ?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pasien</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Urbanist:wght@300&display=swap');
        *{
            margin: 0px;
            font-family: 'Urbanist', sans-serif;
            line-height: 12pt;
            text-decoration: none;
        }

        .container{
            width : 580px;
            margin: 0px auto;
            margin-bottom: 20px;
            margin-top:30px;         
        }

        body{
            background-color: #3f2e34;
        }
        
        .header{
            background-image: url("../gambar/gb1.png");
            height: 175px;
            width: 580px;
            background-size: cover;
        }

        .konten{    
            height: 453px;
            background-color: #ebd4cf;
        }

        .tema{
            font-size: 20pt;
            padding-top: 25pt;
            text-align: center;
            color: #815767;
        }

        .tanggal{
            font-size: 15pt;
            padding-top: 40px;
            padding-left: 50px;
            text-align: left;
            color: #815767;
        }

        .hasil{
            font-size: 15pt;
            padding-top: 65px;
            padding-left: 50px;
            text-align: left;
            color: #815767;
        }

        .button{
            height: 25px;
            width: 110px;
            margin-top: 215px;
            font-size: 11pt;
            /* background-color:#382012; */
            background-color: #a3687e;
            border:0.5px solid #5a3f49;
            border-radius: 13px;
            color: white;
            float: right;
            margin-right: 50px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">

        </div>
        <div class="konten">
            <p class="tema"><b>HASIL CURHAT</b></p>
            <p class="tanggal">Tanggal :   </p>
            <p class="hasil">Isi :  </p>
            <p class="hasil">Nama Dokter :  </p>
            <p class="hasil">Tanggapan Dokter :  </p>
            <a href="menu-pasien.php"><input type="button" value="Kembali" class="button"></a>
        </div>
        <div class="footer">
            <p><b>Copyright 2022 &copy; Petrik || XII RPL 3</p>
        </div>
    </div>
</body>
</html> -->
   