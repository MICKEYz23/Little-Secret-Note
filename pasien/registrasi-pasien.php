<?php
    session_start();
    include 'c:/xampp/htdocs/curhatOnline/pweb/koneksi.php';

     //membuat id otomatis
     $query1 = mysqli_query($koneksi, " SELECT MAX(id_pasien) AS kd_pasien FROM pasien");
     $tambahpasien = mysqli_fetch_object($query1);
     $idPasien = $tambahpasien->kd_pasien;
 
     $urutan = (int) substr($idPasien, 3, 2);
     $urutan++;
     $huruf = "PAS";
     $idPasien = $huruf. sprintf("%02s", $urutan);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resgistrasi</title>
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
            height: 440px;
            background-color: #ebd4cf;
        }

        .tema{
            font-size: 20pt;
            padding-top: 25pt;
            text-align: center;
            color: #815767;
        }

        form{
            margin: auto;
            margin-top: 25px;
            align-items: center;
            width: 230px;
            /* height:160px; */
        }

        label{
            display: block;
            margin-bottom: 4px;
            font-size: 13pt;
            color: #5a3f49;
        }

        .input {
            width:220px;
            height:24px;
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

        .input2{
            width: 16px;
            height: 12px;
            margin-top: 7px;
        }

        span{
            font-size: 12.5pt;
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
            <p class="tema"><b>REGISTRASI</b></p>
            <form action="proses-reg-pasien.php" method="post">
                <label>Nama</label>
                <input type="text" name="nama" class="input" required>
                <label>Nama Pengguna</label>
                <input type="text" name="username" class="input" required>
                <label for="">Kata Sandi</label>
                <input type="password" name="password" class="input" required>
                <label for="">Jenis Kelamin</label>
                <div class="kotak">
                    <p><input type="radio" name="gender" value="L" class="input2"> <span>Laki-laki</span>
                    <input type="radio" name="gender" value="P" class="input2"> <span>Perempuan</span></p>
                </div>
                <label for="">No. Telepon</label>
                <input type="tel" name="telp"class="input" value= "+62" required>
                <input type="submit" name="daftar" value="Daftar" class="button"> <a href="login-pasien.php"><input type="button" value="Masuk" class="button"></a>
            </form>
            
        </div>
        <div class="footer">
            <p><b>Copyright 2022 &copy; Little Secret Note</p>
        </div>
    </div>
</body>
</html>