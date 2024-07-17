<?php
if(isset($_SESSION['login'])){
    header("location:menu-pasien.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            padding-top: 60px;
            margin: 0px auto;
            margin-bottom: 20px;
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
            height: 260px;    
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
            margin-top: 25px;
            align-items: center;
            width: 230px;
            /* height: 160px; */
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
            <p class="tema"><b>LOG IN</b></p>
            <form action="proses-login-pasien.php" method="post"> 
                <label for="">Nama Pengguna</label>
                <input type="text" name="username" class="input" required>
                <label for="">Kata Sandi</label>
                <input type="password" name="password" class="input" required>
                <input type="submit" value="Masuk" class="button"> <a href="registrasi-pasien.php"><input type="button" name="Registrasi" class="button" value="Daftar"></a>
            </form>
        </div>
        <div class="footer">
            <p><b>Copyright 2023 &copy; Little Secret Note </b></p>
        </div>       
    </div>
</body>
</html>