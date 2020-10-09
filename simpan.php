<?php
  require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
   $email = $_POST['email'];
   $password = $_POST['password'];
   $nama = $_POST['nama'];
   $alamat = $_POST['alamat'];
   $tanggal_lahir = $_POST['tanggal_lahir'];
   $jenis_kelamin = $_POST['jenis_kelamin'];
   $asal_sekolah = $_POST['asal_sekolah'];
   $nomor = $_POST['nomor'];


   $sql = "INSERT INTO mahasiswa (email, password, nama, alamat, tanggal_lahir, jenis_kelamin, asal_sekolah, nomor) VALUES('$email', 
    '$password','$nama','$alamat','$tanggal_lahir', '$jenis_kelamin', '$asal_sekolah', '$nomor')";

     if(mysqli_query($con,$sql)) {
       $response["value"] = 1;
       $response["message"] = "Berhasil";
       echo json_encode($response);
     } else {
        $response["value"] = 0;
        $response["message"] = "Gagal";
        echo json_encode($response);
     }
   mysqli_close($con);
  } else {
      $response["value"] = 0 ;
      $response["message"] = "Error";
      echo json_encode($response);
  }
?>