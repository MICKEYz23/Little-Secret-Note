<?php
    session_start();
    include 'c:/xampp/htdocs/curhatOnline/pweb/koneksi.php';
    if(isset($_POST['daftar'])){
        $query1 = mysqli_query($koneksi, " SELECT MAX(id_pasien) AS kd_pasien FROM pasien");
        $tambahpasien = mysqli_fetch_object($query1);
        $idPasien = $tambahpasien->kd_pasien;
    
        $urutan = (int) substr($idPasien, 3, 2);
        $urutan++;
        $huruf = "PAS";
        $idPasien = $huruf. sprintf("%02s", $urutan);
        
        $id = $idPasien;
        $nama=$_POST['nama'];
        $userr=$_POST['username'];
        $pass=$_POST['password'];
        $gender=$_POST['gender'];
        $telp=$_POST['telp'];
        $cek_login = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pasien WHERE username='$userr'"));
        if( $cek_login > 0){
            $_SESSION['usernm'] = $userr;
            echo"<script type='text/javascript'>
                alert('Maaf, username sudah terdaftar');
                document.location.href='registrasi-pasien.php';
                </script>";
        }else{
            $register = mysqli_query($koneksi, "INSERT INTO pasien VALUES('$id', '$nama', '$userr', '$pass', '$gender', '$telp')");
            if($register){
                $_SESSION['nama']=$nama;
                $_SESSION['userna']=$userr;
                $_SESSION['pass']=$pass;
                $_SESSION['gender']=$gender;
                header("location:login-pasien.php");
            }
        }
    }else{
        echo" erorr";
    }
    
    // $nama=$_POST['nama'];
    // $usern=$_POST['username'];
    // $pass=$_POST['password'];
    // $gender=$_POST['gender'];
    // $query = mysqli_query($koneksi, "INSERT INTO dokter VALUES 
    // ('','$nama', '$usern', '$pass', '$gender')");
    // if($query){
    //     // echo "data berhasil terinput";
    //     $_SESSION['nama']=$nama;
    //     $_SESSION['usern']=$usern;
    //     $_SESSION['pass']=$pass;
    //     $_SESSION['gender']=$gender;
    //     header("location:login-dokter.html");
    // }else{
    //     echo "data gagal terinput";
    //     // header("location:registrasi.html");
    // }
    ?>
<?php
    // session_start();
    // include 'c:/xampp2/htdocs/pkkpetrik/koneksi.php';
    // if(isset($_POST['daftar'])){
    //     $nama=$_POST['nama'];
    //     $usern=$_POST['username'];
    //     $pass=$_POST['password'];
    //     $gender=$_POST['gender'];
    //     $telp=$_POST['telp'];
    //     $cek_login = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pasien WHERE username='$usern'"));
    //     if( $cek_login > 0){
    //         // $_SESSION['userna'] = $usern;
    //         echo"<script type='text/javascript'>
    //             alert('Maaf, username sudah terdaftar');
    //             document.location.href='registrasi-pasien.html';
    //             </script>";
    //     }else{
    //         mysqli_query($koneksi, "INSERT INTO pasien(nama, username, password, gender, notelp) VALUES 
    //         ('$nama', '$usern', '$pass', '$gender', '$telp')");
    //         $_SESSION['nama']=$nama;
    //         $_SESSION['usern']=$usern;
    //         $_SESSION['pass']=$pass;
    //         $_SESSION['gender']=$gender;
    //         $_SESSION['telp'] = $telp;
    //         header("location:login-pasien.html");
    //     }}
    ?>
    <?php
    // $nama=$_POST['nama'];
    // $usern=$_POST['username'];
    // $pass=$_POST['password'];
    // $gender=$_POST['gender'];
    // $telp=$_POST['telp'];
    // $query = mysqli_query($koneksi, "INSERT INTO pasien (nama, username, password, gender, notelp) VALUES 
    // ('$nama', '$usern', '$pass', '$gender', '$telp')");
    // if($query){
    //     // echo "data berhasil terinput";
        // $_SESSION['nama']=$nama;
        // $_SESSION['usern']=$usern;
        // $_SESSION['pass']=$pass;
        // $_SESSION['gender']=$gender;
        // $_SESSION['telp'] = $telp;
        // header("location:login-pasien.html");
    // }else{
    //     echo "data gagal terinput";
    //     // header("location:registrasi.html");
    // }
?>