<?php
  require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
   $id_mahasiswa = $_POST['id_mahasiswa'];
   $password = $_POST['password'];

   $sql = "UPDATE mahasiswa SET password = '$password' WHERE id_mahasiswa = '$id_mahasiswa'";

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